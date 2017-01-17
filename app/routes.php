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
	if(School::count()){
	 	if(HelperX::getSchoolInfo()->isStreamEnable == 1){
	 		Route::get('sections/manage', ['as'=>'sections.manage', 'uses'=>'SettingsController@sectionsManage']);	
	 	}
	}
	Route::post('sections/store', ['as'=>'sections.store', 'uses'=>'SettingsController@storeSections']);
	Route::get('sections/refreshWith', ['as'=>'sections.refreshWith', 'uses'=>'SettingsController@refreshSections']);
	Route::post('sections/edit/{id}', ['as'=>'sections.edit', 'uses'=>'SettingsController@editSection']);
	Route::post('sections/update/{id}', ['as'=>'sections.update', 'uses'=>'SettingsController@updateSection']);
	Route::post('sections/delete/{id}', ['as'=>'sections.delete', 'uses'=>'SettingsController@deleteSection']);
	//Classes
	Route::post('msclasses/store', ['as'=>'msclasses.store', 'uses'=>'ClassController@store']);
	Route::get('msclasses/refreshWith', ['as'=>'msclasses.refreshWith', 'uses'=>'ClassController@refreshWith']);
	Route::get('test', function(){
		return Biggo6\LaravelUpdater\LaravelUpdater::hello();
	});

});
