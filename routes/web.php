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

Route::get('/', 'HomeController@index')->name("home.index");
Route::get('/record/createRecord', 'RecordController@create')->name("record.createRecord");
Route::post('/record/save', 'RecordController@save')->name("record.save");
Route::get('/record/sort/{order}','RecordController@sort')->name("record.sort");
Route::get('/record/listRecords', 'RecordController@list')->name("record.listRecords");
Route::get('/record/delete/{id}', 'RecordController@delete')->name("record.delete");
Route::get('/record/show/{id}', 'RecordController@show')->name("record.show");
