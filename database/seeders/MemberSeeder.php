<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Members;
use App\Models\User;

class MemberSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            Members::create([
                'role' => $user->email === 'admin@test.com' ? 'Admin' : 'Member',
                'is_banned' => false,
                'users_id' => $user->id,
            ]);
        }
    }
}