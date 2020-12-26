<?php

namespace Database\Seeders;

use App\Models\chapitre;
use Illuminate\Database\Seeder;

class ChapitreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        chapitre::factory()
        ->times(150)
        ->create();
    }
}
