<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tookens extends Model
{
    protected $fillable = [
        'email',
        'is_active',
        'accommodations_id',
    ];
}
