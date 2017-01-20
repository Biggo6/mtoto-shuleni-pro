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

			$user  = new User;
			$user->username  = $username;
			$user->firstname = $fullname;
			$user->password  = Hash::make($password);
			$user->active    = $status;
			$user->save();

			$user_id  = $user->id;

			$check_ = Parent::where('fullname', $fullname)->count();

			if($check_){
				return Response::json(['error'=>true, 'msg'=>'Parent name already exists!']);
			}else{
				$p = new Parent;
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

	public function refreshWith(){

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
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /parent/{id}
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
	 * DELETE /parent/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}