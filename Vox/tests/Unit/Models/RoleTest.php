<?php

use App\Models\Role;
use App\Models\User;

it('belongs to users', function () {
    $role = Role::factory()->create();
    User::factory(10)->create()->each(function ($user) use ($role) {
        $user->roles()->attach($role->id);
    });
    expect($role->users()->count())->toBe(10);
});

