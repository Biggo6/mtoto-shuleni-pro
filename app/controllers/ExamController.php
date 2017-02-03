<?php

class ExamController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /exam
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	public function sendResult(){

		if(HelperX::getCode() == 0){
			return Response::json(['error'=>true, 'msg'=>'You dont have SMS enough please recharge!f']);			
		}

		$examlist   	= Input::get('exam_name');



		

		$toPublish = false;

		// dynamics
		
		$parent_cat     = Input::get('parent_cat');
		$send_as        = Input::get('send_as');

		if(Input::has('publish_now')){
			$publish_now = Input::get('publish_now');
			$toPublish = true;
		}else{
			$schudor_datetime = Input::get('schudor_datetime');
		}

		if(Input::get('notice_class') == "all"){
			// Update all School Students Parents

			$ctxx = Student::where('running_year', date('Y'))->orderBy('created_at', 'DESC')->count();

			if(HelperX::getCode() < $ctxx){
				return Response::json(['error'=>true, 'msg'=>'You dont have SMS enough please recharge!']);	
			}else{
				if($toPublish){
					HelperX::hashCode($ctxx);	
					//We send it!
					return Response::json(['error'=>false, 'msg'=>'Successfully sent!']);	
				}
					
			}

		}else{
			if($parent_cat == 1){
				//Single Student
				$student_id = Input::get('student_id');
				$notice_class	= Input::get('notice_class');



				if(HelperX::getCode() < 1){
					return Response::json(['error'=>true, 'msg'=>'You dont have SMS enough please recharge!']);	
				}else{
					if($toPublish){
						HelperX::hashCode(1);	
						//We send it!
						$phone = Parentx::find(Student::find($student_id)->parent_id)->phone;

						if($phone == ""){
							return Response::json(['error'=>true, 'msg'=>'Please provide Parent Mobile Number!']);	
						}else{
							$code = substr($phone, 0, 3);
							if($code == "255"){

								//$exammarks = Exammark::where('examlist_id', $examlist)->where('student_id', $student_id)->where('class_name', $notice_class)->where('running_year', date('Y'))->get();
		
								$subjects = DB::table('subjects')->join('msclasses', 'msclasses.id', '=', 'subjects.class_id')->select('subjects.name')->where('msclasses.class_name', $notice_class)
							->where('subjects.status', 1)->where('subjects.deleted_at', NULL)->distinct()->get();

								$smss = "Matokeo ya Mtoto wako ni kama ifuatavyo:- ";

								foreach ($subjects as $s) {
									$smss .=  " "  . $s->name . "-" . HelperX::getStudentMarkX($student_id, $s->name, $notice_class) . ". ";
								}

								$ms = HelperX::sendSMSApi("MTOTOSHULE", $phone, $smss);
								//$ms = "OK";
								if($ms == "OK"){
									Session::flash('success', "Successfully Sent!");
									return Response::json(['error'=>false, 'msg'=>'Successfully Sent!']);	
								}else{
									return Response::json(['error'=>true, 'msg'=>$ms]);	
								}
								
							}else{
								return Response::json(['error'=>true, 'msg'=>'Invalid Number, make sure the phone start with 255XXXXXXXXX']);	
							}
						}

						


							
					}
						
				}

			}else if($parent_cat == 2){
				//All Students
				$notice_class	= Input::get('notice_class');

				$ctx = Student::where('class_name', $notice_class)->where('running_year', date('Y'))->orderBy('created_at', 'DESC')->count();

				if(HelperX::getCode() < $ctx){
					return Response::json(['error'=>true, 'msg'=>'You dont have SMS enough please recharge!']);	
				}else{
					if($toPublish){
						HelperX::hashCode($ctx);	
						//We send it!
						return Response::json(['error'=>false, 'msg'=>'Successfully sent!']);	
					}
						
				}


			}else{
				// Multiple Students
				if(Input::has('students_ids')){
					if(HelperX::getCode() < count(Input::get('students_ids')) ){
						return Response::json(['error'=>true, 'msg'=>'You dont have SMS enough please recharge!']);	
					}else{
						if($toPublish){
							HelperX::hashCode(count(Input::get('students_ids')));	
							//We send it!
							return Response::json(['error'=>false, 'msg'=>'Successfully sent!']);	
						}
							
					}
				}else{
					//
					return Response::json(['error'=>true, 'msg'=>'Please Select Student First']);
				}
			}
		}
	}

	public function sendSMS(){
		return View::make('exams.sendSMS');
	}

	public function tubulationSheet(){
		return View::make('exams.tubulationSheet');
	}

	public function startManageMarks(){
		return View::make('exams.marks_manage')->withMarkmanager(Input::all());
	}

	public function marks(){
		return View::make('exams.marks');
	}


	public function getTabulationSheet(){
		return View::make('exams.getTabulationSheet')->withData(Input::all());
	}

	public function gradeexams(){
		return View::make('exams.grade');
	}

	public function studentResult(){
		return View::make('exams.studentResult')->withData(Input::all());
	}


	public function saveMarks(){

		$examlist_id      = Input::get('examlist_id');
		$students_ids     = Input::get('students_ids');
		$students_marks   = Input::get('students_marks');
		$students_comment = Input::get('students_comment');

		$sub = Input::get('subject');
		$sect = Input::get('section');
		$clas = Input::get('class_name');

		


		$c = 0;
		foreach ($students_ids as $student_id) {
			$check = Exammark::where('examlist_id', $examlist_id)->where('class_name', $clas)->where('section', $sect)->where('subject', $sub)->where('student_id', $student_id)->where('running_year', date('Y'))->count();

			if($check){
				// updaate
				$m = Exammark::where('examlist_id', $examlist_id)->where('class_name', $clas)->where('section', $sect)->where('subject', $sub)->where('student_id', $student_id)->where('running_year', date('Y'))->first();
				$m->examlist_id = $examlist_id;
				$m->student_id = $student_id;
				$m->running_year = date('Y');
				$m->comment      = $students_comment[$c];
				$m->marks     = $students_marks[$c];

				$m->class_name = $clas;
				$m->section = $sect;
				$m->subject = $sub;

				$m->save();
			}else{
				// insert
				$m = new Exammark;
				$m->examlist_id = $examlist_id;
				$m->student_id = $student_id;
				$m->running_year = date('Y');
				$m->comment      = $students_comment[$c];
				$m->marks     = $students_marks[$c];

				$m->class_name = $clas;
				$m->section = $sect;
				$m->subject = $sub;

				$m->save();
			}
			$c++;
		}

		

		return Redirect::back()->withSuccess('Successfully Saved!');
	}

	public function searchStudent(){

		if(Input::get('student') == ""){
			return View::make('exams.allStudents')->withData(Input::all());
		}else{
			return View::make('exams.searchStudent')->withData(Input::all());
		}
		
	}

	public function gradeexamsx(){
		$gradename  = Input::get('gradename');
		$markfrom   = Input::get('markfrom');
		$markupto   = Input::get('markupto');
		$comment    = Input::get('comment');
		$status     = Input::get('status');
		$gradepoint = Input::get('gradepoint');

		$check = Examgrade::where('name', $gradename)->count();
		if($check){
			return Response::json(['error'=>true, 'msg'=>'Grade already registered']);
		}else{
			$g = new Examgrade;
			$g->name = $gradename;
			$g->grade_point = $gradepoint;
			$g->mark_from = $markfrom;
			$g->mark_upto = $markupto;
			$g->comment = $comment;
			$g->status    = $status;
			$g->save();
			return Response::json(['error'=>false, 'msg'=>'Successfully']);
		}
	}

	public function update_grade($id){
		$eg_id    = Input::get('row_id');
		$gradename  = Input::get('gradename');
		$markfrom   = Input::get('markfrom');
		$markupto   = Input::get('markupto');
		$comment    = Input::get('comment');
		$status     = Input::get('status');
		$gradepoint = Input::get('gradepoint');

		$check = Examgrade::where('id', $eg_id)->where('name', $gradename)->count();
		if($check){
			//update
			$g = Examgrade::find($eg_id);
			$g->name = $gradename;
			$g->grade_point = $gradepoint;
			$g->mark_from = $markfrom;
			$g->mark_upto = $markupto;
			$g->comment = $comment;
			$g->status    = $status;
			$g->save();
			return Response::json(['error'=>false, 'msg'=>'Successfully']);
		}else{
			$check_ = Examgrade::where('id', '!=',$eg_id)->where('name', $gradename)->count();
			if($check_){
				return Response::json(['error'=>true, 'msg'=>'Grade already registered']);	
			}else{
				//update
				$g = Examgrade::find($eg_id);
				$g->name = $gradename;
				$g->grade_point = $gradepoint;
				$g->mark_from = $markfrom;
				$g->mark_upto = $markupto;
				$g->comment = $comment;
				$g->status    = $status;
				$g->save();
				return Response::json(['error'=>false, 'msg'=>'Successfully']);
			}
		}
	}	

	public function update_list($id){
	   $el_id    = Input::get('row_id');
	   $examname = Input::get('examname');
       $comment  = Input::get('comment');
       $examdate = date('Y-m-d',strtotime(Input::get('examdate')));
       $status   = Input::get('status');

       $check    = Examlist::where('id', $el_id)->where('name', $examname)->where('exam_date', $examdate)->count();

       if($check){
       		//update
       		$ex = Examlist::find($el_id);
       		$ex->name = $examname;
       		$ex->comment = $comment;
       		$ex->exam_date = $examdate;
       		$ex->status  = $status;
       		$ex->save();
       		return Response::json(['error'=>false, 'msg'=>'Successfully']);
       }else{
       		$check_    = Examlist::where('id','!=', $el_id)->where('name', $examname)->where('exam_date', $examdate)->count();
       		if($check_){
       			return Response::json(['error'=>true, 'msg'=>'Exam Name with that already registered']);	
       		}else{
       			//update
       			$ex = Examlist::find($el_id);
	       		$ex->name = $examname;
	       		$ex->comment = $comment;
	       		$ex->exam_date = $examdate;
	       		$ex->status  = $status;
	       		$ex->save();
	       		return Response::json(['error'=>false, 'msg'=>'Successfully']);
       		}
       }


	}

    public function listexams(){
        return View::make('exams.list');
    }

    public function edit_list(){
    	$row_id = Input::get('row_id');
    	return View::make('exams.edit_list')->withExamlist(Examlist::find($row_id));
    }

    public function edit_grade(){
    	$row_id = Input::get('row_id');
    	return View::make('exams.edit_grade')->withExamgrade(Examgrade::find($row_id));
    }

    public function destroy_list($id){
    	$row_id = Input::get('row_id');
    	Examlist::find($row_id)->delete();
    }

    public function destroy_grade($id){
    	$row_id = Input::get('row_id');
    	Examgrade::find($row_id)->delete();
    }



    public function listexamsx(){
       $examname = Input::get('examname');
       $comment  = Input::get('comment');
       $examdate = date('Y-m-d',strtotime(Input::get('examdate')));
       $status   = Input::get('status');

       $check   = Examlist::where('name', $examname)->where('exam_date', $examdate)->count();

       if($check){
       		return Response::json(['error'=>true, 'msg'=>'Exam Name with that already registered']);
       }else{
       		$ex = new Examlist;
       		$ex->name = $examname;
       		$ex->comment = $comment;
       		$ex->exam_date = $examdate;
       		$ex->status  = $status;
       		$ex->save();
       		return Response::json(['error'=>false, 'msg'=>'Successfully']);
       }

    }
	/**
	 * Show the form for creating a new resource.
	 * GET /exam/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /exam
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /exam/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /exam/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /exam/{id}
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
	 * DELETE /exam/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}