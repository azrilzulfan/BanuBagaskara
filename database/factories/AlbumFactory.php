<?php

namespace Database\Factories;

use App\Enums\PublicationStatus;
use App\Models\Album;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Album>
 */
class AlbumFactory extends Factory
{
    protected $model = Album::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(4);

        return [
            'title' => $title,
            'slug' => Str::slug($title).'-'.fake()->unique()->numberBetween(100, 999),
            'description' => fake()->sentence(),
            'cover_image' => 'assets/banu/hero_banu.jpg',
            'event_date' => now()->toDateString(),
            'status' => PublicationStatus::Published->value,
            'sort_order' => 0,
        ];
    }
}
