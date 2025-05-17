<?php

namespace Database\Factories;

use App\Enums\TaskCategory;
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
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => "test",
            'category' => $this->faker->randomElement([TaskCategory::URGENT, TaskCategory::LEAST_URGENT, TaskCategory::MID]),
            //state set in a observer
            'user_id' => User::factory(),
            'end_date' => $this->faker->dateTimeBetween('now', '+10 years')->format('Y-m-d'),
        ];
    }
}
