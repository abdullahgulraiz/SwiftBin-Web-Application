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
	return redirect('/bins');
});

Route::group(['prefix' => 'bins'], function () {
	Route::get('/', 'BinController@getIndex');
	Route::get('/{id}', 'BinController@getObservations');
	Route::get('/input/{input}', 'BinController@getInputData');
});

Route::group(['prefix' => 'users'], function () {
	Route::get('/', 'UserController@getIndex');
	Route::get('/{id}', 'BinController@getObservations');
	Route::get('/input/{input}', 'BinController@getInputData');
});


Route::get('/logout', function() {
	Auth::logout();
});

Auth::routes();

Route::get('/home', 'HomeController@index');
