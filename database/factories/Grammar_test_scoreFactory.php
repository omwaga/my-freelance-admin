<?php

namespace Database\Factories;

use App\Models\Grammar_test_score;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

class Grammar_test_scoreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Grammar_test_score::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws Exception
     */
    public function definition()
    {
        return [
            'score' => random_int(1, 100)
        ];
    }
}
