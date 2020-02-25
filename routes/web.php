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
    return view('home.index');
});

Route::get('/index', 'HomeController@index')->name("home.index");
Route::get('/user/create', 'UserController@create')->name("user.create");
Route::post('/user/save', 'UserController@save')->name("user.save");
Route::get('/user/list/', 'UserController@list')->name("user.list");
Route::get('/user/list/byName', 'UserController@listByName')->name("user.listByName");
Route::get('/user/show/{id}', 'UserController@show')->name("user.show");
Route::get('/user/delete/{id}', 'UserController@delete')->name("user.delete");
