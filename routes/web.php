<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
})->name('home');


Auth::routes();


Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::resource('questions', App\Http\Controllers\Admin\QuestionController::class)->except('index', 'show');
});


Route::get('search', [App\Http\Controllers\QuestionController::class, 'search'])->name('search.questions');
Route::resource('questions', App\Http\Controllers\QuestionController::class)->only('index', 'show', 'search');
