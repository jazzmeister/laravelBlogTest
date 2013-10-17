<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/



Route::resource('posts', 'PostsController');
Route::resource('allPosts', 'PostsController@showPosts');

Route::get('/', 'HomeController@getIndex');
Route::get('login', 'HomeController@getLogin');
Route::get('register', 'HomeController@getRegister');
Route::post('register', 'HomeController@postRegister');
Route::post('login', 'HomeController@postLogin');
Route::get('logout', 'HomeController@logout');

Route::group(array('before' => 'auth'), function(){

	Route::get('admin', 'AdminController@getIndex');
	
});

Route::get('password/reset', array(
	'uses' => 'PasswordController@remind',
	'as' => 'password.remind'
));

Route::post('password/reset/{token}', array(
	'uses' => 'PasswordController@request',
	'as' => 'password.request'
));

Route::get('password/reset/{token}', array(
	'uses' => 'PasswordController@reset',
	'as' => 'password.reset'
));

Route::post('password/reset/{token}', array(
	'uses' => 'PasswordController@update',
	'as' => 'password.update'
));

