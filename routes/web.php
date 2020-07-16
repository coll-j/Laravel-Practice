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
    return view('welcome');
});

Route::post('add_user', 'UserController@insert')->name('add_user');
Route::post('add_question', 'QuestionsController@insert')->name('add_question');
Route::post('add_answer', 'AnswersController@insert')->name('add_answer');
