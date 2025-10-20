<?php

namespace Database\Factories;

use App\Enums\BlogCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(6, true);
        $isPublished = fake()->boolean(80);

        return [
            'title' => rtrim($title, '.'),
            'slug' => Str::slug($title),
            'excerpt' => fake()->text(200),
            'content' => fake()->paragraphs(5, true),
            'featured_image' => null,
            'category' => fake()->randomElement(BlogCategory::cases()),
            'author_id' => User::factory(),
            'is_published' => $isPublished,
            'published_at' => $isPublished ? fake()->dateTimeBetween('-6 months', 'now') : null,
            'views' => fake()->numberBetween(0, 1000),
        ];
    }

    public function published(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_published' => true,
            'published_at' => fake()->dateTimeBetween('-6 months', 'now'),
        ]);
    }

    public function unpublished(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_published' => false,
            'published_at' => null,
        ]);
    }
}
