<?php


class UpdateController extends BaseController{
	public function check(){
        return View::make('packages.biggo6.laravel-updater.checker');
	}
}