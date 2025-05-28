<?php

use App\Models\Complaint;
use App\Models\Role;
use App\Models\User;

it('has many complaint', function () {
    $user = User::factory()->create();
    Complaint::factory(10)->create(['user_id' => $user->id]);
    expect($user->complaints->count())->toBe(10);
});

it('belongs to many roles', function () {
    $user = User::factory()->create();
    Role::factory(4)->create()->each(function ($role) use ($user) {
        $role->users()->attach($user->id);
    });
    expect($user->roles->count())->toBe(4);
});
