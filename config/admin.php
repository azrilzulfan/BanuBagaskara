<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Custom Secret Admin Path Prefix
    |--------------------------------------------------------------------------
    |
    | Alih-alih menggunakan path standar /admin yang mudah ditebak oleh bot scanner,
    | sistem menggunakan path kustom yang dapat diatur via environment variable (ADMIN_PATH).
    | Default: portal-dewan
    |
    */
    'prefix' => trim((string) env('ADMIN_PATH', 'portal-dewan'), '/') ?: 'portal-dewan',

    /*
    |--------------------------------------------------------------------------
    | Initial Single-Admin Seeding Credentials
    |--------------------------------------------------------------------------
    |
    | Digunakan oleh UserSeeder saat inisialisasi awal database.
    | UserSeeder menggunakan firstOrCreate agar tidak pernah menimpa
    | kata sandi administrator yang sudah aktif di server produksi.
    |
    */
    'initial_name' => env('ADMIN_INITIAL_NAME', 'Admin Banu Bagaskara'),
    'initial_email' => env('ADMIN_INITIAL_EMAIL', 'admin@banubagaskara.id'),
    'initial_password' => env('ADMIN_INITIAL_PASSWORD', 'password123'),

    /*
    |--------------------------------------------------------------------------
    | Admin Session Inactivity Timeout (Minutes)
    |--------------------------------------------------------------------------
    |
    | Waktu jeda tanpa aktivitas sebelum sesi administrator otomatis berakhir.
    | Default: 30 menit.
    |
    */
    'session_timeout' => (int) env('ADMIN_SESSION_TIMEOUT', 30),

    /*
    |--------------------------------------------------------------------------
    | Admin IP Allowlist (Opsional)
    |--------------------------------------------------------------------------
    |
    | Daftar alamat IP yang diizinkan mengakses panel admin (dipisahkan koma).
    | Kosongkan jika ingin mengizinkan akses dari semua alamat IP.
    |
    */
    'allowed_ips' => array_values(array_filter(array_map('trim', explode(',', env('ADMIN_ALLOWED_IPS', ''))))),

    /*
    |--------------------------------------------------------------------------
    | Brute-Force Rate Limiting Settings
    |--------------------------------------------------------------------------
    |
    | Batas maksimal percobaan login yang gagal sebelum akun/IP diblokir sementara.
    |
    */
    'max_login_attempts' => (int) env('ADMIN_MAX_LOGIN_ATTEMPTS', 5),
    'lockout_duration' => (int) env('ADMIN_LOCKOUT_DURATION', 900), // 15 menit
];
