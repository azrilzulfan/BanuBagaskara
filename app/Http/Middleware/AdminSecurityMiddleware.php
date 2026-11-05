<?php

namespace App\Http\Middleware;

use App\Services\ActivityLogService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminSecurityMiddleware
{
    public function __construct(
        public ActivityLogService $activityLog,
    ) {}

    /**
     * Handle an incoming request for admin routes.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. IP Allowlist verification (if configured)
        $allowedIps = config('admin.allowed_ips', []);
        if (! empty($allowedIps) && ! in_array($request->ip(), $allowedIps, true)) {
            $this->activityLog->log(
                action: 'UNAUTHORIZED_IP_ACCESS',
                description: "Percobaan akses admin dari IP tidak terdaftar: {$request->ip()}",
                ip: $request->ip()
            );

            abort(404);
        }

        // 2. Idle Session Inactivity Timeout for authenticated admin users
        if (Auth::check()) {
            $timeoutMinutes = config('admin.session_timeout', 30);
            $lastActivity = session('admin_last_activity');

            if ($lastActivity && (time() - $lastActivity > $timeoutMinutes * 60)) {
                $user = Auth::user();
                $this->activityLog->log(
                    action: 'SESSION_TIMEOUT',
                    description: "Sesi administrator ({$user?->email}) kadaluarsa setelah {$timeoutMinutes} menit tanpa aktivitas",
                    userId: $user?->id,
                    ip: $request->ip()
                );

                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()->route('admin.login')->withErrors([
                    'email' => "Sesi Anda telah berakhir karena tidak ada aktivitas selama {$timeoutMinutes} menit. Silakan masuk kembali.",
                ]);
            }

            session(['admin_last_activity' => time()]);
        }

        $response = $next($request);

        // 3. Security headers to prevent browser caching & indexing of sensitive admin pages
        $response->headers->set('X-Robots-Tag', 'noindex, nofollow, noarchive');
        $response->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        $response->headers->set('Pragma', 'no-cache');

        return $response;
    }
}
