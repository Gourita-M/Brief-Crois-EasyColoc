<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categories;
use App\Models\Accommodations;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $accommodations = Accommodations::all();

        foreach ($accommodations as $accommodation) {
            Categories::create([
                'name' => 'Food',
                'accommodations_id' => $accommodation->id,
            ]);

            Categories::create([
                'name' => 'Electricity',
                'accommodations_id' => $accommodation->id,
            ]);
        }
    }
}