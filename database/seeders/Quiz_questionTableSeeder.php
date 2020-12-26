<?php

namespace Database\Seeders;

use App\Models\quiz_question;
use Illuminate\Database\Seeder;

class Quiz_questionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        quiz_question::factory()
        ->times(30)
        ->create();
    }
}
