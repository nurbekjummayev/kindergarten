<?php

namespace Database\Factories;

use App\Enums\KindergartenStatus;
use App\Enums\KindergartenType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kindergarten>
 */
class KindergartenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $monthlyFeeStart = fake()->randomFloat(2, 500000, 2000000);

        return [
            'organization_id' => \App\Models\Organization::factory(),
            'name' => fake()->company().' Bog\'chasi',
            'description' => fake()->paragraph(3),
            'email' => fake()->unique()->safeEmail(),
            'address' => fake()->address(),
            'logo' => null,
            'galleries' => [],
            'capacity' => fake()->numberBetween(20, 200),
            'age_start' => 1,
            'age_end' => 6,
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
            'website' => fake()->optional()->url(),
            'monthly_fee_start' => $monthlyFeeStart,
            'monthly_fee_end' => $monthlyFeeStart + fake()->randomFloat(2, 500000, 1000000),
            'status' => KindergartenStatus::DRAFT,
            'type' => fake()->randomElement(KindergartenType::cases()),
            'rejection_reason' => null,
            'is_published' => false,
        ];
    }

    /**
     * Indicate that the kindergarten is published.
     */
    public function published(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => KindergartenStatus::APPROVED,
            'is_published' => true,
        ]);
    }

    /**
     * Indicate that the kindergarten is pending approval.
     */
    public function pending(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => KindergartenStatus::PENDING,
            'is_published' => false,
        ]);
    }

    /**
     * Indicate that the kindergarten is rejected.
     */
    public function rejected(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => KindergartenStatus::REJECTED,
            'rejection_reason' => fake()->sentence(),
            'is_published' => false,
        ]);
    }
}
