<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $fillable = [
        'amount',
        'status',
        'expenses_id',
        'persons_id',
        'paid_at',
    ];
}
