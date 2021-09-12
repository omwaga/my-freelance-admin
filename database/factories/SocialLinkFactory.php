<?php

namespace Database\Factories;

use App\Models\SocialLink;
use Illuminate\Database\Eloquent\Factories\Factory;

class SocialLinkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SocialLink::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $links = array('instagram', 'facebook', 'twitter', 'linkedin');

        foreach ($links as $link) {
            return [
                'platform' => "$link",
                'url' => $this->faker->url,
            ];
        }
    }
}
