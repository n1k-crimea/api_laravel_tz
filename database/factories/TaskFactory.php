<?php

namespace Database\Factories;

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
     *
     * @throws \Exception
     */
    public function definition()
    {
        return [
            'name' => fake()->ean8(),
            'status' => fake()->boolean(),
            'deadline' => fake()->dateTimeBetween('+1 days', '+5 days'),
        ];
    }
}
