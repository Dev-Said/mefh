<?php

namespace Database\Seeders;

use App\Models\quiz;
use Illuminate\Database\Seeder;

class QuizTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        quiz::factory()
        ->times(30)
        ->create();
    }
}
