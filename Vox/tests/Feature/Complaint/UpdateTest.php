<?php

use App\Models\Complaint;
use App\Models\Role;
use App\Models\User;

test('user who created complaint can updated it', function () {
    $user = User::factory()->create();
    $this->actingAs($user);
    $complaint = Complaint::factory()->create(['user_id' => $user->id]);

    $response = $this->patchJson("/complaints/$complaint->id", [
        'description' => 'New description 0_0'
    ]);

    $complaint->refresh();
    $response->assertStatus(200);
    expect($complaint->description)->toBe('New description 0_0');
});

test('user who did not created complaint cannot updated it', function () {
    $user = User::factory()->create();
    $this->actingAs($user);
    $complaint = Complaint::factory()->create();

    $response = $this->patchJson("/complaints/$complaint->id", [
        'description' => 'Something text'
    ]);

    $complaint->refresh();
    $response->assertStatus(403);
    expect($complaint->description)->not()->toBe('Something text');
});

test('admin can update complaint', function () {
    $admin = User::factory()->create();
    $role = Role::factory()->create(['name' => 'admin']);
    $admin->roles()->attach($role->id);
    $this->actingAs($admin);
    $user = User::factory()->create();
    $complaint = Complaint::factory()->create(['user_id' => $user->id]);

    $response = $this->patchJson("/complaints/$complaint->id", [
        'resolution' => 'OK -_-'
    ]);

    $complaint->refresh();
    $response->assertStatus(200);
    expect($complaint->resolution)->toBe('OK -_-');
});

test('moderator can update complaint', function () {
    $moderator = User::factory()->create();
    $role = Role::factory()->create(['name' => 'moderator']);
    $moderator->roles()->attach($role->id);
    $this->actingAs($moderator);
    $user = User::factory()->create();
    $complaint = Complaint::factory()->create(['user_id' => $user->id]);

    $response = $this->patchJson("/complaints/$complaint->id", [
        'resolution' => 'OK -_-'
    ]);

    $complaint->refresh();
    $response->assertStatus(200);
    expect($complaint->resolution)->toBe('OK -_-');
});
