<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     */
    public function test_testing_database_works(): void
    {
        // $response = $this->get('/');

        // $response->assertStatus(200);

        User::factory()->create();

        $this->assertDatabaseCount('users', 1);
    }
}
