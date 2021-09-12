<?php

namespace Database\Seeders;

use App\Models\Grammar_test;
use Illuminate\Database\Seeder;

class GrammarQuestions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grammar_test::factory()->count(100)->create();
    }
}
