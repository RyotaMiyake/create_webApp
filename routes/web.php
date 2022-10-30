<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::controller(UserController::class)->middleware(['auth', 'verified'])->group(function(){
    Route::get('/mypage/{user}', 'show')->name('mypage.show');
    Route::put('/mypage/{user}', 'update')->name('mypage.update');
    Route::get('/mypage/{user}/edit', 'edit')->name('mypage.edit');
});

require __DIR__.'/auth.php';
