<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/new', 'HomeController@newTopic')->name('new');
Route::get('/topic/{id}', 'TopicsController@topic')->name('topic');
Route::get('/delete-topic/{id}', 'TopicsController@ProcessDeleteTopic')->name('delete-topic');
Route::post('/process-new-topic', 'HomeController@ProcessNewTopic')->name('process-new-topic');
Route::post('/new-idea/{id}', 'TopicsController@ProcessIdea')->name('new-idea');