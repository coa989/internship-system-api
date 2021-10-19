<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testRequiredFieldsForRegistration()
    {
        $response = $this->postJson('/api/auth/register', ['Accept' => 'application/json']);

        $response->assertStatus(422)
            ->assertJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'name' => ['The name field is required.'],
                    'email' => ['The email field is required.'],
                    'password' => ['The password field is required.'],
                    'token_name' => ['The token name field is required.']
                ]
            ]);
    }

    public function testRepeatPassword()
    {
        $response = $this->postJson('/api/auth/register',
            ['password' => 'demo12345'],
            ['Accept' => 'application/json']);

        $response->assertStatus(422)
            ->assertJson([
                'message' => 'The given data was invalid.',
                "errors" => [
                    'password' => ['The password confirmation does not match.']
                ]
            ]);
    }

    public function testEmailNotValid()
    {
        $response = $this->postJson('/api/auth/register', [
            'name' => 'test',
            'email' => 'test',
            'password' => 'demo12345',
            'password_confirmation' => 'demo12345',
            'token_name' => 'token'
        ],
            ['Accept' => 'application/json']);

        $response->assertStatus(422)
            ->assertJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'email' => ['The email must be a valid email address.']
                ]
            ]);
    }

    public function testEmailAlreadyExist()
    {
        $user = User::factory()->create();

        $response = $this->postJson('/api/auth/register', [
            'name' => 'test',
            'email' => $user->email,
            'password' => 'demo12345',
            'password_confirmation' => 'demo12345',
            'token_name' => 'token'
        ], ['Accept' => 'application/json']);

        $response->assertStatus(422)
            ->assertJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'email' => ['The email has already been taken.']
                ]
            ]);
    }

    public function testSuccessfulRegistration()
    {
        $response  = $this->postJson('/api/auth/register', [
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => 'demo12345',
            'password_confirmation' => 'demo12345',
            'token_name' => 'token'
        ], ['Accept' => 'application/json']);

        $data = json_decode($response->getContent(), true);

        $response->assertStatus(201);
        $this->assertNotNull($data['token']);
    }
}
