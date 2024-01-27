<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Enums\Code;
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

    public function test_basics()
    {
        $names = array_map(function ($value) {
            return $value->name;
        }, Code::cases());

        $this->assertSame(['A', 'B', 'C', 'D'], $names);
    }
}
