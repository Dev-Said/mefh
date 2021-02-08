<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
            'question' => 'Combien font 1 + 1 ?',
            'type' => 'radio',
            'ordre' => 1,
            'quiz_id' => 1,
        ]);
        DB::table('questions')->insert([
            'question' => 'Combien font 2 + 2 ?',
            'type' => 'radio',
            'ordre' => 2,
            'quiz_id' => 2,
        ]);
        DB::table('questions')->insert([
            'question' => 'Combien font 3 + 3 ?',
            'type' => 'radio',
            'ordre' => 3,
            'quiz_id' => 3,
        ]);
        DB::table('questions')->insert([
            'question' => 'Combien font 4 + 4 ?',
            'type' => 'radio',
            'ordre' => 4,
            'quiz_id' => 4,
        ]);
        DB::table('questions')->insert([
            'question' => 'Combien font 5 + 5 ?',
            'type' => 'radio',
            'ordre' => 5,
            'quiz_id' => 5,
        ]);
        DB::table('questions')->insert([
            'question' => 'Quels chiffres sont plus petits que 10 ?',
            'type' => 'checkbox',
            'ordre' => 6,
            'quiz_id' => 1,
        ]);
        DB::table('questions')->insert([
            'question' => 'Quels chiffres sont plus petits que 8 ?',
            'type' => 'checkbox',
            'ordre' => 7,
            'quiz_id' => 2,
        ]);
        DB::table('questions')->insert([
            'question' => 'Quels chiffres sont plus petits que 5 ?',
            'type' => 'checkbox',
            'ordre' => 8,
            'quiz_id' => 3,
        ]);
        DB::table('questions')->insert([
            'question' => 'Quels chiffres sont plus grandq que 20 ?',
            'type' => 'checkbox',
            'ordre' => 9,
            'quiz_id' => 4,
        ]);
        DB::table('questions')->insert([
            'question' => 'Quels chiffres sont plus grandq que 100 ?',
            'type' => 'checkbox',
            'ordre' => 10,
            'quiz_id' => 5,
        ]);
    }
}


