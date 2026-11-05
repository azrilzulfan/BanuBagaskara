<?php

namespace Database\Factories;

use App\Enums\AspirationPriority;
use App\Enums\AspirationStatus;
use App\Models\Aspiration;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Aspiration>
 */
class AspirationFactory extends Factory
{
    protected $model = Aspiration::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ticket_number' => 'BLB-'.strtoupper(Str::random(6)),
            'sender_name' => fake()->name(),
            'phone_number' => '0812'.fake()->numerify('########'),
            'address' => 'RT 0'.fake()->randomDigitNotNull().'/RW 0'.fake()->randomDigitNotNull().', '.fake()->streetAddress(),
            'category' => fake()->randomElement(['Infrastruktur', 'Kesehatan', 'Pendidikan', 'Bansos', 'Layanan Publik']),
            'subject' => fake()->sentence(4),
            'description' => fake()->paragraph(),
            'status' => AspirationStatus::Baru,
            'priority' => AspirationPriority::Sedang,
            'ip_address' => '127.0.0.1',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
        ];
    }
}
