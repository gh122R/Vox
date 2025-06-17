<?php

use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Facades\Event;

test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

test('new users can register', function () {
    Event::fake();

    $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'department_id' => Department::factory()->create()->id,
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    $user = User::where('email', 'test@example.com')->first();
    $this->assertNotNull($user);
});
