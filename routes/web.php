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

Route::get('/record/create', 'RecordController@create')->name("record.create");
Route::post('/record/save', 'RecordController@save')->name("record.save");
Route::get('/record/sort/{order}','RecordController@sort')->name("record.sort");
Route::get('/record/list', 'RecordController@list')->name("record.list");
Route::post('/record/delete/{id}', 'RecordController@delete')->name("record.delete");
Route::get('/record/show/{id}', 'RecordController@show')->name("record.show");

//Home
Route::get('/index', 'HomeController@user')->name("home.user");
Route::get('/trainer', 'HomeController@trainer')->name("home.trainer");
Route::get('/admin', 'HomeController@admin')->name("home.admin");

//User
Route::post('/user/save', 'UserController@save')->name("user.save")->middleware('checkAdmin');
Route::get('admin/user/create', 'UserController@create')->name("user.create")->middleware('checkAdmin');
Route::get('/user/create', 'UserController@create')->name("user.create")->middleware('checkAdmin');
Route::get('/user/list', 'UserController@list')->name("user.list")->middleware('checkUser');
Route::get('/user/list/byName', 'UserController@listByName')->name("user.listByName");
Route::get('/user/show/{id}', 'UserController@show')->name("user.show");
Route::post('/user/delete/{id}', 'UserController@delete')->name("user.delete");
Route::get('/user/searchByName', 'UserController@searchByName')->name("user.searchByName");
Route::get('/user/search', 'UserController@search')->name("user.search");

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

// Comment
Route::get('/comment/create/{exerciseId}', 'CommentController@create')->name("comment.create")->middleware('checkUser');
Route::post('/comment/save', 'CommentController@save')->name("comment.save")->middleware('checkUser');
Route::get('/comment/list', 'CommentController@list')->name("comment.list")->middleware('checkAdmin');
Route::get('/comment/sort/{order}', 'CommentController@sort')->name("comment.sort")->middleware('checkAdmin');
Route::post('/comment/delete/{id}', 'CommentController@delete')->name("comment.delete")->middleware('checkAdmin');

//Login routes
Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
