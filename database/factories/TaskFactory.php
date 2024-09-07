<?php

namespace Database\Factories;

use App\Models\TaskStatus as Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->text(199),
            'status_id' => Status::inRandomOrder()->first(),
            'created_by_id' => User::inRandomOrder()->first(),
            'assigned_to_id' => User::inRandomOrder()->first(),
        ];
    }
}
