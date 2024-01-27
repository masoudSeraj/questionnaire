<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResponderController;
use App\Models\Responder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/', [QuestionController::class, 'index'])->name('question.index')->middleware('visit');
Route::put('{question}/submit', [QuestionController::class, 'submit'])->name('question.submit');
