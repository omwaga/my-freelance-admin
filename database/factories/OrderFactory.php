<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $services = array("Dissertation","Lab Report","Math Problem","Research Paper","Research Proposal","Research Summary","Scholarship Essay","Speech","Statistic Project","Term Paper","Thesis","Other","Presentation or Speech");
        $styles = array('MLA', 'Chicago', 'APA', 'Havard');
        $level = array('Diploma', 'Bachelor', 'Masters', 'PhD');

        return [
            'type' => $this->faker->randomElement($services),
            'service' => $this->faker->randomElement($services),
            'deadline' => $this->faker->dateTimeBetween('now', '+2 years'),
            'language' => $this->faker->languageCode,
            'pages' => $this->faker->numberBetween(1, 24),
            'level' => $this->faker->randomElement($level),
            'topic' => $this->faker->title,
            'sources' => $this->faker->numberBetween(1, 5),
            'subject' => $this->faker->words(3, true),
            'style' => $this->faker->randomElement($styles),
            'instructions' => $this->faker->sentence,
            'order_number' => $this->faker->numberBetween(3000, 10000),
            'draft' => $this->faker->boolean,
            'bidding' => $this->faker->boolean,
            'in_progress' => $this->faker->boolean,
            'completed' => $this->faker->boolean,
            'cancelled' => $this->faker->boolean,
            'price' => $this->faker->numberBetween(0, 21),
            'order_date' => $this->faker->dateTimeBetween('-10 years', 'now'),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
