<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Accommodations;
use App\Models\Persons;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Memberships extends Model
{
    protected $fillable = [
        'role',
        'is_active',
        'left_at',
        'members_id',
        'accommodations_id',
    ];

      public function members()
    {
        return $this->belongsTo(Members::class);
    }

     public function accommodations()
    {
        return $this->belongsTo(Accommodations::class);
    }

}
