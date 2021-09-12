<?php

namespace Database\Factories;

use App\Models\Blocked_writer;
use Illuminate\Database\Eloquent\Factories\Factory;

class Blocked_writerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blocked_writer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail,
            'created_at' => $this->faker->dateTimeBetween('-30 days', 'now', 'Africa/Nairobi'),
            'updated_at' => now()
        ];
    }
}
