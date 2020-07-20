<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Question\Question;

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

Route::get('sign_up', function () {
    return view('signup');
})->name('sign_up');

Route::get('home', function () {
    return view('home');
})->name('home');

Route::get('ask', function () {
    return view('ask');
})->name('ask');


Route::post('add_user', 'UserController@insert')->name('add_user');
Route::post('add_question', 'QuestionsAnswersController@insertQuestion')->name('add_question');
Route::put('update_question', 'QuestionsAnswersController@editPutQuestion')->name('update_question');
Route::post('add_answer', 'QuestionsAnswersController@insertAnswer')->name('add_answer');
Route::post('login', 'UserController@loginPost')->name('login');


Route::get('logout', 'UserController@logout')->name('logout');
Route::get('questions', 'QuestionsAnswersController@indexQuestion')->name('questions');
Route::get('edit_question/{id}', 'QuestionsAnswersController@editQuestion')->name('edit_question');

Route::get('view/{id}', 'QuestionsAnswersController@show')->name('view');