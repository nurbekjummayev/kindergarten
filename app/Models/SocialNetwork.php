<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SocialNetwork extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'icon',
        'base_url',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function kindergartens(): BelongsToMany
    {
        return $this->belongsToMany(Kindergarten::class, 'kindergarten_social_networks')
            ->withPivot(['url', 'is_active', 'order'])
            ->withTimestamps()
            ->orderBy('kindergarten_social_networks.order');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }
}
