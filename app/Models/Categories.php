<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Expenses;

class Categories extends Model
{
    protected $fillable = [
        'name',
    ];

    public function expenses()
    {
        return $this->hasMany(Expenses::class);
    }
}
