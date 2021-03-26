<?php

class ClassController extends BaseController{
	public function manage(){
		return View::make('classes.manage');
	}

	public function destroy($id){
		$row_id = Input::get('row_id');
		Msclass::find($row_id)->delete();
	}

	public function edit($id){
		$row_id    = Input::get('row_id');
		$ms_class  = Msclass::find($row_id);
		return View::make('classes.edit')->withMs($ms_class); 
	}

	public function update($id){
		$row_id = Input::get('row_id');
		$class_name     = Input::get('class_name');
		$class_section  = Input::get('class_section');
		$description    = Input::get('description');
		$status 		= Input::get('status');
		$class_teacher  = Input::get('class_teacher');

		$check = MsClass::where('id', $row_id)->where('class_name', $class_name)->where('class_section', $class_section)->where('teacher_id', $class_teacher)->count();

		if($check){
			//update
			$c = Msclass::find($row_id);
			$c->class_name = $class_name;
			if(Input::has('class_section')){
				$c->class_section = $class_section;
			}
			$c->description = $description;
			$c->status = $status;
			$c->teacher_id = $class_teacher;
			$c->save();
		}else{
			$check_ = MsClass::where('id','!=', $row_id)->where('class_name', $class_name)->where('class_section', $class_section)->where('teacher_id', $class_teacher)->count();
			if($check_){
				return Response::json(['error'=>true, 'msg'=>'Class Name already used!']);
			}else{
				//update
				$c = Msclass::find($row_id);
				$c->class_name = $class_name;
				if(Input::has('class_section')){
					$c->class_section = $class_section;
				}
				$c->description = $description;
				$c->status = $status;
				$c->teacher_id = $class_teacher;
				$c->save();
			}

		}

	}

	public function store(){
		
		$class_name     = Input::get('class_name');
		$class_section  = Input::get('class_section');
		$description    = Input::get('description');
		$status 		= Input::get('status');
		$class_teacher  = Input::get('class_teacher');

		$check = MsClass::where('class_name', $class_name)->where('class_section', $class_section)->where('teacher_id', $class_teacher)->count();

		if($check){
			return Response::json(['error'=>true, 'msg'=>'Class already registered']);
		}else{
			$c = new Msclass;
			$c->class_name = $class_name;
			if(Input::has('class_section')){
				$c->class_section = $class_section;
			}
			$c->description = $description;
			$c->status = $status;
			$c->teacher_id = $class_teacher;
			$c->save();
			return Response::json(['error'=>false, 'msg'=>'Successfully']);
		}


	}

	public function refreshWith(){
		return Redirect::back()->withSuccess('Successfully processed');
	}
}