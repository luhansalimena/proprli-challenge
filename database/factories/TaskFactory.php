<?php

namespace Database\Factories;

use App\Enum\TasksStatusesEnum;
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
            'status' => $this->faker->randomElement(array_column(TasksStatusesEnum::cases(), 'name')),
            'completed_at' => $this->faker->optional()->dateTime,
            'user_id' => \App\Models\User::factory()->create()->id,
            'building_id' => \App\Models\Building::factory()->create()->id,

        ];
    }
}
