<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persons extends Model
{
    
    protected $primaryKey = 'users_id';

    protected $fillable = [
        'users_id',
        'role',
        'is_banned',
    ];
}
