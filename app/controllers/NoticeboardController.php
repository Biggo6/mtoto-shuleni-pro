<?php

class NoticeboardController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /noticeboard
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	public function add(){
		return View::make('noticeboards.add');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /noticeboard/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	public function getStudents(){
		return View::make('noticeboards.getStudents')->withData(Input::all());
	}

	public function manage(){
		return View::make('noticeboards.manage');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /noticeboard
	 *
	 * @return Response
	 */
	public function store()
	{
		
		//return dd(Input::all());

		if(HelperX::getCode() == 0){
			return Response::json(['error'=>true, 'msg'=>'You dont have SMS enough please recharge!f']);			
		}

		$title   		= Input::get('title');
		$notice  		= Input::get('notice');


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
						$phone = Parentx::find($student_id)->phone;

						if($phone == ""){
							return Response::json(['error'=>true, 'msg'=>'Please provide Parent Mobile Number!']);	
						}else{
							$code = substr($phone, 0, 3);
							if($code == "255"){
								$ms = HelperX::sendSMSApi("MTOTOSHULE", $phone, $notice);
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

	/**
	 * Display the specified resource.
	 * GET /noticeboard/{id}
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
	 * GET /noticeboard/{id}/edit
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
	 * PUT /noticeboard/{id}
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
	 * DELETE /noticeboard/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}