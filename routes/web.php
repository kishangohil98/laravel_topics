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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/data','DataController@index');

Route::post('/post','PostController@store');

//Adding data into department
Route::get('/department','DataController@department');

//adding data into employee
Route::get('/employee','DataController@employee');

//get data of employee through department relation
Route::get('/getemp/{id}','DataController@getEmployee')->where('id', '[0-9]+');