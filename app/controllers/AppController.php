<?php

class AppController extends BaseController{
	public function doLogin(){
		$credx = [
			"username" => Input::get('username'),
			"password" => Input::get('password'),
			"active"   => 1
 		];
		if(Auth::attempt($credx)){
            HelperX::updateLogintime();
			return Redirect::intended('app/dashboard');
		}else{
			return Redirect::back()->withError('Invalid login information');
		}
	}
	public function dashboard(){
		return View::make('dashboard');
	}

    public function refreshWith(){
        return Redirect::back()->withSuccess('Successfully processed!');
    }

	public function logout(){

        HelperX::updateLogouttime();
        Auth::logout();
		return Redirect::to('/')->withSuccess('Successfully Logout');
	}
}