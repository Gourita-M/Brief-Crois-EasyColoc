<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Memberships extends Model
{
    protected $fillable = [
        'role',
        'is_active',
        'left_at',
        'persons_id',
        'accommodations_id',
    ];
}
