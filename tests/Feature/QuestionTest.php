<?php

namespace Tests\Feature;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Responder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class QuestionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_when_a_single_question_is_answered_it_is_stored_in_pivot_table_as_well(): void
    {
        $this->get(route('question.index'));

        $question = Question::factory()->has(
            Answer::factory()->count(4)
        )->create();

        $responder = Responder::where('uuid', session('responder'))->first();

        $response = $this->put(route('question.submit', ['question' => $question->id]), ['answer_id' => Answer::first()->id]);

        $this->assertDatabaseHas('answer_responder', [
            'answer_id' => Answer::first()->id,
            'responder_id' => $responder->id,
        ]);
        $response->assertStatus(200);
    }

    public function test_question_along_with_answers_are_passed_to_front_in_appropriate_format()
    {

        Question::factory()->has(
            Answer::factory()->count(4)
        )->create();

        $response = $this->get(route('question.index'));

        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'question',
                    'code',
                    'answers' => [
                        '*' => ['answer_id', 'question_id', 'answer', 'code', 'score'],
                    ],
                ],
            ],
        ]);
    }

    public function test_question_and_answers_passed_to_front_has_correct_data()
    {
        $question = Question::factory()->has(
            Answer::factory()->count(4)
        )->create();

        // dd(Answer::first());
        // dd(Question::all());

        $response = $this->get(route('question.index'));
        // dd(json_decode($response->getContent(), true));
        $response
            ->assertJson(
                fn (AssertableJson $json) => $json
                    ->has(
                        'data',
                        1,
                        fn (AssertableJson $json) => $json->where('id', $question->id)
                            ->where('question', $question->question)
                            ->where('code', $question->code)
                            ->has('answers', 4)
                        // ->first(
                        //     fn (AssertableJson $json) => $json->where('answer_id', Answer::first()->id)->etc()
                        // )
                    )

            );
    }
}
