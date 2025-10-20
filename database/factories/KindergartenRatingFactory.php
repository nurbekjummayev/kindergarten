<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KindergartenRating>
 */
class KindergartenRatingFactory extends Factory
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
            'rating' => $this->faker->numberBetween(1, 5),
        ];
    }
}
