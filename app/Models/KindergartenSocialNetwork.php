<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class KindergartenSocialNetwork extends Pivot
{
    protected $table = 'kindergarten_social_networks';

    public $incrementing = true;

    protected $fillable = [
        'kindergarten_id',
        'social_network_id',
        'url',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public function kindergarten(): BelongsTo
    {
        return $this->belongsTo(Kindergarten::class);
    }

    public function socialNetwork(): BelongsTo
    {
        return $this->belongsTo(SocialNetwork::class);
    }
}
