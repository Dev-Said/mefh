<?php

namespace Database\Factories;

use App\Models\faq;
use Illuminate\Database\Eloquent\Factories\Factory;

class FaqFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = faq::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'theme' => $this->faker->sentence(2, true),
            'intitule' => $this->faker->sentence(3, true),
            'text' => $this->faker->sentence(8, true),
        ];
    }
}
