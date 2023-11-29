<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        return [
            'name' => $this->faker->bs,
            'priority' => $this->faker->randomNumber(1, true),
            'user_id' => User::inRandomOrder()->first()->id,
            'project_id' => Project::factory(),
        ];
    }
}
