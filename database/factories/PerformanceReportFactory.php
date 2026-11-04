<?php

namespace Database\Factories;

use App\Enums\PublicationStatus;
use App\Models\PerformanceReport;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<PerformanceReport>
 */
class PerformanceReportFactory extends Factory
{
    protected $model = PerformanceReport::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(5);

        return [
            'title' => $title,
            'slug' => Str::slug($title).'-'.fake()->unique()->numberBetween(100, 999),
            'excerpt' => fake()->paragraph(),
            'cover_image' => 'assets/banu/program_ambulance.jpg',
            'content_blocks' => [
                [
                    'type' => 'paragraph',
                    'data' => [
                        'text' => fake()->paragraph(),
                    ],
                ],
            ],
            'is_featured' => false,
            'status' => PublicationStatus::Published->value,
            'published_at' => now(),
            'view_count' => 0,
        ];
    }

    public function draft(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => PublicationStatus::Draft->value,
            'published_at' => null,
        ]);
    }

    public function featured(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_featured' => true,
        ]);
    }
}
