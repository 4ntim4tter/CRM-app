<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rand_unix = date('d-m-Y');
        $days_past = random_int(2, 5);

        return [
            'name' => fake()->company(),
            'email' => fake()->email(),
            'projects' => fake()->word(),
            'day_created' => date('d-m-Y', strtotime("-" . $days_past . " days" , strtotime($rand_unix)))
        ];
    }
}
