<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Expenses;
use App\Models\Persons;

class Payments extends Model
{
    protected $fillable = [
        'amount',
        'status',
        'expenses_id',
        'persons_id',
        'paid_at',
    ];

    public function expenses()
    {
        return $this->belongsTo(Expenses::class);
    }

    public function persons()
    {
        return $this->belongsTo(Persons::class);
    }
}
