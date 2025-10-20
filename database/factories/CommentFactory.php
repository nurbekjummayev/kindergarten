<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'kindergarten_id' => \App\Models\Kindergarten::factory(),
            'content' => $this->faker->paragraph(),
            'is_approved' => $this->faker->boolean(80),
        ];
    }

    public function approved(): self
    {
        return $this->state(fn (array $attributes) => [
            'is_approved' => true,
        ]);
    }

    public function pending(): self
    {
        return $this->state(fn (array $attributes) => [
            'is_approved' => false,
        ]);
    }
}
