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

}