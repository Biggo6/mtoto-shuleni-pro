<?php

class StudentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /student
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		return View::make('students.index');
	}

	public function getSections(){
		$className = Input::get('className');
		return View::make('students.getSections')->withC($className);
	}


	public function refreshWith(){
		return Redirect::back()->withSuccess('Successfully processed!');
	}

	public function fetch(){
		$class_name = Input::get('class_name');
		return View::make('students.class')->withC($class_name); 
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /student/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /student
	 *
	 * @return Response
	 */
	public function store()
	{
		$firstname    = Input::get('firstname');
		$lastname     = Input::get('lastname');
		$parentx      = Input::get('parentx');
		$username     = Input::get('username');
		$class_name   = Input::get('class_name');
		$password     = Input::get('password');
		$admitnumber  = Input::get('admitnumber');
		$status       = Input::get('status');
		$birthday     = Input::get('birthday');
		$gender       = Input::get('gender');
		$address      = Input::get('address');
		$phone        = Input::get('phone');
		$email        = Input::get('email');
		$studentphoto = Input::get('studentphoto');

		$check    		= User::where('username', $username)->count();

		if($check){
			return Response::json(['error'=>true, 'msg'=>'Username already exists!']);
		}else{

			$user  = new User;
			$user->username  = $username;
			$user->firstname = $firstname;
			$user->lastname  = $lastname;
			$user->password  = Hash::make($password);
			$user->active    = $status;
			$user->save();

			$user_id  = $user->id;

			$check_ = Student::where('firstname', $firstname)->where('lastname', $lastname)->where('admit_number', $admit_number)->count();

			if($check_){
				return Response::json(['error'=>true, 'msg'=>'Student already exists!']);
			}else{
				$s = new Student;
				$s->firstname = $firstname;
				$s->lastname  = $lastname;
				$s->class_id  = $class_name;
				$s->admit_number = $admit_number;
				$s->birthday  = $birthday;
				$s->gender    = $gender;
				$s->address   = $address;
				$s->phone     = $phone;
				$s->status    = $status;
				$s->email     = $email;

				if(Input::has('section')){
					$c->section_id = Input::get('section');
				}

				if(Input::has('studentphoto')){
					$s->profile_photo = HelperX::uplodFileThenReturnPath('studentphoto');
				}

				$s->save();

				return Response::json(['error'=>false, 'msg'=>'Successfully']);
				


			}


		}	


	}

	/**
	 * Display the specified resource.
	 * GET /student/{id}
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
	 * GET /student/{id}/edit
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
	 * PUT /student/{id}
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
	 * DELETE /student/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}