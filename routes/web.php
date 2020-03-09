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
    return redirect('/login');
});

Route::get('/index', 'HomeController@index')->name("home.index");

//User
Route::post('/user/save', 'UserController@save')->name("user.save")->middleware('checkAdmin');
Route::get('admin/user/create', 'UserController@create')->name("user.create")->middleware('checkAdmin');
Route::get('/user/create', 'UserController@create')->name("user.create")->middleware('checkAdmin');
Route::get('/user/list', 'UserController@list')->name("user.list")->middleware('checkUser');
Route::get('/user/list/byName', 'UserController@listByName')->name("user.listByName");
Route::get('/user/show/{id}', 'UserController@show')->name("user.show");
Route::post('/user/delete/{id}', 'UserController@delete')->name("user.delete");

//Appointment
Route::get('/appointment/create', 'AppointmentController@create')->name("appointment.create");
Route::post('/appointment/save', 'AppointmentController@save')->name("appointment.save");
Route::get('/appointment/list/{user_id}', 'AppointmentController@list')->name("appointment.list");
Route::post('/appointment/delete/{id}', 'AppointmentController@delete')->name("appointment.delete");

//Exercise
Route::get('/exercise/home', 'ExerciseController@home')->name("exercise.home");
Route::get('/exercise/create', 'ExerciseController@create')->name("exercise.create");
Route::post('/exercise/save', 'ExerciseController@save')->name("exercise.save");
Route::get('/exercise/list', 'ExerciseController@list')->name("exercise.list");
Route::get('/exercise/listbydescription', 'ExerciseController@listByDescription')->name("exercise.listByDescription");
Route::get('/exercise/retrieve/{id}', 'ExerciseController@retrieve')->name("exercise.retrieve");
Route::post('/exercise/delete/{id}', 'ExerciseController@delete')->name("exercise.delete");

//Login routes
Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
