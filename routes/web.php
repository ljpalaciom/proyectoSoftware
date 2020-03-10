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

//Record
Route::get('/trainer/record/create/{id}', 'RecordController@create')->name("record.create")->middleware('checkTrainer');
Route::post('/trainer/record/save/{id}', 'RecordController@save')->name("record.save")->middleware('checkTrainer');
Route::get('/record/sort/{order}','RecordController@sort')->name("record.sort");
Route::get('/record/list', 'RecordController@list')->name("record.list");
Route::post('/trainer/record/delete/{id}', 'RecordController@delete')->name("record.delete")->middleware('checkTrainer');
Route::get('/trainer/record/show/{id}', 'RecordController@show')->name("record.show")->middleware('checkTrainer');


//Home
Route::get('/index', 'HomeController@user')->name("home.user");
Route::get('/trainer', 'HomeController@trainer')->name("home.trainer");
Route::get('/admin', 'HomeController@admin')->name("home.admin");

//Admin routes
//User
Route::post('/admin/user/save', 'UserController@save')->name("user.saveAdmin")->middleware('checkAdmin');
Route::get('/admin/user/create', 'UserController@create')->name("user.createAdmin")->middleware('checkAdmin');
Route::get('/admin/user/usersList', 'UserController@listUsers')->name("user.listUsersAdmin")->middleware('checkAdmin');
Route::get('/admin/user/trainersList', 'UserController@listTrainers')->name("user.listTrainersAdmin")->middleware('checkAdmin');
Route::get('/admin/user/usersList/byName', 'UserController@listByName')->name("user.listByNameAdmin")->middleware('checkAdmin');
Route::get('/admin/user/show/{id}', 'UserController@show')->name("user.showAdmin")->middleware('checkAdmin');
Route::post('/admin/user/delete/{id}', 'UserController@delete')->name("user.deleteAdmin")->middleware('checkAdmin');


//Trainer routes
//User

Route::get('/trainer/user/usersList', 'UserController@listUsers')->name("user.listUsersTrainer")->middleware('checkTrainer');
Route::get('/trainer/user/show/{id}', 'UserController@show')->name("user.showTrainer")->middleware('checkTrainer');

Route::get('/trainer/user/search', 'UserController@search')->name("user.search")->middleware('checkTrainer');
Route::get('/trainer/user/searchByName', 'UserController@searchByName')->name("user.searchByName")->middleware('checkTrainer');
Route::get('/trainer/user/show/{id}', 'UserController@show')->name("user.showTrainer")->middleware('checkTrainer');
Route::get('/trainer/user/show/swipe/{type}', 'UserController@swipeView')->name("user.swipeView")->middleware('checkTrainer');

//Appointment
Route::get('/trainer/appointment/list/{userId}', 'AppointmentController@list')->name("appointment.listTrainer")->middleware('checkTrainer');
Route::get('/trainer/appointment/create/{userId}', 'AppointmentController@create')->name("appointment.create")->middleware('checkTrainer');
Route::post('/trainer/appointment/save/{userId}', 'AppointmentController@save')->name("appointment.save")->middleware('checkTrainer');
Route::post('/trainer/appointment/delete/{id}', 'AppointmentController@delete')->name("appointment.deleteTrainer")->middleware('checkTrainer');

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
Route::get('/appointment/list/{userId}', 'AppointmentController@list')->name("appointment.listUser")->middleware('checkUser');
Route::post('/appointment/delete/{id}', 'AppointmentController@delete')->name("appointment.deleteUser")->middleware('checkUser');




//Comment
Route::get('/comment/create/{exerciseId}', 'CommentController@create')->name("comment.create")->middleware('checkUser');
Route::post('/comment/save', 'CommentController@save')->name("comment.save")->middleware('checkUser');
Route::get('/comment/list', 'CommentController@list')->name("comment.list")->middleware('checkAdmin');
Route::get('/comment/sort/{order}', 'CommentController@sort')->name("comment.sort")->middleware('checkAdmin');
Route::post('/comment/delete/{id}', 'CommentController@delete')->name("comment.delete")->middleware('checkAdmin');


//Routine
Route::get('/trainer/routine/list/{trainingId}', 'RoutineController@listTrainer')->name("routine.listTrainer")->middleware('checkTrainer');
Route::get('/trainer/routine/create/{trainingId}', 'RoutineController@create')->name("routine.create")->middleware('checkTrainer');
Route::post('/trainer/routine/save', 'RoutineController@save')->name("routine.save")->middleware('checkTrainer');
Route::post('/trainer/routine/delete/{id}', 'RoutineController@delete')->name("routine.delete")->middleware('checkTrainer');

Route::get('/routine/retrieve/{id}', 'RoutineController@retrieve')->name("routine.retrieve")->middleware('checkUser');
Route::get('/routine/list/{trainingId}', 'RoutineController@listUser')->name("routine.listUser")->middleware('checkUser');
Route::get('/training/list/', 'TrainingController@list')->name("training.list")->middleware('checkUser');
//Training
Route::get('/trainer/training/create/{id}', 'TrainingController@create')->name("training.create")->middleware('checkTrainer');
Route::get('/trainer/training/show/{id}', 'TrainingController@show')->name("training.show")->middleware('checkTrainer');
Route::post('/trainer/training/save/{id}', 'TrainingController@save')->name("training.save")->middleware('checkTrainer');
Route::post('/trainer/training/delete/{id}', 'TrainingController@delete')->name("training.delete")->middleware('checkTrainer');

