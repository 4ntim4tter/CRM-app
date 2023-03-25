<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $client = Client::inRandomOrder()->first();
        $user = User::inRandomOrder()->first();
        return [
            'name' => fake()->word(),
            'client_name' => $client->name,
            'client_id' => $client->id,
            'description' => fake()->paragraph(),
            'user_name' => $user->name,
            'status' => fake()->boolean(),
            'deadline' => fake()->dateTimeThisYear()
        ];
    }
}
