<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KindergartenPhone extends Model
{
    protected $fillable = [
        'kindergarten_id',
        'phone_number',
        'is_primary',
        'order',
    ];
}
