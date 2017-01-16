<?php

class ClassController extends BaseController{
	public function manage(){
		return View::make('classes.manage');
	}
}