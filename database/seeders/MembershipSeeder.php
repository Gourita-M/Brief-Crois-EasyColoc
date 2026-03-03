<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Memberships;
use App\Models\Accommodations;
use App\Models\Members;

class MembershipSeeder extends Seeder
{
    public function run(): void
    {
        $accommodations = Accommodations::all();
        $members = Members::all();

        foreach ($accommodations as $accommodation) {
            foreach ($members->take(3) as $member) {
                Memberships::create([
                    'role' => 'Resident',
                    'is_active' => true,
                    'members_id' => $member->id,
                    'accommodations_id' => $accommodation->id,
                ]);
            }
        }
    }
}