<?php

namespace Tests\Feature;

use App\Enums\KindergartenStatus;
use App\Enums\KindergartenType;
use App\Enums\UserRole;
use App\Models\Kindergarten;
use App\Models\KindergartenRating;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LandingPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_landing_page_displays_successfully(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_landing_page_shows_published_kindergartens(): void
    {
        $publishedKindergarten = Kindergarten::factory()->create([
            'is_published' => true,
            'status' => KindergartenStatus::APPROVED,
        ]);

        $unpublishedKindergarten = Kindergarten::factory()->create([
            'is_published' => false,
            'status' => KindergartenStatus::DRAFT,
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee($publishedKindergarten->name);
        $response->assertDontSee($unpublishedKindergarten->name);
    }

    public function test_kindergarten_cards_display_ratings(): void
    {
        $kindergarten = Kindergarten::factory()->create([
            'is_published' => true,
            'status' => KindergartenStatus::APPROVED,
        ]);

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
            'rating' => 5,
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee($kindergarten->name);
        $response->assertSee('4.7');
        $response->assertSee('(3)');
    }

    public function test_kindergarten_cards_display_comments_count(): void
    {
        $kindergarten = Kindergarten::factory()->create([
            'is_published' => true,
            'status' => KindergartenStatus::APPROVED,
        ]);

        $user = User::factory()->create(['role' => UserRole::CLIENT]);

        $kindergarten->comments()->create([
            'user_id' => $user->id,
            'content' => 'Great kindergarten!',
        ]);

        $kindergarten->comments()->create([
            'user_id' => $user->id,
            'content' => 'Excellent service!',
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee($kindergarten->name);
        $response->assertSee('2');
    }

    public function test_search_filters_kindergartens_by_name(): void
    {
        $kindergarten1 = Kindergarten::factory()->create([
            'name' => 'Guliston Bog\'chasi',
            'is_published' => true,
            'status' => KindergartenStatus::APPROVED,
        ]);

        $kindergarten2 = Kindergarten::factory()->create([
            'name' => 'Nurli Kelajak',
            'is_published' => true,
            'status' => KindergartenStatus::APPROVED,
        ]);

        $response = $this->get('/?search=Guliston');

        $response->assertStatus(200);
        $response->assertSee($kindergarten1->name);
        $response->assertDontSee($kindergarten2->name);
    }

    public function test_filters_kindergartens_by_age_range(): void
    {
        $kindergarten1 = Kindergarten::factory()->create([
            'age_start' => 2,
            'age_end' => 5,
            'is_published' => true,
            'status' => KindergartenStatus::APPROVED,
        ]);

        $kindergarten2 = Kindergarten::factory()->create([
            'age_start' => 4,
            'age_end' => 7,
            'is_published' => true,
            'status' => KindergartenStatus::APPROVED,
        ]);

        $response = $this->get('/?age_min=3&age_max=6');

        $response->assertStatus(200);
        $response->assertSee($kindergarten2->name);
    }

    public function test_filters_kindergartens_by_price_range(): void
    {
        $kindergarten1 = Kindergarten::factory()->create([
            'monthly_fee_start' => 500000,
            'monthly_fee_end' => 1000000,
            'is_published' => true,
            'status' => KindergartenStatus::APPROVED,
        ]);

        $kindergarten2 = Kindergarten::factory()->create([
            'monthly_fee_start' => 1500000,
            'monthly_fee_end' => 2000000,
            'is_published' => true,
            'status' => KindergartenStatus::APPROVED,
        ]);

        $response = $this->get('/?price_min=500000&price_max=1000000');

        $response->assertStatus(200);
        $response->assertSee($kindergarten1->name);
        $response->assertDontSee($kindergarten2->name);
    }

    public function test_sorts_kindergartens_by_rating(): void
    {
        $kindergarten1 = Kindergarten::factory()->create([
            'name' => 'Low Rating',
            'is_published' => true,
            'status' => KindergartenStatus::APPROVED,
        ]);

        $kindergarten2 = Kindergarten::factory()->create([
            'name' => 'High Rating',
            'is_published' => true,
            'status' => KindergartenStatus::APPROVED,
        ]);

        $user = User::factory()->create(['role' => UserRole::CLIENT]);

        KindergartenRating::create([
            'user_id' => $user->id,
            'kindergarten_id' => $kindergarten1->id,
            'rating' => 3,
        ]);

        KindergartenRating::create([
            'user_id' => $user->id,
            'kindergarten_id' => $kindergarten2->id,
            'rating' => 5,
        ]);

        $response = $this->get('/?sort_by=rating');

        $response->assertStatus(200);
        $content = $response->getContent();
        $pos1 = strpos($content, $kindergarten2->name);
        $pos2 = strpos($content, $kindergarten1->name);

        $this->assertTrue($pos1 < $pos2, 'High rating kindergarten should appear before low rating');
    }

    public function test_sorts_kindergartens_by_price_low(): void
    {
        $kindergarten1 = Kindergarten::factory()->create([
            'name' => 'Expensive',
            'monthly_fee_start' => 2000000,
            'is_published' => true,
            'status' => KindergartenStatus::APPROVED,
        ]);

        $kindergarten2 = Kindergarten::factory()->create([
            'name' => 'Affordable',
            'monthly_fee_start' => 500000,
            'is_published' => true,
            'status' => KindergartenStatus::APPROVED,
        ]);

        $response = $this->get('/?sort_by=price_low');

        $response->assertStatus(200);
        $content = $response->getContent();
        $pos1 = strpos($content, $kindergarten2->name);
        $pos2 = strpos($content, $kindergarten1->name);

        $this->assertTrue($pos1 < $pos2, 'Affordable kindergarten should appear before expensive');
    }

    public function test_displays_results_count_when_filters_applied(): void
    {
        $kindergarten = Kindergarten::factory()->create([
            'name' => 'Test Bog\'chasi',
            'is_published' => true,
            'status' => KindergartenStatus::APPROVED,
        ]);

        Kindergarten::factory()->count(4)->create([
            'is_published' => true,
            'status' => KindergartenStatus::APPROVED,
        ]);

        $response = $this->get('/?search=Test');

        $response->assertStatus(200);
        $response->assertSee('topildi');
        $response->assertSee($kindergarten->name);
    }

    public function test_filters_kindergartens_by_type(): void
    {
        $stateKindergarten = Kindergarten::factory()->create([
            'type' => KindergartenType::STATE,
            'is_published' => true,
            'status' => KindergartenStatus::APPROVED,
        ]);

        $privateKindergarten = Kindergarten::factory()->create([
            'type' => KindergartenType::PRIVATE,
            'is_published' => true,
            'status' => KindergartenStatus::APPROVED,
        ]);

        $response = $this->get('/?type=state');

        $response->assertStatus(200);
        $response->assertSee($stateKindergarten->name);
        $response->assertDontSee($privateKindergarten->name);
    }

    public function test_displays_all_category_types_on_landing_page(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Davlat bog\'chasi');
        $response->assertSee('Xususiy bog\'cha');
        $response->assertSee('Montessori bog\'chasi');
        $response->assertSee('Til o\'rgatadigan bog\'cha');
    }

    public function test_category_cards_are_clickable_and_filter_results(): void
    {
        $montessoriKindergarten = Kindergarten::factory()->create([
            'type' => KindergartenType::MONTESSORI,
            'is_published' => true,
            'status' => KindergartenStatus::APPROVED,
        ]);

        Kindergarten::factory()->count(3)->create([
            'type' => KindergartenType::PRIVATE,
            'is_published' => true,
            'status' => KindergartenStatus::APPROVED,
        ]);

        $response = $this->get('/?type=montessori');

        $response->assertStatus(200);
        $response->assertSee($montessoriKindergarten->name);
    }
}
