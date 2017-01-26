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

	public function gradeexams(){
		return View::make('exams.grade');
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