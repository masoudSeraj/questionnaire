<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Responder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

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
