<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Task;

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
    public function definition()
    {

        return [
            'title' => 'Halo ini judul',
            'slug' => 'test-title',
            'content' => $this->faker->realText(),
            'token' => $this->faker->randomLetter(),
            'user_id' => 2,
            'status' => $this->randomStatus(),
        ];
    }


    private function randomStatus(): int {
      $status = [Task::StatusBacklog, Task::StatusOnProgress, Task::StatusInReview ];
      $i = random_int(0, count($status) - 1);

      return $status[$i];
    }
}
