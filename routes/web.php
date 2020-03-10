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

//Trainer routes
//User
Route::get('trainer/user/usersList', 'UserController@listUsers')->name("user.listUsersTrainer")->middleware('checkTrainer');
Route::get('trainer/user/show/{id}', 'UserController@show')->name("user.showTrainer")->middleware('checkTrainer');
//Appointment
Route::get('trainer/appointment/list/{user_id}', 'AppointmentController@list')->name("appointment.listTrainer")->middleware('checkTrainer');

//Users routes
//Appointment
Route::get('/appointment/list/{user_id}', 'AppointmentController@list')->name("appointment.listUser")->middleware('checkUser');

Route::get('/appointment/create', 'AppointmentController@create')->name("appointment.create");
Route::post('/appointment/save', 'AppointmentController@save')->name("appointment.save");
Route::post('/appointment/delete/{id}', 'AppointmentController@delete')->name("appointment.delete");



//Exercise
Route::get('/exercise/home', 'ExerciseController@home')->name("exercise.home");
Route::get('/exercise/create', 'ExerciseController@create')->name("exercise.create");
Route::post('/exercise/save', 'ExerciseController@save')->name("exercise.save");
Route::get('/exercise/list', 'ExerciseController@list')->name("exercise.list");
Route::get('/exercise/listbydescription', 'ExerciseController@listByDescription')->name("exercise.listByDescription");
Route::get('/exercise/retrieve/{id}', 'ExerciseController@retrieve')->name("exercise.retrieve");
Route::post('/exercise/delete/{id}', 'ExerciseController@delete')->name("exercise.delete");
