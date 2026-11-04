<?php

namespace Database\Factories;

use App\Models\Album;
use App\Models\AlbumPhoto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AlbumPhoto>
 */
class AlbumPhotoFactory extends Factory
{
    protected $model = AlbumPhoto::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'album_id' => Album::factory(),
            'image_path' => 'assets/banu/hero_banu.jpg',
            'caption' => fake()->sentence(),
            'sort_order' => 0,
        ];
    }
}
