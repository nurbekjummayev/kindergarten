<?php

namespace Tests\Feature;

use App\Enums\UserRole;
use App\Models\Kindergarten;
use App\Models\KindergartenRating;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class KindergartenRatingTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_rate_kindergarten(): void
    {
        $user = User::factory()->create(['role' => UserRole::CLIENT]);
        $kindergarten = Kindergarten::factory()->create();

        $this->actingAs($user);

        Livewire::test(\App\Livewire\KindergartenRating::class, ['kindergarten' => $kindergarten])
            ->call('rate', 5)
            ->assertDispatched('notify');

        $this->assertDatabaseHas('kindergarten_ratings', [
            'user_id' => $user->id,
            'kindergarten_id' => $kindergarten->id,
            'rating' => 5,
        ]);
    }

    public function test_guest_cannot_rate_kindergarten(): void
    {
        $kindergarten = Kindergarten::factory()->create();

        Livewire::test(\App\Livewire\KindergartenRating::class, ['kindergarten' => $kindergarten])
            ->call('rate', 5)
            ->assertDispatched('notify');

        $this->assertDatabaseMissing('kindergarten_ratings', [
            'kindergarten_id' => $kindergarten->id,
            'rating' => 5,
        ]);
    }

    public function test_user_can_update_their_rating(): void
    {
        $user = User::factory()->create(['role' => UserRole::CLIENT]);
        $kindergarten = Kindergarten::factory()->create();

        KindergartenRating::create([
            'user_id' => $user->id,
            'kindergarten_id' => $kindergarten->id,
            'rating' => 3,
        ]);

        $this->actingAs($user);

        Livewire::test(\App\Livewire\KindergartenRating::class, ['kindergarten' => $kindergarten])
            ->call('rate', 5)
            ->assertSet('userRating', 5);

        $this->assertDatabaseHas('kindergarten_ratings', [
            'user_id' => $user->id,
            'kindergarten_id' => $kindergarten->id,
            'rating' => 5,
        ]);

        $this->assertEquals(1, KindergartenRating::where('user_id', $user->id)->count());
    }

    public function test_average_rating_is_calculated_correctly(): void
    {
        $kindergarten = Kindergarten::factory()->create();
        $users = User::factory()->count(3)->create(['role' => UserRole::CLIENT]);

        KindergartenRating::create([
            'user_id' => $users[0]->id,
            'kindergarten_id' => $kindergarten->id,
            'rating' => 5,
        ]);

        KindergartenRating::create([
            'user_id' => $users[1]->id,
            'kindergarten_id' => $kindergarten->id,
            'rating' => 4,
        ]);

        KindergartenRating::create([
            'user_id' => $users[2]->id,
            'kindergarten_id' => $kindergarten->id,
            'rating' => 3,
        ]);

        $kindergarten->refresh();

        $this->assertEquals(4.0, $kindergarten->averageRating());
        $this->assertEquals(3, $kindergarten->totalRatings());
    }

    public function test_rating_component_displays_on_kindergarten_detail_page(): void
    {
        $kindergarten = Kindergarten::factory()->create([
            'is_published' => true,
            'status' => \App\Enums\KindergartenStatus::APPROVED,
        ]);

        $response = $this->get("/kindergarten/{$kindergarten->id}");

        $response->assertStatus(200);
        $response->assertSeeLivewire(\App\Livewire\KindergartenRating::class);
    }

    public function test_invalid_rating_is_rejected(): void
    {
        $user = User::factory()->create(['role' => UserRole::CLIENT]);
        $kindergarten = Kindergarten::factory()->create();

        $this->actingAs($user);

        Livewire::test(\App\Livewire\KindergartenRating::class, ['kindergarten' => $kindergarten])
            ->call('rate', 6);

        $this->assertDatabaseMissing('kindergarten_ratings', [
            'user_id' => $user->id,
            'kindergarten_id' => $kindergarten->id,
        ]);
    }
}
