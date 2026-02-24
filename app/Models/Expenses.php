<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    protected $fillable = [
        'title',
        'amount',
        'accommodations_id',
        'categories_id',
    ];
}
