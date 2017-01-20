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

	//Parents
	Route::get('parents/manage', ['as'=>'parents.manage', 'uses' => 'ParentController@index']);
	Route::get('parents/refreshWith', ['as'=>'parents.refreshWith', 'uses' => 'ParentController@refreshWith']);
	Route::post('parents/store', ['as'=>'parents.store', 'uses'=>'ParentController@store']);
	Route::post('parents/destroy/{id}', ['as'=>'parents.destroy', 'uses'=>'ParentController@destroy']);

	//Teachers
	Route::get('teachers/manage', ['as'=>'teachers.manage', 'uses'=>'TeacherController@manage']);
	Route::post('teachers/store', ['as'=>'teachers.store', 'uses'=>'TeacherController@store']);
	Route::get('teachers/refreshWith', ['as'=>'teachers.refreshWith', 'uses'=>'TeacherController@refreshWith']);
	Route::post('teachers/delete/{id}', ['as'=>'teachers.delete', 'uses'=>'TeacherController@delete']);
	Route::post('teachers/edit/{id}', ['as'=>'teachers.edit', 'uses'=>'TeacherController@edit']);
	Route::post('teachers/update/{id}', ['as'=>'teachers.update', 'uses'=>'TeacherController@update']);
	Route::post('teachers/changepassword', ['as'=>'teachers.changepassword', 'uses'=>'TeacherController@changepassword']);

	//App
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
	// if(School::count()){
	//  	if(HelperX::getSchoolInfo()->isStreamEnable == 1){
	Route::get('sections/manage', ['as'=>'sections.manage', 'uses'=>'SettingsController@sectionsManage']);	
	//  	}
	// }
	Route::post('sections/store', ['as'=>'sections.store', 'uses'=>'SettingsController@storeSections']);
	Route::get('sections/refreshWith', ['as'=>'sections.refreshWith', 'uses'=>'SettingsController@refreshSections']);
	Route::post('sections/edit/{id}', ['as'=>'sections.edit', 'uses'=>'SettingsController@editSection']);
	Route::post('sections/update/{id}', ['as'=>'sections.update', 'uses'=>'SettingsController@updateSection']);
	Route::post('sections/delete/{id}', ['as'=>'sections.delete', 'uses'=>'SettingsController@deleteSection']);
	
	Route::get('subjects/manage', ['as'=>'subjects.manage', 'uses' => 'SubjectControler@manage']);
	Route::post('subjects/store', ['as'=>'subjects.store', 'uses'=>'SubjectControler@store']);
	Route::post('subjects/update/{id}', ['as'=>'subjects.update', 'uses'=>'SubjectControler@update']);
	Route::get('subjects/refreshWith', ['as'=>'subjects.refreshWith', 'uses'=>'SubjectControler@refreshWith']);
	Route::post('subjects/destroy/{id}', ['as'=>'subjects.destroy', 'uses'=>'SubjectControler@destroy']);
	Route::post('subjects/edit/{id}', ['as'=>'subjects.edit', 'uses'=>'SubjectControler@edit']);
	
	//Classes
	
	Route::post('msclasses/store', ['as'=>'msclasses.store', 'uses'=>'ClassController@store']);
	Route::post('msclasses/update/{id}', ['as'=>'msclasses.update', 'uses'=>'ClassController@update']);
	Route::get('msclasses/refreshWith', ['as'=>'msclasses.refreshWith', 'uses'=>'ClassController@refreshWith']);
	Route::post('msclasses/destroy/{id}', ['as'=>'msclasses.destroy', 'uses'=>'ClassController@destroy']);
	Route::post('msclasses/edit/{id}', ['as'=>'msclasses.edit', 'uses'=>'ClassController@edit']);
	
	Route::get('test', function(){
		// $files = glob('files/*');
		// try{
		// 	Zipper::make(public_path() . '/quibdo.zip')->add($files)->close();
		// 	return "good";
		// }catch(Exception $s){
		// 	return $s->getMessage();
		// }
		//Zipper::make(public_path() . '/quibdo.zip')->extractTo(public_path() . '/files');
		return HelperX::getSystemVersion();
	});

});
