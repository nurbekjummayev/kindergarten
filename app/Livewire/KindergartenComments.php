<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\CommentReaction;
use App\Models\Kindergarten;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class KindergartenComments extends Component
{
    use WithPagination;

    public Kindergarten $kindergarten;

    public string $content = '';

    public function mount(Kindergarten $kindergarten): void
    {
        $this->kindergarten = $kindergarten;
    }

    public function submitComment(): void
    {
        if (! Auth::check()) {
            $this->dispatch('show-login-modal');

            return;
        }

        $this->validate([
            'content' => 'required|string|max:65535',
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'kindergarten_id' => $this->kindergarten->id,
            'content' => $this->content,
            'is_approved' => true,
        ]);

        $this->content = '';
        $this->dispatch('comment-submitted');
        session()->flash('message', 'Fikringiz muvaffaqiyatli qo\'shildi!');
    }

    public function submitReply(int $parentId, string $replyContent): void
    {
        if (! Auth::check()) {
            $this->dispatch('show-login-modal');

            return;
        }

        $this->validate([
            'replyContent' => 'required|string|max:65535',
        ], [
            'replyContent.required' => 'Javob matni to\'ldirilishi shart',
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'kindergarten_id' => $this->kindergarten->id,
            'parent_id' => $parentId,
            'content' => $replyContent,
            'is_approved' => true,
        ]);

        $this->dispatch('reply-submitted');
        session()->flash('message', 'Javobingiz muvaffaqiyatli qo\'shildi!');
    }

    public function toggleReaction(int $commentId, bool $isLike): void
    {
        if (! Auth::check()) {
            $this->dispatch('show-login-modal');

            return;
        }

        $reaction = CommentReaction::where('comment_id', $commentId)
            ->where('user_id', Auth::id())
            ->first();

        if ($reaction) {
            if ($reaction->is_like === $isLike) {
                $reaction->delete();
            } else {
                $reaction->update(['is_like' => $isLike]);
            }
        } else {
            CommentReaction::create([
                'comment_id' => $commentId,
                'user_id' => Auth::id(),
                'is_like' => $isLike,
            ]);
        }
    }

    public function render()
    {
        $comments = Comment::where('kindergarten_id', $this->kindergarten->id)
            ->whereNull('parent_id')
            ->approved()
            ->with(['user', 'reactions', 'approvedReplies.user', 'approvedReplies.reactions'])
            ->withCount([
                'reactions as likes_count' => function ($query) {
                    $query->where('is_like', true);
                },
                'reactions as dislikes_count' => function ($query) {
                    $query->where('is_like', false);
                },
            ])
            ->orderByDesc('likes_count')
            ->latest()
            ->paginate(10);

        return view('livewire.kindergarten-comments', [
            'comments' => $comments,
        ]);
    }
}
