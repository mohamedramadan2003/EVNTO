<?php

namespace Tests\Feature\Auth;

use App\Models\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    /** @test */
    public function user_can_register()
    {
        $data = [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ];

        $response = $this->postJson('/api/v1/register', $data);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'user' => ['id', 'name', 'email'],
                'token',
                'message',
                'status'
            ]);

        $this->assertDatabaseHas('users', ['email' => 'testuser@example.com']);
    }

    /** @test */
    public function user_cannot_register_with_existing_email()
    {
        User::create([
            'name' => 'Existing User',
            'email' => 'existinguser@example.com',
            'password' => Hash::make('password')
        ]);

        $data = [
            'name' => 'Test User',
            'email' => 'existinguser@example.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ];

        $response = $this->postJson('/api/v1/register', $data);

        $response->assertStatus(422)
        ->assertJsonValidationErrors(['email']);
    }

    /** @test */
    public function user_can_login()
    {
        $user = User::create([
            'name' => 'Login User',
            'email' => 'loginuser@example.com',
            'password' => Hash::make('password')
        ]);

        $data = [
            'email' => 'loginuser@example.com',
            'password' => 'password'
        ];

        $response = $this->postJson('/api/v1/login', $data);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'token',
                'message',
                'status'
            ]);
    }

    /** @test */
    public function user_cannot_login_with_invalid_credentials()
    {
        User::create([
            'name' => 'Wrong Login User',
            'email' => 'wronglogin@example.com',
            'password' => Hash::make('password')
        ]);

        $data = [
            'email' => 'wronglogin@example.com',
            'password' => 'wrongpassword'
        ];

        $response = $this->postJson('/api/v1/login', $data);

        $response->assertStatus(401)
            ->assertJson([
                'message' => 'The Provided Credentials are incorrect',
                'status' => 'failed'
            ]);
    }

    /** @test */
    public function user_can_logout()
    {
        $user = User::create([
            'name' => 'Logout User',
            'email' => 'logoutuser@example.com',
            'password' => Hash::make('password')
        ]);

        Sanctum::actingAs($user);

        $response = $this->postJson('/api/v1/logout');

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Logout Success',
                'status' => 'success'
            ]);
    }
}
