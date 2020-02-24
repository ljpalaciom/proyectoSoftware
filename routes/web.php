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
Route::get('/createRecord', 'RecordController@create')->name("record.createRecord");
Route::post('/product/save', 'RecordController@save')->name("record.save");
Route::get('/listRecords', 'RecordController@list')->name("record.listRecords");
