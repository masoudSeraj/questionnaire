<?php

namespace Tests\Feature;

use App\Models\Responder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_session_has_user_data(): void
    {
        $response = $this->get(route('question.index'));
        $response->assertSessionHas('responder', Responder::first()->uuid);
        $this->assertDatabaseCount('responders', 1);
        $response->assertStatus(200);
    }
}
