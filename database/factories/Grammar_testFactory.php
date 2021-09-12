<?php

namespace Database\Factories;

use App\Models\Grammar_test;
use Illuminate\Database\Eloquent\Factories\Factory;

class Grammar_testFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Grammar_test::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'question' => $this->faker->sentence,
            'choice_one' => $this->faker->sentence,
            'choice_two' => $this->faker->sentence,
            'choice_three' => $this->faker->sentence,
            'choice_four' => $this->faker->sentence,
            'answer' => $this->faker->sentence,
            'active' => $this->faker->boolean
        ];
    }
}
