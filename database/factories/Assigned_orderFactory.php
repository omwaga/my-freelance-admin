<?php

namespace Database\Factories;

use App\Models\Assigned_order;
use Illuminate\Database\Eloquent\Factories\Factory;

class Assigned_orderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Assigned_order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail,
            'order_number' => $this->faker->unique()->numberBetween(3000, 10000),
            'created_at' => $this->faker->dateTimeBetween('-30 days', 'now', 'Africa/Nairobi'),
            'updated_at' => now()
        ];
    }
}
