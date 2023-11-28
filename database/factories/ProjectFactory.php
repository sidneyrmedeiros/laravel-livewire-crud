<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition()
    {
        return [
            'name' => $this->faker->catchPhrase,
            'priority' => $this->faker->randomNumber(1, true),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
