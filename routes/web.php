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
Route::get('/exercise', 'ExerciseController@home')->name("exercise.home");
Route::get('/exercise/home', 'ExerciseController@home')->name("exercise.home");
Route::get('/exercise/create', 'ExerciseController@create')->name("exercise.create");
Route::post('/exercise/save', 'ExerciseController@save')->name("exercise.save");
Route::get('/exercise/list', 'ExerciseController@list')->name("exercise.list");
Route::get('/exercise/listbydescription', 'ExerciseController@listByDescription')->name("exercise.listByDescription");
Route::get('/exercise/retrieve/{id}', 'ExerciseController@retrieve')->name("exercise.retrieve");
Route::post('/exercise/delete/{id}', 'ExerciseController@delete')->name("exercise.delete");
