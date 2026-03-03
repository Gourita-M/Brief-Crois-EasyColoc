<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payments;
use App\Models\Expenses;
use App\Models\Members;

class PaymentSeeder extends Seeder
{
    public function run(): void
    {
        $expense = Expenses::first();
        $member = Members::skip(1)->first();

        Payments::create([
            'amount' => 100,
            'status' => true,
            'expenses_id' => $expense->id,
            'members_id' => $member->id,
            'paid_at' => now(),
        ]);
    }
}