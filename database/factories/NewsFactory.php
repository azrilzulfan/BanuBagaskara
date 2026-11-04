<?php

namespace Database\Factories;

use App\Enums\PublicationStatus;
use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<News>
 */
class NewsFactory extends Factory
{
    protected $model = News::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(6);

        return [
            'title' => $title,
            'slug' => Str::slug($title).'-'.fake()->unique()->numberBetween(100, 999),
            'source' => fake()->randomElement(['Media Center', 'Radar Bogor', 'Antara', 'Pikiran Rakyat']),
            'source_url' => fake()->url(),
            'description' => fake()->paragraph(),
            'cover_image' => 'assets/banu/news_1.jpg',
            'is_featured' => false,
            'status' => PublicationStatus::Published->value,
            'published_at' => now()->toDateString(),
            'view_count' => 0,
        ];
    }

    public function draft(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => PublicationStatus::Draft->value,
        ]);
    }

    public function featured(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_featured' => true,
        ]);
    }
}
