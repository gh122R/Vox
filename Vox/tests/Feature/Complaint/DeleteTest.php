<?php

use App\Models\Complaint;
use App\Models\Role;
use App\Models\User;

test('user,who created complaint, can be delete complaint', function () {
    $user = User::factory()->create();
    $complaint = Complaint::factory()->create([
        'user_id' => $user->id,
    ]);

    $this->actingAs($user);

    $response = $this->delete("/complaints/$complaint->id");
    $response->assertStatus(204);
});

test('user,who not created complaint, can be delete complaint', function () {
    $user = User::factory()->create();
    $complaint = Complaint::factory()->create();
    $this->actingAs($user);
    $response = $this->delete("/complaints/$complaint->id");
    $response->assertStatus(403);
});

test('admin,who not created complaint, can be delete complaint', function () {
    $role = Role::factory()->create(['name' => 'moderator']);
    $user = User::factory()->create();
    $user->roles()->attach($role->id);
    $complaint = Complaint::factory()->create();

    $this->actingAs($user);
    $response = $this->delete("/complaints/$complaint->id");
    $response->assertStatus(204);
});
