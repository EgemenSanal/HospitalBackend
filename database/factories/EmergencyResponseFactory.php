<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmergencyResponse>
 */
class EmergencyResponseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'EmergencyMessage' => $this->faker->words(5, true),
            'Response' => $this->faker->words(5, true),
            'Status' => $this->faker->words(5, true),
            'SeverityLevel' => $this->faker->numberBetween(1, 5),
            'from' => $this->faker->name(),
        ];
    }
}
