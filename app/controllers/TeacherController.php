<?php

class TeacherController extends BaseController{
	public function manage(){
		return View::make('teachers.manage');
	}

	public function changepassword(){
		$tid  = Input::get('row_id');
		$password = Input::get('password_teacher');
		$user = User::find(Teacher::find($tid)->user_id);
		$user->password = Hash::make($password);
		$user->save();
	}

	public function update($id){
		$row_id = Input::get('row_id');

		$firstname      = Input::get('firstname');
		$lastname       = Input::get('lastname');
		$username       = Input::get('username');
		$birthday       = Input::get('birthday');
		$gender         = Input::get('gender');
		$address        = Input::get('address');
		$phone          = Input::get('phone');
		$email          = Input::get('email');
		$status			= Input::get('status');

		$user_check     = User::where('id', Teacher::find($row_id)->user_id)->where('username', $username)->count();

		if($user_check){
			//update 
			//update here
			$user  = User::find(Teacher::find($row_id)->user_id);
			$user->firstname = $firstname;
			$user->lastname  = $lastname;
			$user->username  = $username;
			$user->save();
		}else{
			$user_check_ = User::where('id', '!=',Teacher::find($row_id)->user_id)->where('username', $username)->count();
			if($user_check_){
				return Response::json(['error'=>true, 'msg'=>'Username already used!']);
			}else{
				//update
				$user  = User::find(Teacher::find($row_id)->user_id);
				$user->firstname = $firstname;
				$user->lastname  = $lastname;
				$user->username  = $username;
				$user->save();
			}
		}

		$check = Teacher::where('id', $row_id)->where('firstname', $firstname)->where('lastname', $lastname)->count();

		if(!$check){
				$check_ = Teacher::where('id', '!=', $row_id)->where('firstname', $firstname)->where('lastname', $lastname)->count();
				if($check_){
					return Response::json(['error'=>true, 'msg'=>'Teacher already registered!']);
				}else{
					

					$t = Teacher::find($row_id);
					$t->firstname = $firstname;
					$t->lastname  = $lastname;
					$t->birthday  = $birthday;
					$t->gender    = $gender;
					$t->address   = $address;
					$t->phone     = $phone;
					$t->email     = $email;
					$t->status    = $status;
					if(Input::hasFile('profile_photo_edit')){
						$t->profile_photo = HelperX::uplodFileThenReturnPath('profile_photo_edit');
					}
					$t->save();

					return Response::json(['msg'=>'Successfully processed!', 'error'=>false]);
				}
		}else{
			// update here
			

			$t = Teacher::find($row_id);
			$t->firstname = $firstname;
			$t->lastname  = $lastname;
			$t->birthday  = $birthday;
			$t->gender    = $gender;
			$t->address   = $address;
			$t->phone     = $phone;
			$t->email     = $email;
			$t->status    = $status;
			if(Input::hasFile('profile_photo_edit')){
				$t->profile_photo = HelperX::uplodFileThenReturnPath('profile_photo_edit');
			}
			$t->save();

			return Response::json(['msg'=>'Successfully processed!', 'error'=>false]);
		}
	}

	public function delete($id){
		$row_id = Input::get('row_id');
		$user_id  = Teacher::find($row_id)->user_id;
		User::find($user_id)->delete();
		Teacher::find($row_id)->delete();
	}

	public function edit($id){
		$row_id  = Input::get('row_id');
		$teacher = Teacher::find($id);
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



			$check_ = Teacher::where('firstname', $firstname)->where('lastname', $lastname)->count();

			if($check_){
				return Response::json(['error'=>true, 'msg'=>'Teacher name already exists!']);
			}else{

                $user  = new User;
                $user->username  = $username;
                $user->firstname = $firstname;
                $user->lastname  = $lastname;
                $user->password  = Hash::make($password);
                $user->active    = $status;
                $user->save();

                $user_id  = $user->id;

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