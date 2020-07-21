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

Route::get('ask', function () {
    return view('ask');
})->name('ask');

Route::post('add_user', 'UserController@insert')->name('add_user');
Route::post('add_question', 'QAController@insertQuestion')->name('add_question');
Route::post('add_answer', 'QAController@insertAnswer')->name('add_answer');
Route::post('login', 'UserController@loginPost')->name('login');

Route::put('update_question', 'QAController@editPutQuestion')->name('update_question');

Route::get('logout', 'UserController@logout')->name('logout');
Route::get('questions', 'QAController@userQuestions')->name('questions');
Route::get('all_questions', 'QAController@allQuestions');
Route::get('edit_question/{id}', 'QAController@editQuestion')->name('edit_question');
//Route::get('view/{id}', 'QAController@editAnswer')->name('edit_answer');
Route::get('home', 'QAController@allQuestions')->name('home');
Route::get('search/', 'QAController@filterQuestionsByName')->name('search_question');
Route::get('view/{id}', 'QuestionsAnswersController@show')->name('view');
Route::get('questions/{id}','QAController@deleteQuestion')->name('delete_question');
//Route::get('view/{id}','QAController@deleteAnswer')->name('delete_answer');

