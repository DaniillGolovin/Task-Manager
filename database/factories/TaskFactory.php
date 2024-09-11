<?php

namespace Database\Factories;

use App\Models\Label;
use App\Models\Task;
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
            'name' => fake()->realText(50),
            'description' => $this->faker->realText(),
            'status_id' => Status::inRandomOrder()->first(),
            'created_by_id' => User::inRandomOrder()->first(),
            'assigned_to_id' => User::inRandomOrder()->first(),
        ];
    }

    public function configure(): self
    {
        return $this->afterCreating(function (Task $task) {
            $labels = Label::factory()->count(1)->create();
            $task->labels()->attach($labels->pluck('id')->toArray());
        });
    }
}
