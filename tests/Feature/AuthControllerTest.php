<?php

namespace Tests\Feature;

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

}
