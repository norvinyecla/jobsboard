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

Route::get('/jobs', ['as' => 'jobs.index', 'uses' => 'JobController@index']);
Route::get('/', 'JobController@index');
Route::get('/home', 'JobController@index');
Route::get('jobs/show/{id}', ['as' => 'jobs.show', 'uses' => 'JobController@show']);

Route::group(['as' => 'jobs.', 'middleware' => ['auth', 'App\Http\Middleware\AdminMiddleware']], function(){
	Route::get('jobs/add', ['as' => 'create', 'uses' => 'JobController@create']);
	Route::get('/jobs/my-job-posts', ['as' => 'myjobposts', 'uses' => 'JobController@myJobPosts']);
	Route::post('jobs/add', ['as' => 'store', 'uses' => 'JobController@store']);
	Route::get('jobs/edit/{id}', ['as' => 'edit', 'uses' => 'JobController@edit']);
	Route::patch('jobs/edit', ['as' => 'update', 'uses' => 'JobController@update']);
	Route::delete('delete/{id}', 'JobController@destroy');
});

Route::auth();
