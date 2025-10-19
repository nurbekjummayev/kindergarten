<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KindergartenWorkingHour>
 */
class KindergartenWorkingHourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'day_of_week' => fake()->randomElement(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday']),
            'is_open' => true,
            'opening_time' => '08:00:00',
            'closing_time' => '18:00:00',
        ];
    }

    /**
     * Indicate that the kindergarten is closed on this day.
     */
    public function closed(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_open' => false,
            'opening_time' => null,
            'closing_time' => null,
        ]);
    }
}
