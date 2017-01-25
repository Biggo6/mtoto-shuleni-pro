<?php

class ParentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /parent
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('parents.index');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /parent/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /parent
	 *
	 * @return Response
	 */
	public function store()
	{
		$fullname = Input::get('fullname');
		$email    = Input::get('email');
		$username = Input::get('username');
		$password = Input::get('password');
		$address  = Input::get('address');
		$phone    = Input::get('phone');
		$profession = Input::get('profession');
		$status     = Input::get('status');

		$check    		= User::where('username', $username)->count();

		if($check){
			return Response::json(['error'=>true, 'msg'=>'Username already exists!']);
		}else{



			$check_ = Parentx::where('fullname', $fullname)->count();

			if($check_){
				return Response::json(['error'=>true, 'msg'=>'Parent name already exists!']);
			}else{

                $user  = new User;
                $user->username  = $username;
                $user->firstname = $fullname;
                $user->password  = Hash::make($password);
                $user->active    = $status;
                $user->role_id = Role::where('name', 'parent')->first()->id;
                $user->save();

                $user_id  = $user->id;

				$p = new Parentx;
				$p->fullname = $fullname;
				$p->email    = $email;
				$p->status   = $status;
				$p->phone    = $phone;
				$p->address  = $address;
                $p->user_id = $user_id;
				$p->profession = $profession;
				$p->save();
				return Response::json(['error'=>false, 'msg'=>'Successfully']);
			}

		}
	}

	public function refreshWith(){
		return Redirect::back()->withSuccess('Successfully processed!');
	}

	/**
	 * Display the specified resource.
	 * GET /parent/{id}
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
	 * GET /parent/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$p = Parentx::find($id);
		return View::make('parents.edit')->withParentx($p);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /parent/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function changepassword(){
		$tid  = Input::get('row_id');
		$password = Input::get('password_teacher');
		$user = User::find(Parentx::find($tid)->user_id);
		$user->password = Hash::make($password);
		$user->save();
	}


	public function update($id)
	{

		$row_id = Input::get('row_id');
		$fullname = Input::get('fullname');
		$email    = Input::get('email');
		$username = Input::get('username');
		$address  = Input::get('address');
		$phone    = Input::get('phone');
		$profession = Input::get('profession');
		$status     = Input::get('status');

		$user_check     = User::where('id', Parentx::find($row_id)->user_id)->where('username', $username)->count();

		if($user_check){
			//update
			$user  = User::find(Parentx::find($row_id)->user_id);
			$user->firstname = $fullname;
			$user->username  = $username;
			$user->save();
		}else{
			$user_check_ = User::where('id', '!=',Parentx::find($row_id)->user_id)->where('username', $username)->count();
			if($user_check_){
				return Response::json(['error'=>true, 'msg'=>'Username already exists']);
			}else{
				//update
				$user  = User::find(Parentx::find($row_id)->user_id);
				$user->firstname = $fullname;
				$user->username  = $username;
				$user->save();
			}	
		}


		$check = Parentx::where('id', $row_id)->where('fullname', $fullname)->count();
		if($check){
			//update
			$p = Parentx::find($row_id);
			$p->fullname = $fullname;
			$p->email    = $email;
			$p->status   = $status;
			$p->phone    = $phone;
			$p->address  = $address;
			$p->profession = $profession;
			$p->save();
			return Response::json(['error'=>false, 'msg'=>'Successfully']);
		}else{
			$check_ = Parentx::where('id', '!=',$row_id)->where('fullname', $fullname)->count();
			if($check_){
				return Response::json(['error'=>true, 'msg'=>'Parent already exists']);	
			}else{
				//update
				$p = Parentx::find($row_id);
				$p->fullname = $fullname;
				$p->email    = $email;
				$p->status   = $status;
				$p->phone    = $phone;
				$p->address  = $address;
				$p->profession = $profession;
				$p->save();
				return Response::json(['error'=>false, 'msg'=>'Successfully']);
			}
		}



	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /parent/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$row_id = Input::get('row_id');
		Parentx::find($row_id)->delete();
	}

}