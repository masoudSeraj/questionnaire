<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Responder;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class QuestionController extends Controller
{
    public function index(): ResourceCollection
    {
        return QuestionResource::collection(Question::with('answers')->get());
    }

    public function submit(Request $request, Question $question): JsonResponse
    {
        $uuid = session()->exists('responder') ? session('responder') : throw new Exception('خطایی رخ داده است!');
        $responder = Responder::query()->where('uuid', $uuid)->first();
        $request->whenFilled('answer_id', function () use ($responder, $request) {
            $answer = Answer::query()->find($request->input('answer_id'));

            if ($answer instanceof Answer && $responder instanceof Responder) {
                $answer->responders()->syncWithoutDetaching([$responder->id]);
            }
        });

        return response()->json(['type' => 'success', 'message' => "پاسخ سوال $question->question با موفقیت ثبت شد!"]);
    }
}
