<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Persons;
use App\Models\Memberships;
use App\Models\Invitations;
use App\Models\Expenses;

class Accommodations extends Model
{
    protected $fillable = [
        'name',
        'status',
        'adress',
        'persons_id',
        'local_token',
    ];

    public function persons()
    {
        return $this->belongsTo(Persons::class);
    }

    public function memberships()
    {
        return $this->hasMany(Memberships::class);
    }

    public function invitations()
    {
        return $this->hasMany(Invitations::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expenses::class);
    }
}
