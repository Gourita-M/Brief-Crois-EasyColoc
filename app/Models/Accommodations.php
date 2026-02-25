<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accommodations extends Model
{
    protected $fillable = [
        'name',
        'status',
        'adress',
        'persons_id',
        'local_token',
    ];
}
