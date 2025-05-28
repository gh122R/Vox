<?php

use App\Models\Complaint;
use App\Models\Department;
use App\Models\Role;
use App\Models\User;

it('has many to complaint', function () {
   $department = Department::factory()->create();
   Complaint::factory(10)->create(['department_id' => $department->id]);
   expect($department->complaints->count())->toBe(10);
});

it('has many to employees', function () {
    $department = Department::factory()->create();
    User::factory(2)->create(['department_id' => $department->id]);
    expect($department->employees->count())->toBe(2);
});

it('has many to roles', function () {
    $department = Department::factory()->create();
    Role::factory(2)->create(['department_id' => $department->id]);
    expect($department->roles->count())->toBe(2);
});


