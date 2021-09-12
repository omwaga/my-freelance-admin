<?php

namespace Database\Factories;

use App\Models\FundWithdrawalRequest;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

class FundWithdrawalRequestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FundWithdrawalRequest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws Exception
     */
    public function definition()
    {
        return [
            'amount_requested' => random_int(25, 100000),
            'status' => $this->faker->boolean,
            'transaction_id' => $this->faker->bankAccountNumber,
            'comment' => $this->faker->sentence
        ];
    }
}
