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
        User::updateOrCreate(
            ['email' => 'admin@banubagaskara.id'],
            [
                'name' => 'Banu Lesmana Bagaskara, S.M.',
                'password' => Hash::make('BanuBogor2024!*'),
                'email_verified_at' => now(),
            ]
        );
    }
}
