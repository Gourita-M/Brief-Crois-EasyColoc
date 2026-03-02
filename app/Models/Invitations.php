<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Accommodations;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invitations extends Model
{
    protected $fillable = [
        'email',
        'is_active',
        'accommodations_id',
        'token',
    ];

    public function accommodations()
    {
        return $this->belongsTo(Accommodations::class);
    }
}
