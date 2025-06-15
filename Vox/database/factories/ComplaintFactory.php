<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\ProblemType;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Complaint>
 */
class ComplaintFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'status_id' => Status::factory(),
            'problem_type_id' => ProblemType::factory(),
            'department_id' => Department::factory(),
            'description' => fake()->text(),
            'resolution' => fake()->randomElement([null, fake()->text]),
            'anonymous' => fake()->randomElement([false, true]),
            'feedback_rating' => fake()->randomElement([1,2,3,4,5]),
            'deadline' => fake()->randomElement([fake()->date()]),
        ];
    }
}
