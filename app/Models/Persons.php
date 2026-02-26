<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Accommodations;
use App\Models\Memberships;
use App\Models\Payments;
use App\Models\User;

class Persons extends Model
{
    

    protected $fillable = [
        'users_id',
        'role',
        'is_banned',
    ];

    public function accommodations()
    {
        return $this->hasMany(Accommodations::class);
    }

    public function memberships()
    {
        return $this->hasMany(Memberships::class);
    }

    public function payments()
    {
        return $this->hasMany(Payments::class);
    }

}
