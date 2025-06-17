<?php

use App\Models\Complaint;
use App\Models\Department;
use App\Models\ProblemType;
use App\Models\Status;
use App\Models\User;

test('complaint can be registered', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->post('/complaints', [
        'status_id' => Status::factory()->create()->id,
        'problem_type_id' => ProblemType::factory()->create()->id,
        'department_id' => Department::factory()->create()->id,
        'description' => fake()->text(),
        'anonymous' => fake()->boolean(),
        'deadline' => fake()->date(),
    ]);

    $response->assertStatus(201);
    $complaint = Complaint::where('user_id', $user->id)->first();
    $this->assertNotNull($complaint);
});
