<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'omwaga',
            'second_name' => 'collins',
            'email' => 'collinsomwaga@gmail.com',
            'password' => bcrypt('password'),
            'admin' => 1
        ]);
    }
}
