<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feedback>
 */
class FeedbackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {


        return [
            'feedbackTitle' => $this->faker->words(5, true),
            'feedbackContent' => $this->faker->words(5, true),
            'from' => $this->faker->name(),
            'rating' => $this->faker->numberBetween(1, 5),
            'submittedDate' => $this->faker->dateTime(),
        ];
    }
}
