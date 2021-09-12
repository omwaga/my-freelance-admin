<?php

namespace Database\Factories;

use App\Models\Payed_order;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

class Payed_orderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payed_order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws Exception
     */
    public function definition()
    {
        return [
            'amount' => random_int(20, 200),
            'order_number' => random_int(3000, 30000),
            'email' => $this->faker->safeEmail,
            'payment_time' => $this->faker->dateTimeBetween('-10 years', 'now')
        ];
    }
}
