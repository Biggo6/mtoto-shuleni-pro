<?php

class ClassController extends BaseController{
	public function manage(){
		return View::make('classes.manage');
	}
	public function store(){

	}

	public function refreshWith(){
		return Redirect::back()->withSuccess('Successfully processed');
	}
}