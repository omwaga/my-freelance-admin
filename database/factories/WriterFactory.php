<?php

namespace Database\Factories;

use App\Models\Writer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class WriterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Writer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = array('male', 'female');

        return [
            'name' => $this->faker->unique()->userName,
            'first_name' => $this->faker->firstName,
            'second_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->email,
            'password' => Hash::make('12345678'),
            'completed_orders' => $this->faker->boolean,
            'incomplete_orders' => $this->faker->boolean,
            'account_balance' => $this->faker->numberBetween(0, 10000),
            'rating' => $this->faker->numberBetween(0, 5),
            'country' => $this->faker->country,
            'city' => $this->faker->city,
            'university' => "",
            'degree' => "",
            'gender' => $this->faker->randomElement($gender),
            'about' => $this->faker->sentence(10),
            'graduation_year' => $this->faker->year,
            'success_rate' => $this->faker->numberBetween(0, 5),
            'approved' => $this->faker->boolean,
            'failed_test' => $this->faker->boolean,
            'email_verified' => $this->faker->boolean,
            'active' => $this->faker->boolean
        ];
    }
}
