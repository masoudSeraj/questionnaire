<?php

namespace Tests\Feature;

use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_token_is_generated_when_logs_in(): void
    {
        $response = $this->post(route('auth.login'), [
            'username' => '09118694561',
            'password' => 'Aa123456',
        ]);

        // $this->assertDatabaseHas('personal_access_tokens', ['token' => ]);
        $response->assertStatus(200);
    }
}
