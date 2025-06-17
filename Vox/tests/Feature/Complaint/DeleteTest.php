<?php

use App\Models\Complaint;
use App\Models\Role;
use App\Models\User;

test('user who created complaint can delete it', function () {
    $user = User::factory()->create();
    $complaint = Complaint::factory()->create([
        'user_id' => $user->id,
    ]);

    $this->actingAs($user);

    $response = $this->deleteJson("/complaints/$complaint->id");
    $response->assertStatus(204);
});

test('user who did not create complaint cannot delete it', function () {
    $user = User::factory()->create();
    $complaint = Complaint::factory()->create();
    $this->actingAs($user);
    $response = $this->deleteJson("/complaints/$complaint->id");
    $response->assertStatus(403);
});

test('moderator can delete complaint if not creator', function () {
    $role = Role::factory()->create(['name' => 'moderator']);
    $user = User::factory()->create();
    $user->roles()->attach($role->id);
    $complaint = Complaint::factory()->create();

    $this->actingAs($user);
    $response = $this->deleteJson("/complaints/$complaint->id");
    $response->assertStatus(204);
});

test('admin cannot delete complaint if not creator', function () {
    $role = Role::factory()->create(['name' => 'admin']);
    $user = User::factory()->create();
    $user->roles()->attach($role->id);
    $complaint = Complaint::factory()->create();

    $this->actingAs($user);
    $response = $this->deleteJson("/complaints/$complaint->id");
    $response->assertStatus(403);
});
