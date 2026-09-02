<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RequestFactory extends Factory
{
    public function definition()
    {
        return [
            'request_number' => 'REQ-' . $this->faker->unique()->numberBetween(1000, 9999),
            'client_id' => Client::inRandomOrder()->first()->id ?? Client::factory(),
            'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory(),
            'subject' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'priority' => $this->faker->randomElement(['low', 'medium', 'high', 'urgent']),
            'status' => $this->faker->randomElement(['pending', 'in_progress', 'completed', 'rejected']),
            'assigned_to' => User::inRandomOrder()->first()->id ?? User::factory(),
            'due_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'created_by' => User::inRandomOrder()->first()->id ?? User::factory(),
        ];
    }
}
