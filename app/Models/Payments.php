<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Expenses;
use App\Models\Persons;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Payments extends Model
{
    protected $fillable = [
        'amount',
        'status',
        'expenses_id',
        'members_id',
        'paid_at',
    ];

    public function expenses()
    {
        return $this->belongsTo(Expenses::class);
    }

    public function members()
    {
        return $this->belongsTo(Members::class);
    }
}
