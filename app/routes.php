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

Route::get('/', function()
{
	return View::make('auth.login');
});

Route::post('app/doLogin', ['as'=>'app.doLogin', 'uses'=>'AppController@doLogin']);

Route::group(['before'=>'auth'], function(){
	Route::get('app/dashboard', ['as'=>'app.dashboard', 'uses'=>'AppController@dashboard']);
	Route::get('app/logout', ['as'=>'app.logout', 'uses'=>'AppController@logout']);
	//Users Management
	Route::get('users/permissions', ['as'=>'users.permissions', 'uses'=>'UserController@permissions']);
	//Classes Management
	Route::get('classes/manage', ['as'=>'classes.manage', 'uses'=>'ClassController@manage']);
	//Settings Codes
	Route::get('settings/school', ['as'=>'settings.school', 'uses'=>'SettingsController@school']);
	Route::post('school/update', ['as'=>'school.update', 'uses'=>'SettingsController@schoolUpdate']);
	Route::get('school/refreshWith', ['as'=>'school.refreshWith', 'uses'=>'SettingsController@schoolRefreshWith']);
});
