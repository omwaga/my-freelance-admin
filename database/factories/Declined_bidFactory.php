<?php

namespace Database\Factories;

use App\Models\Declined_bid;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

class Declined_bidFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Declined_bid::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws Exception
     */
    public function definition()
    {
        return [
            'order_number' => random_int(3000, 30000)
        ];
    }
}
