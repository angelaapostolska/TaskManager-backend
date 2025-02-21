<?php

namespace Database\Factories;

use App\Enums\TaskCategory;
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
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph(2),
            'category' => $this->faker->randomElement([TaskCategory::URGENT, TaskCategory::LEAST_URGENT, TaskCategory::MID]),
            //state set in a observer
        ];
    }
}
