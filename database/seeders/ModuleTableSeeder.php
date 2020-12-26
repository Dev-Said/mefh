<?php

namespace Database\Seeders;

use App\Models\module;
use Illuminate\Database\Seeder;

class ModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        module::factory()
        ->times(11)
        ->create();
    }
}
