<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\StudyTimeController;
use App\Http\Controllers\TargetController;
use App\Models\Thread;
use App\Models\Question;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/top', function(Thread $thread, Question $question){
    return view('top')
    ->with([
        'threads' => $thread->getByLimit(),
        'questions' => $question->getByLimit(),
    ]);
})->middleware(['auth', 'verified'])->name('top');

//ユーザページ
Route::controller(UserController::class)->middleware(['auth', 'verified'])->group(function(){
    Route::get('/mypage/{user}', 'show')->name('mypage.show');
    Route::put('/mypage/{user}', 'update')->name('mypage.update');
    Route::get('/mypage/{user}/edit', 'edit')->name('mypage.edit');
});

//スレッドページ
Route::controller(ThreadController::class)->middleware(['auth', 'verified'])->group(function(){
    Route::get('/threads', 'index')->name('threads.index');
    Route::post('/threads', 'store')->name('threads.store');
    Route::get('/threads/{thread}', 'show')->name('threads.create');
});

Route::controller(CommentController::class)->middleware(['auth', 'verified'])->group(function(){
    Route::post('/threads/{thread}', 'store')->name('comments.store');
});

//Q&Aページ
Route::controller(QuestionController::class)->middleware(['auth', 'verified'])->group(function(){
    Route::get('/questions', 'index')->name('questions.index');
    Route::get('/questions/create', 'create')->name('questions.create');
    Route::post('/questions', 'store')->name('questions.store');
    Route::get('/questions/{question}', 'show')->name('questions.show');
});

Route::controller(AnswerController::class)->middleware(['auth', 'verified'])->group(function(){
    Route::post('/questions/{question}', 'store')->name('answers.store');
});

//学習記録ページ
Route::controller(TargetController::class)->middleware(['auth', 'verified'])->group(function(){
    Route::get('/studytime/{user}/target', 'create')->name('targets.create');
    Route::post('/studytime/{user}/target', 'store')->name('targets.store');
});
Route::controller(StudyTimeController::class)->middleware(['auth', 'verified'])->group(function(){
    Route::get('/studytime/{user}', 'index')->name('studytimes.index');
    Route::post('/studytime/{user}', 'store')->name('studytimes.store');
});

require __DIR__.'/auth.php';
