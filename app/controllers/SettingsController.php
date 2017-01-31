<?php

class SettingsController extends \BaseController {

	public function school(){
		return View::make('settings.school');
	}

	public function editSection(){
		$row_id = Input::get('row_id');
		return View::make('settings.editSection')->withS(Section::find($row_id));
	}

	public function deleteSection(){
		$row_id = Input::get('row_id');
		Section::find($row_id)->delete();
	}

	public function doMigrate(){
		Artisan::call('migrate', array('--force' => true));
		return Redirect::to('app/dashboard')->withSuccess('Database Migrated Successfully!');
	}

	public function updateSection($id){
		
		sleep(1);

		$row_id = $id;//Input::get('row_id');
		$section_name = Input::get('section_name');
		$description  = Input::get('description');
		$status		  = Input::get('status');

		$check = Section::where('id', $row_id)->where('name', $section_name)->count();

		if(!$check){
				$check_ = Section::where('id', '!=', $row_id)->where('name', $section_name)->count();
				if($check_){
					return Response::json(['error'=>true, 'msg'=>'Section already registered!']);
				}else{
					//update here
					$s = Section::find($row_id);
					$s->name = $section_name;
					$s->description = $description;
					$s->status  = $status;
					$s->save();
					return Response::json(['msg'=>'Successfully processed!', 'error'=>false]);
				}
		}else{
			// update here
			$s = Section::find($row_id);
			$s->name = $section_name;
			$s->description = $description;
			$s->status  = $status;
			$s->save();
			return Response::json(['msg'=>'Successfully processed!', 'error'=>false]);
		}

		return Response::json(['error'=>true, 'msg'=>'Error']);
	}

	public function storeSections(){
		sleep(1);

		$section_name = Input::get('section_name');
		$description  = Input::get('description');
		$status		  = Input::get('status');

		$check        = Section::where('name', $section_name)->count();

		if($check){
			return Response::json(['msg'=>'Section or Stream already registered', 'error'=>true]);
		}else{
			$s = new Section;
			$s->name = $section_name;
			$s->description = $description;
			$s->status  = $status;
			$s->save();
			return Response::json(['msg'=>'Successfully added!', 'error'=>false]);
		}

	}

	public function sectionsManage(){
		return View::make('settings.sections');
	}

	public function refreshSections(){
		return Redirect::back()->withSuccess('Successfully run!');
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