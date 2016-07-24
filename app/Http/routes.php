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

use App\Job;

Route::get('/jobs', 'JobController@index');
Route::get('/', 'JobController@index');

/*Route::group(['middleware' => ['auth']], function(){
	Route::get('new-job', 'JobController@create');
	Route::post('new-job', 'JobController@store');
	Route::get('edit/{slug}', 'JobController@edit');
	Route::post('update', 'JobController@update');
	Route::get('delete/{id}', 'JobController@destroy');
});*/

Route::group(['middleware' => ['auth']], function(){
	Route::get('new-job', 'JobController@create');
	Route::post('new-job', 'JobController@store');
	Route::get('edit/{slug}', 'JobController@edit');
	Route::post('update', 'JobController@update');
	Route::get('delete/{id}', 'JobController@destroy');
});
Route::auth();

Route::get('/home', 'HomeController@index');
