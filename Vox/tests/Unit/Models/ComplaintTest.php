<?php

use App\Models\Complaint;
use App\Models\Department;
use App\Models\ProblemType;
use App\Models\Status;
use App\Models\User;
uses(Tests\TestCase::class, Illuminate\Foundation\Testing\RefreshDatabase::class)->in('Unit');


it('belongs to a status', function () {
    $status = Status::factory()->create();
    $complaint = Complaint::factory()->create(['status_id' => $status->id]);
    expect($complaint->status->is($status))->toBeTrue();
});

it('belongs to a department', function () {
    $department = Department::factory()->create();
    $complaint = Complaint::factory()->create(['department_id' => $department->id]);
    expect($complaint->department->is($department))->toBeTrue();
});

it('belongs to a problem type', function () {
    $problemType = ProblemType::factory()->create();
    $complaint = Complaint::factory()->create(['problem_type_id' => $problemType->id]);
    expect($complaint->problemType->is($problemType))->toBeTrue();
});

it('belongs to an user', function () {
    $user = User::factory()->create();
    $complaint = Complaint::factory()->create(['user_id' => $user->id]);
    expect($complaint->user->is($user))->toBeTrue();
});
