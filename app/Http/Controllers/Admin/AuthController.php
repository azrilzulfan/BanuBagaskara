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
        $throttleKey = 'admin-login|'.$request->ip();

        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds = RateLimiter::availableIn($throttleKey);

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

            $request->session()->regenerate();

            /** @var User $user */
            $user = Auth::user();
            $user->update([
                'last_login_at' => now(),
                'last_login_ip' => $request->ip(),
            ]);

            $this->activityLog->log(
                action: 'LOGIN',
                description: "Login berhasil sebagai Administrator ({$user->email})",
                userId: $user->id,
                ip: $request->ip()
            );

            return redirect()->intended(route('admin.dashboard'));
        }

        RateLimiter::hit($throttleKey, 900); // 15 menit lockout

        $this->activityLog->log(
            action: 'FAILED_LOGIN',
            description: "Percobaan login gagal untuk email: {$request->input('email')}",
            ip: $request->ip()
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
