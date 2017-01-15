<?php


class UserController  extends BaseController{
	public function permissions(){
		return View::make('users.permissions.index');
	}
}