<?php

namespace Tests\Feature;

use App\Enums\UserRole;
use App\Models\Comment;
use App\Models\CommentReaction;
use App\Models\Kindergarten;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_create_comment(): void
    {
        $user = User::factory()->create(['role' => UserRole::CLIENT]);
        $kindergarten = Kindergarten::factory()->create();

        $this->actingAs($user);

        Livewire::test(\App\Livewire\KindergartenComments::class, ['kindergarten' => $kindergarten])
            ->set('content', 'This is a test comment')
            ->call('submitComment')
            ->assertDispatched('comment-submitted')
            ->assertSet('content', '');

        $this->assertDatabaseHas('comments', [
            'user_id' => $user->id,
            'kindergarten_id' => $kindergarten->id,
            'content' => 'This is a test comment',
            'is_approved' => 1,
        ]);
    }

    public function test_guest_cannot_create_comment(): void
    {
        $kindergarten = Kindergarten::factory()->create();

        Livewire::test(\App\Livewire\KindergartenComments::class, ['kindergarten' => $kindergarten])
            ->set('content', 'This is a test comment')
            ->call('submitComment')
            ->assertDispatched('show-login-modal');

        $this->assertDatabaseCount('comments', 0);
    }

    public function test_comment_requires_content(): void
    {
        $user = User::factory()->create(['role' => UserRole::CLIENT]);
        $kindergarten = Kindergarten::factory()->create();

        $this->actingAs($user);

        Livewire::test(\App\Livewire\KindergartenComments::class, ['kindergarten' => $kindergarten])
            ->set('content', '')
            ->call('submitComment')
            ->assertHasErrors(['content' => 'required']);
    }

    public function test_only_approved_comments_are_displayed(): void
    {
        $kindergarten = Kindergarten::factory()->create();
        $approvedComment = Comment::factory()->approved()->create(['kindergarten_id' => $kindergarten->id]);
        $pendingComment = Comment::factory()->pending()->create(['kindergarten_id' => $kindergarten->id]);

        Livewire::test(\App\Livewire\KindergartenComments::class, ['kindergarten' => $kindergarten])
            ->assertSee($approvedComment->content)
            ->assertDontSee($pendingComment->content);
    }

    public function test_authenticated_user_can_like_comment(): void
    {
        $user = User::factory()->create(['role' => UserRole::CLIENT]);
        $comment = Comment::factory()->approved()->create();

        $this->actingAs($user);

        Livewire::test(\App\Livewire\KindergartenComments::class, ['kindergarten' => $comment->kindergarten])
            ->call('toggleReaction', $comment->id, true);

        $this->assertDatabaseHas('comment_reactions', [
            'comment_id' => $comment->id,
            'user_id' => $user->id,
            'is_like' => true,
        ]);
    }

    public function test_authenticated_user_can_dislike_comment(): void
    {
        $user = User::factory()->create(['role' => UserRole::CLIENT]);
        $comment = Comment::factory()->approved()->create();

        $this->actingAs($user);

        Livewire::test(\App\Livewire\KindergartenComments::class, ['kindergarten' => $comment->kindergarten])
            ->call('toggleReaction', $comment->id, false);

        $this->assertDatabaseHas('comment_reactions', [
            'comment_id' => $comment->id,
            'user_id' => $user->id,
            'is_like' => false,
        ]);
    }

    public function test_user_can_toggle_reaction(): void
    {
        $user = User::factory()->create(['role' => UserRole::CLIENT]);
        $comment = Comment::factory()->approved()->create();

        $this->actingAs($user);

        CommentReaction::create([
            'comment_id' => $comment->id,
            'user_id' => $user->id,
            'is_like' => true,
        ]);

        Livewire::test(\App\Livewire\KindergartenComments::class, ['kindergarten' => $comment->kindergarten])
            ->call('toggleReaction', $comment->id, false);

        $this->assertDatabaseHas('comment_reactions', [
            'comment_id' => $comment->id,
            'user_id' => $user->id,
            'is_like' => false,
        ]);
    }

    public function test_user_can_remove_reaction(): void
    {
        $user = User::factory()->create(['role' => UserRole::CLIENT]);
        $comment = Comment::factory()->approved()->create();

        $this->actingAs($user);

        CommentReaction::create([
            'comment_id' => $comment->id,
            'user_id' => $user->id,
            'is_like' => true,
        ]);

        Livewire::test(\App\Livewire\KindergartenComments::class, ['kindergarten' => $comment->kindergarten])
            ->call('toggleReaction', $comment->id, true);

        $this->assertDatabaseMissing('comment_reactions', [
            'comment_id' => $comment->id,
            'user_id' => $user->id,
        ]);
    }

    public function test_guest_cannot_react_to_comment(): void
    {
        $comment = Comment::factory()->approved()->create();

        Livewire::test(\App\Livewire\KindergartenComments::class, ['kindergarten' => $comment->kindergarten])
            ->call('toggleReaction', $comment->id, true)
            ->assertDispatched('show-login-modal');

        $this->assertDatabaseCount('comment_reactions', 0);
    }
}
