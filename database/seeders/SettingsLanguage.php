<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsLanguage extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\SettingsLanguage::factory()->count(5)->create();
    }
}
