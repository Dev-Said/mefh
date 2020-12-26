<?php

namespace Database\Factories;

use App\Models\quiz_reponse_option;
use Illuminate\Database\Eloquent\Factories\Factory;

class Quiz_reponse_optionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = quiz_reponse_option::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->randomElement($array = array ('radio', 'checkbox')) ,
            'text' => $this->faker->sentence(3, true),
            'is_correct' => $this->faker->numberBetween(0, 1),
            'quiz_question_id' => $this->faker->numberBetween(1, 100),
        ];
    }
}
