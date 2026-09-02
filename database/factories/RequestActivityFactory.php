<?php

namespace Database\Factories;

use App\Models\Request;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RequestActivityFactory extends Factory
{
    public function definition()
    {
        return [
            'request_id' => Request::inRandomOrder()->first()->id ?? Request::factory(),
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'activity' => $this->faker->randomElement([
                'Created request',
                'Changed status to In Progress',
                'Added a comment',
                'Completed request',
                'Assigned to user'
            ]),
            'description' => $this->faker->sentence(),
        ];
    }
}
