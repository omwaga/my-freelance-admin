<?php

namespace Database\Factories;

use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws Exception
     */
    public function definition()
    {
        $password = Hash::make("12345678");
        return [
            'name' => $this->faker->unique()->userName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => $password,
            'balance' => random_int(20, 300),
            'member_since' => $this->faker->dateTimeBetween('-10 years', 'now'),
            'remember_token' => Str::random(10),
            'active' => $this->faker->boolean
        ];
    }
}
