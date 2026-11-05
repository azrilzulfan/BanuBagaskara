<?php

namespace App\Http\Middleware;

use App\Services\SiteSettingsService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSiteMaintenanceMode
{
    public function __construct(
        public SiteSettingsService $settings,
    ) {}

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Bypass untuk rute admin (kustom prefix), login, dan health check
        $adminPrefix = config('admin.prefix', 'portal-dewan');
        if ($request->is($adminPrefix.'*') || $request->is('admin*') || $request->is('login') || $request->is('up')) {
            return $next($request);
        }

        // 2. Bypass jika user sudah terautentikasi (admin)
        if (auth()->check()) {
            return $next($request);
        }

        // 3. Cek status pemeliharaan situs
        try {
            $general = $this->settings->getGroup('general');
        } catch (\Throwable) {
            return $next($request);
        }

        $siteStatus = $general['site_status'] ?? 'online';
        $isMaintenance = ($siteStatus === 'maintenance') || ! empty($general['is_maintenance']);

        if ($isMaintenance) {
            $message = ! empty($general['maintenance_message'])
                ? $general['maintenance_message']
                : 'Website sedang dalam peningkatan sistem dan pemeliharaan berkala untuk menghadirkan kualitas layanan digital yang lebih baik. Kami akan segera kembali online melayani Anda.';

            abort(503, $message);
        }

        return $next($request);
    }
}
