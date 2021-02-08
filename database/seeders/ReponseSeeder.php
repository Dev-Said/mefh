<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reponses')->insert([
            'reponse' => '2',
            'is_correct' => 1,
            'question_id' => 1,
        ]);
        DB::table('reponses')->insert([
            'reponse' => '3',
            'is_correct' => 0,
            'question_id' => 1,
        ]);
        DB::table('reponses')->insert([
            'reponse' => '1',
            'is_correct' => 0,
            'question_id' => 1,
        ]);
        DB::table('reponses')->insert([
            'reponse' => '3',
            'is_correct' => 0,
            'question_id' => 2,
        ]);
        DB::table('reponses')->insert([
            'reponse' => '4',
            'is_correct' => 1,
            'question_id' => 2,
        ]);
        DB::table('reponses')->insert([
            'reponse' => '5',
            'is_correct' => 0,
            'question_id' => 2,
        ]);
        DB::table('reponses')->insert([
            'reponse' => '3',
            'is_correct' => 0,
            'question_id' => 3,
        ]);
        DB::table('reponses')->insert([
            'reponse' => '5',
            'is_correct' => 0,
            'question_id' => 3,
        ]);
        DB::table('reponses')->insert([
            'reponse' => '6',
            'is_correct' => 1,
            'question_id' => 3,
        ]);
        DB::table('reponses')->insert([
            'reponse' => '8',
            'is_correct' => 1,
            'question_id' => 4,
        ]);
        DB::table('reponses')->insert([
            'reponse' => '9',
            'is_correct' => 0,
            'question_id' => 4,
        ]);
        DB::table('reponses')->insert([
            'reponse' => '10',
            'is_correct' => 0,
            'question_id' => 4,
        ]);
        DB::table('reponses')->insert([
            'reponse' => '11',
            'is_correct' => 0,
            'question_id' => 5,
        ]);
        DB::table('reponses')->insert([
            'reponse' => '12',
            'is_correct' => 0,
            'question_id' => 5,
        ]);
        DB::table('reponses')->insert([
            'reponse' => '10',
            'is_correct' => 1,
            'question_id' => 5,
        ]);
        DB::table('reponses')->insert([
            'reponse' => '8',
            'is_correct' => 1,
            'question_id' => 6,
        ]);
        DB::table('reponses')->insert([
            'reponse' => '11',
            'is_correct' => 0,
            'question_id' => 6,
        ]);
        DB::table('reponses')->insert([
            'reponse' => '5',
            'is_correct' => 1,
            'question_id' => 6,
        ]);
        DB::table('reponses')->insert([
            'reponse' => '7',
            'is_correct' => 1,
            'question_id' => 7,
        ]);
        DB::table('reponses')->insert([
            'reponse' => '11',
            'is_correct' => 0,
            'question_id' => 7,
        ]);
        DB::table('reponses')->insert([
            'reponse' => '3',
            'is_correct' => 1,
            'question_id' => 7,
        ]);
        DB::table('reponses')->insert([
            'reponse' => '7',
            'is_correct' => 0,
            'question_id' => 8,
        ]);
        DB::table('reponses')->insert([
            'reponse' => '1',
            'is_correct' => 1,
            'question_id' => 8,
        ]);
        DB::table('reponses')->insert([
            'reponse' => '3',
            'is_correct' => 1,
            'question_id' => 8,
        ]);
        DB::table('reponses')->insert([
            'reponse' => '7',
            'is_correct' => 0,
            'question_id' => 9,
        ]);
        DB::table('reponses')->insert([
            'reponse' => '31',
            'is_correct' => 1,
            'question_id' => 9,
        ]);
        DB::table('reponses')->insert([
            'reponse' => '21',
            'is_correct' => 1,
            'question_id' => 9,
        ]);
        DB::table('reponses')->insert([
            'reponse' => '89',
            'is_correct' => 0,
            'question_id' => 10,
        ]);
        DB::table('reponses')->insert([
            'reponse' => '101',
            'is_correct' => 1,
            'question_id' => 10,
        ]);
        DB::table('reponses')->insert([
            'reponse' => '121',
            'is_correct' => 1,
            'question_id' => 10,
        ]);
        
    }
}
