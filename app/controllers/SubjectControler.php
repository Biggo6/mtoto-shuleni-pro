<?php

class SubjectControler extends \BaseController {

	public function refreshWith(){
		return Redirect::back()->withSuccess('successfully update');
	}

	/**
	 * Display a listing of the resource.
	 * GET /subjectcontroler
	 *
	 * @return Response
	 */
	public function manage()
	{
		return View::make('subjects.manage');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /subjectcontroler/create
	 *
	 * @return Response
	 */
	

	/**
	 * Store a newly created resource in storage.
	 * POST /subjectcontroler
	 *
	 * @return Response
	 */
	public function store()
	{

		
		$subject         = Input::get('subject');
		$class_name      = Input::get('class_name');
		$class_section   = (Input::get('class_section') == "all") ? 0 : Input::get('class_section');
		$subject_teacher = Input::get('subject_teacher');
		$status 		 = Input::get('status');

		$check = Subject::where('name', $subject)->where('class_id', $class_name)->where('teacher_id', $subject_teacher)->where('section_id', $class_section)->count();

		if($check){
			return Response::json(['error'=>true, 'msg'=>'Subject Already registered']);
		}else{
			$s = new Subject;
			$s->name = $subject;
			$s->class_id = $class_name;
			$s->section_id = $class_section;
			$s->teacher_id = $subject_teacher;
			$s->status = $status;
			$s->save();
			return Response::json(['error'=>false, 'msg'=>'Successfully']);


		}


	}

	/**
	 * Display the specified resource.
	 * GET /subjectcontroler/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	

	/**
	 * Show the form for editing the specified resource.
	 * GET /subjectcontroler/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		return $id;
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /subjectcontroler/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /subjectcontroler/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$row_id  = Input::get('row_id');
		$subject = Subject::find($row_id)->delete(); 
	}

}