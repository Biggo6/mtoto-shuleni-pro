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
})->before('ssl');

Route::post('app/doLogin', ['as'=>'app.doLogin', 'uses'=>'AppController@doLogin']);



Route::group(['before'=>'auth'], function(){

	Route::get('selfupdater/check', 'UpdateController@check');
	Route::post('app/update', ['as'=>'app.update', 'uses'=>'UpdateController@appUpdate']);

    Route::group(['prefix' => 'messages'], function () {
        Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
        Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
        Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
        Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
        Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
    });

	//Students
    Route::post('students/doPromo', ['as'=>'students.doPromo', 'uses'=>'StudentController@doPromo']);
    Route::get('students/admit', ['as'=>'students.admit', 'uses'=>'StudentController@admit']);
	Route::get('students/manage', ['as'=>'students.manage', 'uses'=>'StudentController@index']);
    Route::get('students/promotion', ['as'=>'students.promotion', 'uses'=>'StudentController@promotion']);
    Route::post('students/promotion', ['as'=>'students.promotionx', 'uses'=>'StudentController@promotionx']);
	Route::post('students/fetch', ['as'=>'students.fetch', 'uses'=>'StudentController@fetch']);
	Route::post('students/changepassword', ['as'=>'students.changepassword', 'uses'=>'StudentController@changepassword']);
	Route::post('students/destroy/{id}', ['as'=>'students.destroy', 'uses'=>'StudentController@destroy']);
	Route::post('students/edit/{id}', ['as'=>'students.edit', 'uses'=>'StudentController@edit']);
	Route::post('students/update/{id}', ['as'=>'students.update', 'uses'=>'StudentController@update']);
	Route::post('students/store', ['as'=>'students.store', 'uses'=>'StudentController@store']);
	Route::post('students/storex', ['as'=>'students.store', 'uses'=>'StudentController@storex']);
	Route::get('students/refreshWith', ['as'=>'students.refreshWith', 'uses'=>'StudentController@refreshWith']);
	Route::post('students/getSections', ['as'=>'students.getSections', 'uses'=>'StudentController@getSections']);
	Route::post('students/getSubjects', ['as'=>'students.getSubjects', 'uses'=>'StudentController@getSubjects']);
    Route::get('students/bulkImport', ['as'=>'students.bulkImport', 'uses'=>'StudentController@bulkImport']);
    Route::post('students/bulkImport', ['as'=>'students.bulkImport_', 'uses'=>'StudentController@bulkImport_']);
	//Parents
	Route::get('parents/manage', ['as'=>'parents.manage', 'uses' => 'ParentController@index']);
	Route::get('parents/refreshWith', ['as'=>'parents.refreshWith', 'uses' => 'ParentController@refreshWith']);
	Route::post('parents/store', ['as'=>'parents.store', 'uses'=>'ParentController@store']);
	Route::post('parents/changepassword', ['as'=>'parents.changepassword', 'uses'=>'ParentController@changepassword']);
	Route::post('parents/destroy/{id}', ['as'=>'parents.destroy', 'uses'=>'ParentController@destroy']);
	Route::post('parents/edit/{id}', ['as'=>'parents.edit', 'uses'=>'ParentController@edit']);
	Route::post('parents/update/{id}', ['as'=>'parents.update', 'uses'=>'ParentController@update']);

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
	Route::get('app/refresh', ['as'=>'app.refreshWith', 'uses'=>'AppController@refreshWith']);


    //Exams
    Route::get('exams/list', ['as'=>'exams.list', 'uses'=>'ExamController@listexams']);
    Route::get('exams/tubulationSheet', ['as'=>'exams.tubulationSheet', 'uses'=>'ExamController@tubulationSheet']);
    Route::get('exams/marks', ['as'=>'exams.marks', 'uses'=>'ExamController@marks']);
    Route::get('exams/grade', ['as'=>'exams.grade', 'uses'=>'ExamController@gradeexams']);
    Route::post('exams/searchStudent', ['as'=>'exams.searchStudent', 'uses'=>'ExamController@searchStudent']);
    Route::post('exams/saveMarks', ['as'=>'exams.saveMarks', 'uses'=>'ExamController@saveMarks']);
    Route::post('exams/grade', ['as'=>'exams.gradex', 'uses'=>'ExamController@gradeexamsx']);
    Route::post('exams/list', ['as'=>'exams.listx', 'uses'=>'ExamController@listexamsx']);
    Route::post('exams/edit_list/{id}', ['as'=>'exams.edit_list', 'uses'=>'ExamController@edit_list']);
    Route::post('exams/destroy_list/{id}', ['as'=>'exams.destroy_list', 'uses'=>'ExamController@destroy_list']);
    Route::post('exams/update_list/{id}', ['as'=>'exams.update_list', 'uses'=>'ExamController@update_list']);
    Route::post('exams/edit_grade/{id}', ['as'=>'exams.edit_grade', 'uses'=>'ExamController@edit_grade']);
    Route::post('exams/destroy_grade/{id}', ['as'=>'exams.destroy_grade', 'uses'=>'ExamController@destroy_grade']);
    Route::post('exams/update_grade/{id}', ['as'=>'exams.update_grade', 'uses'=>'ExamController@update_grade']);
    Route::post('exams/startManageMarks', ['as'=>'exams.startManageMarks', 'uses'=>'ExamController@startManageMarks']);


	//Users Management
	Route::get('users/permissions', ['as'=>'users.permissions', 'uses'=>'UserController@permissions']);
    Route::get('users/manage', ['as'=>'users.manage', 'uses'=>'UserController@manage']);
    Route::get('users/refreshWith', ['as'=>'users.refreshWith', 'uses'=>'UserController@refreshWith']);
    Route::get('users/roles', ['as'=>'users.roles', 'uses'=>'UserController@roles']);
    Route::post('users/history', ['as'=>'users.history', 'uses'=>'UserController@history']);
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
		
		dd(HelperX::BACKUP);
		
	});

});
