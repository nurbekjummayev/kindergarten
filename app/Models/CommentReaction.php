<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommentReaction extends Model
{
    /** @use HasFactory<\Database\Factories\CommentReactionFactory> */
    use HasFactory;

    protected $fillable = [
        'comment_id',
        'user_id',
        'is_like',
    ];

    protected function casts(): array
    {
        return [
            'is_like' => 'boolean',
        ];
    }

    public function comment(): BelongsTo
    {
        return $this->belongsTo(Comment::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
