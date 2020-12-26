<?php

namespace Database\Seeders;

use App\Models\quiz_user_reponse;
use Illuminate\Database\Seeder;

class Quiz_user_reponseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        quiz_user_reponse::factory()
        ->times(100)
        ->create();
    }
}
