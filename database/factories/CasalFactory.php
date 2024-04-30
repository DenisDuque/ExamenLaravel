<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Casal>
 */
class CasalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ciutats = \App\Models\Ciutat::pluck('id')->toArray();

        return [
            'nom' => fake()->name(),
            'data_inici' => $this->faker->dateTime('now'),
            'data_final' => $this->faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            'n_places' => $this->faker->numberBetween(20, 50),
            'ciutat_id' => $this->faker->randomElement($ciutats),
        ];
    }
}
