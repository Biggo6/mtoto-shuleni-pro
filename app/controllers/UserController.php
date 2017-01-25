<?php


class UserController  extends BaseController{
	public function permissions(){
		return View::make('users.permissions.index');
	}
    public function manage(){
        return View::make('users.manage');
    }
    public function refreshWith(){
        return Redirect::back()->withSuccess('Successfully processed');
    }

    public function  roles(){
        return View::make('users.roles');
    }

    public function  history(){
        $user_id = Input::get('user_id');
        $user = User::find($user_id);
        return View::make('users.history')->withUser($user);
    }

}