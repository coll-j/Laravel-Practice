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
Route::post('add_question', 'QuestionsController@insert')->name('add_question');
Route::put('update_question', 'QuestionsController@editPut')->name('update_question');
Route::post('add_answer', 'AnswersController@insert')->name('add_answer');
Route::post('login', 'UserController@loginPost')->name('login');

Route::get('logout', 'UserController@logout')->name('logout');
Route::get('questions', 'QuestionsController@index')->name('questions');
Route::get('edit_question/{id}', 'QuestionsController@edit')->name('edit_question');