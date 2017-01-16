<?php

class SettingsController extends \BaseController {

	public function school(){
		return View::make('settings.school');
	}

	public function schoolUpdate(){

		sleep(1);
		
		$school_name = Input::get('school_name');
		$slogan      = Input::get('slogan');
		$address     = Input::get('address');
		$phone       = Input::get('phone');
		$fax         = Input::get('fax');
		$email       = Input::get('email');
		$website     = Input::get('website');
		$phyaddress  = Input::get('phyaddress');
		$region      = Input::get('region');
		$district    = Input::get('district');

		$check       = School::count();

		if($check){
			//update school
			$s = School::find(1);
			$s->name = $school_name;
			$s->slogan = $slogan;
			$s->address = $address;
			$s->phone = $phone;
			$s->fax = $fax;
			$s->email = $email;
			$s->website = $website;
			$s->physical_address = $phyaddress;
			$s->region = $region;
			$s->district = $district;
			$s->country = "Tanzania";
			
			if(Input::hasFile('schoolLogo')){
				$s->logo = HelperX::uplodFileThenReturnPath('schoolLogo');
			}

			if(Input::has('stream')){
				$s->isStreamEnable = 1;
			}else{
				$s->isStreamEnable = 0;
			}

			$s->save();
		}else{
			//insert school
			$s = new School;
			$s->name = $school_name;
			$s->slogan = $slogan;
			$s->address = $address;
			$s->phone = $phone;
			$s->fax = $fax;
			$s->email = $email;
			$s->website = $website;
			$s->physical_address = $phyaddress;
			$s->region = $region;
			$s->district = $district;
			$s->country = "Tanzania";
			
			if(Input::hasFile('schoolLogo')){
				$s->logo = HelperX::uplodFileThenReturnPath('schoolLogo');
			}

			if(Input::has('stream')){
				$s->isStreamEnable = 1;
			}else{
				$s->isStreamEnable = 0;
			}

			$s->save();
		}

		



	}

	public function schoolRefreshWith(){
		return Redirect::back()->withSuccess('successfully processed!');
	}

}