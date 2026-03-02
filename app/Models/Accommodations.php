<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Members;
use App\Models\Memberships;
use App\Models\Invitations;
use App\Models\Expenses;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Accommodations extends Model
{
    protected $fillable = [
        'name',
        'status',
        'adress',
        'members_id',
        'local_token',
    ];

    public function members()
    {
        return $this->belongsTo(Members::class);
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
