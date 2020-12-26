<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(FormationTableSeeder::class);
        $this->call(QuizTableSeeder::class);
        $this->call(ModuleTableSeeder::class);
        $this->call(ChapitreTableSeeder::class);
        $this->call(FaqTableSeeder::class);
        $this->call(Quiz_questionTableSeeder::class);
        $this->call(Quiz_reponse_optionTableSeeder::class);
        $this->call(Quiz_user_reponseTableSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
