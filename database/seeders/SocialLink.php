<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SocialLink extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\SocialLink::factory()->count(1)->create();
    }
}
