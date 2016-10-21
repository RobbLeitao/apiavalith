<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::group(['middleware' => ['api','cors'],'prefix' => 'api'], function () {

    Route::post('register', 'APIController@register');
    Route::post('login', 'APIController@login');
	Route::post('get_user_details', 'APIController@get_user_details');
});

Route::group(['middleware' => 'jwt-auth'], function () {

	Route::get('/home', 'HomeController@index');

	Route::resource('client', 'ClientController');
	Route::resource('computer', 'ComputerController');
	Route::resource('monitor', 'MonitorController');

	Route::post('monitor/{idMonitor}/client/{idClient}', 'MonitorController@addClient');
	Route::post('computer/{idComputer}/client/{idClient}', 'ComputerController@addClient');

	Route::auth();	
});