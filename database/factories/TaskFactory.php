<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'priority' => $this->faker->randomNumber(2, true),
            'user_id' => User::factory(),
            'project_id' => Project::factory(),
        ];
    }
}
