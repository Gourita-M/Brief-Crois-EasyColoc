<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Accommodations;
use App\Models\Members;
use Illuminate\Support\Str;

class AccommodationSeeder extends Seeder
{
    public function run(): void
    {
        $members = Members::all();

        foreach ($members->take(2) as $member) {
            Accommodations::create([
                'name' => 'Shared House ' . $member->id,
                'adress' => 'Street ' . $member->id,
                'status' => 'active',
                'local_token' => Str::random(10),
                'members_id' => $member->id,
            ]);
        }
    }
}