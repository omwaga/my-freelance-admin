<?php

namespace Database\Factories;

use App\Models\Review;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws Exception
     */
    public function definition()
    {
        return [
            'email' => $this->faker->safeEmail,
            'rating' => random_int(0, 5),
            'review' => $this->faker->sentence
        ];
    }
}
