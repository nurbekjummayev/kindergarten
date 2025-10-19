<?php

namespace App\Models;

use App\Enums\DayOfWeek;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KindergartenWorkingHour extends Model
{
    protected $fillable = [
        'kindergarten_id',
        'day_of_week',
        'is_open',
        'opening_time',
        'closing_time',
    ];

    protected $casts = [
        'day_of_week' => DayOfWeek::class,
        'is_open' => 'boolean',
    ];

    public function kindergarten(): BelongsTo
    {
        return $this->belongsTo(Kindergarten::class);
    }

    public function scopeOpen($query)
    {
        return $query->where('is_open', true);
    }

    public function scopeClosed($query)
    {
        return $query->where('is_open', false);
    }
}
