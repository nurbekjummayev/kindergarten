<?php

namespace App\Models;

use App\Enums\KindergartenStatus;
use App\Enums\KindergartenType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kindergarten extends Model
{
    use HasFactory;

    protected $fillable = [
        'organization_id',
        'name',
        'description',
        'email',
        'address',
        'logo',
        'galleries',
        'capacity',
        'age_start',
        'age_end',
        'latitude',
        'longitude',
        'website',
        'monthly_fee_start',
        'monthly_fee_end',
        'status',
        'type',
        'rejection_reason',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'monthly_fee_start' => 'decimal:2',
        'monthly_fee_end' => 'decimal:2',
        'status' => KindergartenStatus::class,
        'type' => KindergartenType::class,
        'galleries' => 'array',
        'capacity' => 'integer',
        'age_start' => 'integer',
        'age_end' => 'integer',
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    public function socialNetworks(): BelongsToMany
    {
        return $this->belongsToMany(SocialNetwork::class, 'kindergarten_social_networks')
            ->withPivot(['url', 'is_active', 'order'])
            ->withTimestamps()
            ->orderBy('kindergarten_social_networks.order');
    }

    public function kindergartenSocialNetworks(): HasMany
    {
        return $this->hasMany(KindergartenSocialNetwork::class)->orderBy('order');
    }

    public function phones(): HasMany
    {
        return $this->hasMany(KindergartenPhone::class)->orderBy('order');
    }

    public function workingHours(): HasMany
    {
        return $this->hasMany(KindergartenWorkingHour::class)->orderByRaw("
            CASE day_of_week
                WHEN 'monday' THEN 1
                WHEN 'tuesday' THEN 2
                WHEN 'wednesday' THEN 3
                WHEN 'thursday' THEN 4
                WHEN 'friday' THEN 5
                WHEN 'saturday' THEN 6
                WHEN 'sunday' THEN 7
            END
        ");
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(KindergartenRating::class);
    }

    public function averageRating(): float
    {
        return round($this->ratings()->avg('rating') ?? 0, 1);
    }

    public function totalRatings(): int
    {
        return $this->ratings()->count();
    }

    public function userRating(?int $userId = null): ?int
    {
        if (! $userId) {
            return null;
        }

        return $this->ratings()->where('user_id', $userId)->value('rating');
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)->where('status', KindergartenStatus::APPROVED);
    }

    public function scopePending($query)
    {
        return $query->where('status', KindergartenStatus::PENDING);
    }

    public function scopeDraft($query)
    {
        return $query->where('status', KindergartenStatus::DRAFT);
    }

    public function scopeApproved($query)
    {
        return $query->where('status', KindergartenStatus::APPROVED);
    }

    public function scopeRejected($query)
    {
        return $query->where('status', KindergartenStatus::REJECTED);
    }
}
