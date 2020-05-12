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
Route::get('/trainer/record/create/{id}', 'RecordController@create')->name("record.create")->middleware('checkRole:trainer');
Route::post('/trainer/record/save/{id}', 'RecordController@save')->name("record.save")->middleware('checkRole:trainer');
Route::get('/record/sort/{order}','RecordController@sort')->name("record.sort")->middleware('checkRole:user');
Route::get('/record/list', 'RecordController@list')->name("record.list")->middleware('checkRole:user');
Route::get('/record/export', 'RecordController@export')->name("record.export")->middleware('checkRole:user');
Route::get('/record/exportPDF', 'RecordController@exportPDF')->name("record.exportPDF")->middleware('checkRole:user');
Route::post('/trainer/record/delete/{id}', 'RecordController@delete')->name("record.delete")->middleware('checkRole:trainer');
Route::get('/trainer/record/show/{id}', 'RecordController@show')->name("record.show")->middleware('checkRole:trainer');
Route::get('/trainer/record/update/{id}', 'RecordController@update')->name("record.update")->middleware('checkRole:trainer');
Route::post('/trainer/record/saveUpdate', 'RecordController@saveUpdate')->name("record.saveUpdate")->middleware('checkRole:trainer');


//Home
Route::get('/index', 'HomeController@user')->name("home.user");
Route::get('/trainer', 'HomeController@trainer')->name("home.trainer");
Route::get('/admin', 'HomeController@admin')->name("home.admin");


//Admin routes
//User
Route::post('/admin/user/save', 'UserController@save')->name("user.saveAdmin")->middleware('checkRole:admin');
Route::get('/admin/user/create', 'UserController@create')->name("user.createAdmin")->middleware('checkRole:admin');
Route::get('/admin/user/usersList', 'UserController@listUsers')->name("user.listUsersAdmin")->middleware('checkRole:admin');
Route::get('/admin/user/trainersList', 'UserController@listTrainers')->name("user.listTrainersAdmin")->middleware('checkRole:admin');
Route::get('/admin/user/usersList/byName', 'UserController@listByName')->name("user.listByNameAdmin")->middleware('checkRole:admin');
Route::get('/admin/user/show/{id}', 'UserController@show')->name("user.showAdmin")->middleware('checkRole:admin');
Route::post('/admin/user/delete/{id}', 'UserController@delete')->name("user.deleteAdmin")->middleware('checkRole:admin');
Route::get('/admin/user/update/{id}', 'UserController@update')->name("user.update")->middleware('checkRole:admin');
Route::post('/admin/user/saveUpdate', 'UserController@saveUpdate')->name("user.saveUpdate")->middleware('checkRole:admin');
Route::post('/pay', 'UserController@pay')->name("user.pay")->middleware('checkRole:user');

//Trainer routes
//User
Route::get('/trainer/user/usersList', 'UserController@listUsers')->name("user.listUsersTrainer")->middleware('checkRole:trainer');
Route::get('/trainer/user/show/{id}', 'UserController@show')->name("user.showTrainer")->middleware('checkRole:trainer');

Route::get('/trainer/user/search', 'UserController@search')->name("user.search")->middleware('checkRole:trainer');
Route::get('/trainer/user/searchByName', 'UserController@searchByName')->name("user.searchByName")->middleware('checkRole:trainer');
Route::get('/trainer/user/show/{id}', 'UserController@show')->name("user.showTrainer")->middleware('checkRole:trainer');
Route::get('/trainer/user/show/swipe/{type}', 'UserController@swipeView')->name("user.swipeView")->middleware('checkRole:trainer');


//Appointment
Route::get('/trainer/appointment/list/{userId}', 'AppointmentController@list')->name("appointment.listTrainer")->middleware('checkRole:trainer');
Route::get('/trainer/appointment/create/{userId}', 'AppointmentController@create')->name("appointment.create")->middleware('checkRole:trainer');
Route::post('/trainer/appointment/save/{userId}', 'AppointmentController@save')->name("appointment.save")->middleware('checkRole:trainer');
Route::post('/trainer/appointment/delete/{id}', 'AppointmentController@delete')->name("appointment.deleteTrainer")->middleware('checkRole:trainer');
Route::get('/trainer/appointment/update/{id}', 'AppointmentController@update')->name("appointment.update")->middleware('checkRole:trainer');
Route::post('/trainer/appointment/saveUpdate', 'AppointmentController@saveUpdate')->name("appointment.saveUpdate")->middleware('checkRole:trainer');


