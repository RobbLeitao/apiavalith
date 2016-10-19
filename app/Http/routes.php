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

Route::resource('client', 'ClientController');

Route::post('monitor/{idMonitor}/client/{idClient}', 'MonitorController@addClient');
Route::post('computer/{idComputer}/client/{idClient}', 'ComputerController@addClient');

Route::resource('computer', 'ComputerController');
Route::resource('monitor', 'MonitorController');