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

Route::match(['get', 'post'],'/', 'TaskController@show');
Route::get('/taskform', 'TaskController@create');
Route::get('/deltask/{id}', 'TaskController@destroy');
Route::post('/addtask', 'TaskController@store');