//Exercise
Route::get('trainer/exercise/home', 'ExerciseController@home')->name("exercise.home")->middleware('checkRole:trainer');
Route::get('trainer/exercise/create', 'ExerciseController@create')->name("exercise.create")->middleware('checkRole:trainer');
Route::post('trainer/exercise/save', 'ExerciseController@save')->name("exercise.save")->middleware('checkRole:trainer');
Route::get('trainer/exercise/list', 'ExerciseController@list')->name("exercise.list")->middleware('checkRole:trainer');
Route::get('trainer/exercise/listbydescription', 'ExerciseController@listByDescription')->name("exercise.listByDescription")->middleware('checkRole:trainer');
Route::get('trainer/exercise/retrieve/{id}', 'ExerciseController@retrieve')->name("exercise.retrieve")->middleware('checkRole:trainer');
Route::post('trainer/exercise/delete/{id}', 'ExerciseController@delete')->name("exercise.delete")->middleware('checkRole:trainer');
Route::get('/trainer/exercise/update/{id}', 'ExerciseController@update')->name("exercise.update")->middleware('checkRole:trainer');
Route::post('/trainer/exercise/saveUpdate', 'ExerciseController@saveUpdate')->name("exercise.saveUpdate")->middleware('checkRole:trainer');




//Appointment
Route::get('/appointment/list/{userId}', 'AppointmentController@list')->name("appointment.listUser")->middleware('checkRole:user');
Route::post('/appointment/delete/{id}', 'AppointmentController@delete')->name("appointment.deleteUser")->middleware('checkRole:user');


//Comment
Route::get('/comment/create/{exerciseId}', 'CommentController@create')->name("comment.create")->middleware('checkRole:user');
Route::post('/comment/save', 'CommentController@save')->name("comment.save")->middleware('checkRole:user');
Route::get('/comment/list', 'CommentController@list')->name("comment.list")->middleware('checkRole:admin');
Route::get('/comment/sort/{order}', 'CommentController@sort')->name("comment.sort")->middleware('checkRole:admin');
Route::post('/comment/delete/{id}', 'CommentController@delete')->name("comment.delete")->middleware('checkRole:admin');


//Routine
Route::get('/routine/retrieve/{id}', 'RoutineController@retrieve')->name("routine.retrieve")->middleware('checkRole:user');
Route::get('/routine/list/{trainingId}', 'RoutineController@listUser')->name("routine.listUser")->middleware('checkRole:user');

Route::get('/trainer/routine/list/{trainingId}', 'RoutineController@listTrainer')->name("routine.listTrainer")->middleware('checkRole:trainer');
Route::get('/trainer/routine/create/{trainingId}', 'RoutineController@create')->name("routine.create")->middleware('checkRole:trainer');
Route::post('/trainer/routine/save', 'RoutineController@save')->name("routine.save")->middleware('checkRole:trainer');
Route::post('/trainer/routine/delete/{id}', 'RoutineController@delete')->name("routine.delete")->middleware('checkRole:trainer');
Route::get('/trainer/routine/update/{id}', 'RoutineController@update')->name("routine.update")->middleware('checkRole:trainer');
Route::post('/trainer/routine/saveUpdate', 'RoutineController@saveUpdate')->name("routine.saveUpdate")->middleware('checkRole:trainer');


//Training
Route::get('/training/list/', 'TrainingController@list')->name("training.list")->middleware('checkRole:user');

Route::get('/trainer/training/create/{id}', 'TrainingController@create')->name("training.create")->middleware('checkRole:trainer');
Route::get('/trainer/training/show/{id}', 'TrainingController@show')->name("training.show")->middleware('checkRole:trainer');
Route::post('/trainer/training/save/{id}', 'TrainingController@save')->name("training.save")->middleware('checkRole:trainer');
Route::post('/trainer/training/delete/{id}', 'TrainingController@delete')->name("training.delete")->middleware('checkRole:trainer');
Route::get('/trainer/training/update/{id}', 'TrainingController@update')->name("training.update")->middleware('checkRole:trainer');
Route::post('/trainer/training/saveUpdate', 'TrainingController@saveUpdate')->name("training.saveUpdate")->middleware('checkRole:trainer');
