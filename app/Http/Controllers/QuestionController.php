<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Responder;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        return QuestionResource::collection(Question::with('answers')->get());
    }

    public function submit(Request $request, Question $question)
    {
        $uuid = session()->exists('responder') ? session('responder') : throw new \Exception('خطایی رخ داده است!');
        $responder = Responder::where('uuid', $uuid)->first();
        $request->whenFilled('answer_id', function () use ($responder, $request) {
            $answer = Answer::find($request->answer_id);
            $answer->responders()->syncWithoutDetaching($responder->id);
        });

        return response()->json(['type' => 'success', 'message' => "پاسخ سوال $question->question با موفقیت ثبت شد!"]);
    }
}
