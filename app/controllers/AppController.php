<?php

class AppController extends BaseController{
	public function doLogin(){
		$credx = [
			"username" => Input::get('username'),
			"password" => Input::get('password'),
			"active"   => 1
 		];
		if(Auth::attempt($credx)){
			return Redirect::route('app.dashboard');
		}else{
			return Redirect::back()->withError('Invalid login information');
		}
	}
	public function dashboard(){
		return View::make('dashboard');
	}

	public function logout(){
		Auth::logout();
		return Redirect::to('/')->withSuccess('Successfully Logout');
	}
}