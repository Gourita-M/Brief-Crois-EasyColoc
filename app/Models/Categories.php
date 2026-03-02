<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Expenses;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
