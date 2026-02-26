<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Accommodations;
use App\Models\Persons;
use App\Models\User;

class Memberships extends Model
{
    protected $fillable = [
        'role',
        'is_active',
        'left_at',
        'persons_id',
        'accommodations_id',
    ];

      public function Persons()
    {
        return $this->belongsTo(Persons::class);
    }

     public function accommodations()
    {
        return $this->belongsTo(Accommodations::class);
    }

}
