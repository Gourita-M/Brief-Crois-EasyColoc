<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persons extends Model
{
    protected $fillable = [
        'users_id',
        'role',
        'is_banned',
    ];
}
