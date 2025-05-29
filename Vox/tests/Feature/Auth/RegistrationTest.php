<?php

namespace Tests\Feature\Auth;

use App\Models\Department;
use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register(): void
    {
        Role::factory()->create(['id' => 4,'name' => 'user']);

        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'department_id' => Department::factory()->create()->id,
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('index.complaint', absolute: false));
    }
}
