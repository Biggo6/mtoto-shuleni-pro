<?php

class TeacherController extends BaseController{
	public function manage(){
		return View::make('teachers.manage');
	}

	public function delete($id){
		$row_id = Input::get('row_id');
		$user_id  = Teacher::find($row_id)->user_id;
		User::find($user_id)->delete();
		Teacher::find($row_id)->delete();
	}

	public function edit($id){
		$row_id  = Input::get('row_id');
		$teacher = Teacher::find($row_id);
		return View::make('teachers.edit')->withTeacher($teacher); 
	}

	public function store(){
		
		$firstname      = Input::get('firstname');
		$lastname       = Input::get('lastname');
		$username       = Input::get('username');
		$password       = Input::get('password');
		$birthday       = Input::get('birthday');
		$gender         = Input::get('gender');
		$address        = Input::get('address');
		$phone          = Input::get('phone');
		$email          = Input::get('email');
		$status			= Input::get('status');

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

			$check_ = Teacher::where('firstname', $firstname)->where('lastname', $lastname)->count();

			if($check_){
				return Response::json(['error'=>true, 'msg'=>'Teacher name already exists!']);
			}else{
				$t = new Teacher;
				$t->firstname = $firstname;
				$t->lastname  = $lastname;
				$t->birthday  = $birthday;
				$t->gender    = $gender;
				$t->address   = $address;
				$t->phone     = $phone;
				$t->email     = $email;
				$t->status    = $status;
				$t->user_id   = $user_id;
				if(Input::hasFile('profile_photo')){
					$t->profile_photo = HelperX::uplodFileThenReturnPath('profile_photo');
				}
				$t->save();
				return Response::json(['error'=>false, 'msg'=>'Successfully!']);
			}

		}
		
		

		
	}
	public function refreshWith(){
		return Redirect::back()->withSuccess('successfully processed!');
	}
}