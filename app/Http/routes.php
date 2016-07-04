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

Route::auth();

// Just some static pages
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/news', 'HomeController@news');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth'], function () {
	Route::get('/', 'DashboardController@index');
 	Route::get('/{any}', 'DashboardController@index');
});

// Add some auth middleware to this...
Route::group(['namespace' => 'Api', 'prefix' => 'api'], function() {
	Route::resource('games', 'GamesController');
	Route::resource('platforms', 'PlatformsController');
	Route::resource('users', 'UsersController');
	Route::resource('tournaments', 'TournamentsController');
});