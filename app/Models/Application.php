<?php

namespace App\Models;

use App\Enums\ApplicationStatus;
use App\Enums\ChildGender;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Application extends Model
{
    protected $fillable = [
        'user_id',
        'kindergarten_id',
        'child_first_name',
        'child_last_name',
        'child_father_name',
        'child_birth_date',
        'child_birth_certificate_number',
        'child_gender',
        'status',
        'rejection_reason',
    ];

    protected function casts(): array
    {
        return [
            'child_birth_date' => 'date',
            'child_gender' => ChildGender::class,
            'status' => ApplicationStatus::class,
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function kindergarten(): BelongsTo
    {
        return $this->belongsTo(Kindergarten::class);
    }
}
