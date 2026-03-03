<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Invitations;
use App\Models\Accommodations;
use Illuminate\Support\Str;

class InvitationSeeder extends Seeder
{
    public function run(): void
    {
        $accommodation = Accommodations::first();

        Invitations::create([
            'email' => 'newmember@test.com',
            'token' => Str::random(20),
            'is_active' => true,
            'accommodations_id' => $accommodation->id,
        ]);
    }
}