<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\QuestionController;

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

Route::get('/top', function(){
    return view('top');
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
Route::post('/threads/{thread}', [CommentController::class, 'create'])->middleware(['auth', 'verified'])->name('comments.create');

//Q&Aページ
Route::controller(QuestionController::class)->middleware(['auth', 'verified'])->group(function(){
    Route::get('/questions', 'index')->name('questions.index');
    Route::get('/questions/create', 'create')->name('questions.create');
    Route::post('/questions', 'store')->name('questions.store');
});

require __DIR__.'/auth.php';
