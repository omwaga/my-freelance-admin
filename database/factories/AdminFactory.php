<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $password = Hash::make("12345678");
        return [
            'name' => "admin",
            'email' => "muemafabian@gmail.com",
            'email_verified_at' => now(),
            'password' => $password, // password
            'remember_token' => Str::random(10),
        ];
    }
}
