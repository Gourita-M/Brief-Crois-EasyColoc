<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Expenses;
use App\Models\Accommodations;
use App\Models\Categories;
use App\Models\Members;

class ExpenseSeeder extends Seeder
{
    public function run(): void
    {
        $accommodation = Accommodations::first();
        $category = Categories::first();
        $member = Members::first();

        Expenses::create([
            'title' => 'Groceries',
            'amount' => 250.50,
            'accommodations_id' => $accommodation->id,
            'categories_id' => $category->id,
            'members_id' => $member->id,
        ]);
    }
}