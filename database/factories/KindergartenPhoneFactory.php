<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KindergartenPhone>
 */
class KindergartenPhoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'phone_number' => '+998'.fake()->numerify('## ### ## ##'),
            'description' => fake()->optional()->randomElement(['Asosiy', 'Qo\'shimcha', 'Aloqa markazi']),
            'is_primary' => false,
            'order' => 0,
        ];
    }

    /**
     * Indicate that this is the primary phone.
     */
    public function primary(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_primary' => true,
            'order' => 0,
        ]);
    }
}
