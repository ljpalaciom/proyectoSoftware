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


//Login routes
Auth::routes(['register' => false]);

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

//Admin routes
//User
Route::post('admin/user/save', 'UserController@save')->name("user.saveAdmin")->middleware('checkAdmin');
Route::get('admin/user/create', 'UserController@create')->name("user.createAdmin")->middleware('checkAdmin');
Route::get('admin/user/usersList', 'UserController@listUsers')->name("user.listUsersAdmin")->middleware('checkAdmin');
Route::get('admin/user/trainersList', 'UserController@listTrainers')->name("user.listTrainersAdmin")->middleware('checkAdmin');
Route::get('admin/user/usersList/byName', 'UserController@listByName')->name("user.listByNameAdmin")->middleware('checkAdmin');
Route::get('admin/user/show/{id}', 'UserController@show')->name("user.showAdmin")->middleware('checkAdmin');
Route::post('admin/user/delete/{id}', 'UserController@delete')->name("user.deleteAdmin")->middleware('checkAdmin');
Route::get('/user/search', 'UserController@search')->name("user.search");
Route::get('/user/searchByName', 'UserController@searchByName')->name("user.searchByName");

//Trainer routes
//User
Route::get('trainer/user/usersList', 'UserController@listUsers')->name("user.listUsersTrainer")->middleware('checkTrainer');
Route::get('trainer/user/show/{id}', 'UserController@show')->name("user.showTrainer")->middleware('checkTrainer');
//Appointment
Route::get('trainer/appointment/list/{user_id}', 'AppointmentController@list')->name("appointment.listTrainer")->middleware('checkTrainer');
//Exercise
Route::get('/exercise/home', 'ExerciseController@home')->name("exercise.home");
Route::get('/exercise/create', 'ExerciseController@create')->name("exercise.create");
Route::post('/exercise/save', 'ExerciseController@save')->name("exercise.save");
Route::get('/exercise/list', 'ExerciseController@list')->name("exercise.list");
Route::get('/exercise/listbydescription', 'ExerciseController@listByDescription')->name("exercise.listByDescription");
Route::get('/exercise/retrieve/{id}', 'ExerciseController@retrieve')->name("exercise.retrieve");
Route::post('/exercise/delete/{id}', 'ExerciseController@delete')->name("exercise.delete");

//Users routes
//Appointment
Route::get('/appointment/list/{user_id}', 'AppointmentController@list')->name("appointment.listUser")->middleware('checkUser');

Route::get('/appointment/create', 'AppointmentController@create')->name("appointment.create");
Route::post('/appointment/save', 'AppointmentController@save')->name("appointment.save");
Route::post('/appointment/delete/{id}', 'AppointmentController@delete')->name("appointment.delete");

// Comment
Route::get('/comment/create/{exerciseId}', 'CommentController@create')->name("comment.create")->middleware('checkUser');
Route::post('/comment/save', 'CommentController@save')->name("comment.save")->middleware('checkUser');
Route::get('/comment/list', 'CommentController@list')->name("comment.list")->middleware('checkAdmin');
Route::get('/comment/sort/{order}', 'CommentController@sort')->name("comment.sort")->middleware('checkAdmin');
Route::post('/comment/delete/{id}', 'CommentController@delete')->name("comment.delete")->middleware('checkAdmin');


