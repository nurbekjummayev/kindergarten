<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CommentReaction>
 */
class CommentReactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'comment_id' => \App\Models\Comment::factory(),
            'user_id' => \App\Models\User::factory(),
            'is_like' => $this->faker->boolean(),
        ];
    }

    public function like(): self
    {
        return $this->state(fn (array $attributes) => [
            'is_like' => true,
        ]);
    }

    public function dislike(): self
    {
        return $this->state(fn (array $attributes) => [
            'is_like' => false,
        ]);
    }
}
