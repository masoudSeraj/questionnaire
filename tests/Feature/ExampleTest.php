<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Enums\Code;
use App\Enums\Score;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

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

    public function test_cases()
    {
        $names = array_map(function ($value) {
            return $value->name;
        }, Code::cases());

        $this->assertSame(['A', 'B', 'C', 'D'], $names);
    }

    public function test_score()
    {
        $names = collect(Score::cases())->mapWithKeys(
            fn ($value) => [$value->value => $value->value]
        )->toArray();

        $expected = [0 => 0, 25 => 25, 50 => 50, 100 => 100];
        $this->assertSame($expected, $names);
    }
}
