<?php

namespace Database\Factories;

use App\Models\quiz_user_reponse;
use Illuminate\Database\Eloquent\Factories\Factory;

class Quiz_user_reponseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = quiz_user_reponse::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'quiz_question_id' => $this->faker->numberBetween(1, 30),
            'quiz_reponse_option_id' => $this->faker->numberBetween(1, 100),
            'users_id' => $this->faker->numberBetween(1, 100),
        ];
    }
}
