<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Accommodations;
use App\Models\Categories;
use App\Models\Payments;

class Expenses extends Model
{
    protected $fillable = [
        'title',
        'amount',
        'accommodations_id',
        'categories_id',
        'persons_id',
    ];

    public function expenses()
    {
        return $this->belongsTo(Accommodations::class);
    }

    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }

    public function payments()
    {
        return $this->hasMany(Payments::class);
    }
}
