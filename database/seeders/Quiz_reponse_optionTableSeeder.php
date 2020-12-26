<?php

namespace Database\Seeders;

use App\Models\quiz_reponse_option;
use Illuminate\Database\Seeder;

class Quiz_reponse_optionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        quiz_reponse_option::factory()
        ->times(100)
        ->create();
    }
}
