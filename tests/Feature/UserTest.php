<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_token_is_added_to_database_when_user_logs_in(): void
    {
        User::factory()->state(['mobile' => '09118694561','lastname' => 'seraj', 'password' => Hash::make('Aa123456')])->create();
        $this->post(route('auth.login'), [
            'mobile' => '09118694561',
            'password' => 'Aa123456',
        ]);

        $this->assertDatabaseCount('personal_access_tokens', 1);
    }

    public function test_token_and_response_is_passed_to_front_in_json()
    {
        User::factory()->state(['mobile' => '09118694561','lastname' => 'seraj', 'password' => Hash::make('Aa123456')])->create();

        $response = $this->post(route('auth.login'), [
            'mobile' => '09118694561',
            'password' => 'Aa123456',
        ]);

        $response->assertJsonStructure(['type', 'message', 'token']);
    }

    public function test_user_can_register()
    {
        $data = [
            'name'  => 'masoud',
            'lastname'  => 'seraj',
            'mobile'    => '09118694561',
            'password'  => 'Aa123456'
        ];

        $this->post(route('auth.register'), $data);
        $this->assertDatabaseHas('users', array_diff($data, ['password' => 'Aa123456']));
    }

    public function test_token_is_added_to_database_when_user_registers()
    {
        
    }
}
