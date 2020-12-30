<?php

namespace Database\Seeders;

use App\Models\formation;
use Illuminate\Database\Seeder;

class FormationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        formation::factory()
        ->times(1)
        ->create();
    }
}
