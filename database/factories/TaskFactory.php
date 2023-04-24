<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $project = Project::inRandomOrder()->select('client_name','user_name','id')->get();
        return [
            'name' => fake()->word(),
            'description' => fake()->sentence(),
            'assigned_client' => $project[0],
            'assigned_user' => $project[1],
            'deadline' => fake()->dateTimeThisMonth(),
            'project_id' => $project[2],
            'status' => fake()->boolean()
        ];
    }
}
