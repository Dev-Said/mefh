<?php

namespace Database\Factories;

use App\Models\chapitre;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChapitreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = chapitre::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titre' => $this->faker->sentence(3, true),
            'titre_video' => $this->faker->sentence(3, true),
            'description' => $this->faker->sentence(6, true),
            'num' => $this->faker->unique(true)->numberBetween($min = 1, $max = 500),
            'url_video' => $this->faker->url,
            'duree' => '26:35',
            'modules_id' => $this->faker->numberBetween(1, 15),
        ];
    }
}
