<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function test_can_register()
    {
        $response = $this->postJson('/api/register', [
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => 'password',
            'password_confirmation'=> 'password'
        ]);

        $response->assertStatus(201);
    }
    
    /** @test */
    public function test_invalid_data_to_register()
    {
        $response = $this->postJson('/api/register', [
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => 'password',
            'password_confirmation'=> 'passwor'
        ]);
    
        $response->assertStatus(422);
    }
}
