<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\ActivityLogService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function __construct(
        public ActivityLogService $activityLog,
    ) {}

    public function showLogin(): View|RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    public function login(Request $request): RedirectResponse
    {
        // 1. Honeypot check: bot otomatis yang mengisi field tersembunyi admin_hp langsung ditolak senyap
        if ($request->filled('admin_hp')) {
            $this->activityLog->log(
                action: 'BOT_LOGIN_ATTEMPT',
                description: "Upaya login bot terdeteksi via honeypot admin_hp dari IP {$request->ip()}",
                ip: $request->ip()
            );

            return back()->withErrors([
                'email' => 'Kredensial yang dimasukkan tidak cocok dengan data kami.',
            ])->onlyInput('email');
        }

        $email = Str::lower((string) $request->input('email'));
        $ip = (string) $request->ip();

        $throttleKey = 'admin-login|'.$email.'|'.$ip;
        $ipThrottleKey = 'admin-login-ip|'.$ip;

        $maxAttempts = config('admin.max_login_attempts', 5);
        $lockoutDuration = config('admin.lockout_duration', 900);

        if (RateLimiter::tooManyAttempts($throttleKey, $maxAttempts) || RateLimiter::tooManyAttempts($ipThrottleKey, $maxAttempts * 2)) {
            $seconds = max(
                RateLimiter::availableIn($throttleKey),
                RateLimiter::availableIn($ipThrottleKey)
            );

            $this->activityLog->log(
                action: 'LOGIN_LOCKOUT',
                description: "Percobaan login melebihi batas (rate limit lockout {$seconds} detik) untuk email: {$email}",
                ip: $ip
            );

            return back()->withErrors([
                'email' => "Terlalu banyak percobaan masuk gagal. Silakan coba lagi dalam {$seconds} detik.",
            ])->onlyInput('email');
        }

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            RateLimiter::clear($throttleKey);
            RateLimiter::clear($ipThrottleKey);

            $request->session()->regenerate();
            $request->session()->put('admin_last_activity', time());

            /** @var User $user */
            $user = Auth::user();
            $user->update([
                'last_login_at' => now(),
                'last_login_ip' => $ip,
            ]);

            $this->activityLog->log(
                action: 'LOGIN',
                description: "Login berhasil sebagai Administrator ({$user->email})",
                userId: $user->id,
                ip: $ip
            );

            return redirect()->intended(route('admin.dashboard'));
        }

        RateLimiter::hit($throttleKey, $lockoutDuration);
        RateLimiter::hit($ipThrottleKey, $lockoutDuration);

        $this->activityLog->log(
            action: 'FAILED_LOGIN',
            description: "Percobaan login gagal untuk email: {$email}",
            ip: $ip
        );

        return back()->withErrors([
            'email' => 'Kredensial yang dimasukkan tidak cocok dengan data kami.',
        ])->onlyInput('email');
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'current_password.required' => 'Kata sandi saat ini wajib diisi.',
            'current_password.current_password' => 'Kata sandi saat ini tidak sesuai.',
            'password.required' => 'Kata sandi baru wajib diisi.',
            'password.min' => 'Kata sandi baru minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi baru tidak cocok.',
        ]);

        /** @var User $user */
        $user = Auth::user();
        $user->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->activityLog->log(
            action: 'PASSWORD_CHANGE',
            description: "Kata sandi administrator ({$user->email}) berhasil diperbarui",
            userId: $user->id,
            ip: $request->ip()
        );

        return back()->with('success', 'Kata sandi berhasil diperbarui.');
    }

    public function logout(Request $request): RedirectResponse
    {
        if (Auth::check()) {
            $this->activityLog->log(
                action: 'LOGOUT',
                description: 'Logout dari dasbor admin',
                userId: Auth::id(),
                ip: $request->ip()
            );
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
