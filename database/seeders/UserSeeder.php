<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email = (string) config('admin.initial_email', 'admin@banubagaskara.id');

        User::firstOrCreate(
            ['email' => $email],
            [
                'name' => (string) config('admin.initial_name', 'Admin Banu Bagaskara'),
                'password' => Hash::make((string) config('admin.initial_password', 'password123')),
                'email_verified_at' => now(),
            ]
        );
    }
}
