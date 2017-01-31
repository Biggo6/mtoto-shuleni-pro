<?php


class HelperX {


    const BACKUP = "backup";

	public static function getClassesFromModelsDir(){
		$dir = app_path() . '/models/';
		$files = scandir($dir);
		$models = [];
		foreach ($files as $file) {
			$models[] = str_replace(".php", "", $file);
		}
		return $models;
	}

    public static function copy($source, $target) {
        if (!is_dir($source)) {//it is a file, do a normal copy
            copy($source, $target);
            return;
        }

        //it is a folder, copy its files & sub-folders
        @mkdir($target);
        $d = dir($source);
        $navFolders = array('.', '..');
        while (false !== ($fileEntry=$d->read() )) {//copy one by one
            //skip if it is navigation folder . or ..
            if (in_array($fileEntry, $navFolders) ) {
                continue;
            }

            //do copy
            $s = "$source/$fileEntry";
            $t = "$target/$fileEntry";
            self::copy($s, $t);
        }
        $d->close();
    }

    public static function getSystemBackUp(){
        $files = glob(base_path() . '/*');
        try{
            $version = HelperX::getSystemVersion() . ".zip";
            Zipper::make(base_path() . '/' . $version . '-backup')->add($files)->close();
            return "backup";
        }catch(Exception $s){
            return $s->getMessage();
        }
    }

    public static function getGrade($point){
        $check = Examgrade::where('mark_from', '<=', $point)->where('mark_upto', '>=', $point)->where('deleted_at', NULL)->get();
        if(count($check)){
            foreach ($check as $p) {
                return $p->name;
            }
        }else{
            return '-';
        }
    }


    public static  function getStudentMark($student_id, $sub, $clas, $sect){
        $studentMark = Exammark::where('student_id', $student_id)->where('class_name', $clas)->where('section', $sect)->where('subject', $sub)->where('running_year', date('Y'))->count();
        if($studentMark){
            return Exammark::where('student_id', $student_id)->where('class_name', $clas)->where('section', $sect)->where('subject', $sub)->where('running_year', date('Y'))->first()->marks;
        }else{
            return 0;
        }
    }

     public static  function getStudentMarkX($student_id, $sub, $clas){
        $studentMark = Exammark::where('student_id', $student_id)->where('class_name', $clas)->where('subject', $sub)->where('running_year', date('Y'))->count();
        if($studentMark){
            return Exammark::where('student_id', $student_id)->where('class_name', $clas)->where('subject', $sub)->where('running_year', date('Y'))->first()->marks;
        }else{
            return 0;
        }
    }

    public static  function getStudentMarkComment($student_id, $sub, $clas, $sect){
        $studentMark = Exammark::where('student_id', $student_id)->where('class_name', $clas)->where('subject', $sub)->where('running_year', date('Y'))->count();
        if($studentMark){
            return Exammark::where('student_id', $student_id)->where('class_name', $clas)->where('subject', $sub)->where('running_year', date('Y'))->first()->comment;
        }else{
            return "";
        }
    }

    public static function getNextYear(){
        return date('Y', strtotime('+1 year'));
    }

    public static function getNextOfNextYear(){
        return date('Y', strtotime('+2 year'));
    }

    public static function getVersionLabel(){
        return '<label class="label label-warning">' . HelperX::getSystemVersion() .'</label>';
    }

    public static function getSystemVersion(){
        $localVersionFile = file_get_contents(base_path('version.json'));
        $localVersionJson = json_decode($localVersionFile, true);
        return 'v'.$localVersionJson['version'];
    }

    public static function updateLogouttime() {
        $check = LoginHistory::where('user_id', Auth::user()->id)->count();
        if ($check == 0) {
            $ln = new LoginHistory;
            $ln->user_id = Auth::user()->id;
            $ln->logouttime = Carbon::now();
            $ln->save();
        } else {
            $check1 = LoginHistory::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->where('logouttime', '=', '0000-00-00 00:00:00')->first();
            if (count($check1)) {
                $check1->logouttime = Carbon::now();
                $check1->save();
            } else {
                $check1->logouttime = Carbon::now();
                $check1->save();
            }
        }
    }
    public static function updateLogintime() {
        $check = LoginHistory::where('user_id', Auth::user()->id)->count();
        if ($check == 0) {
            $ln = new LoginHistory;
            $ln->user_id = Auth::user()->id;
            $ln->logintime = Carbon::now();
            $ln->save();
        } else {
            $check = LoginHistory::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->where('logouttime', '=', '0000-00-00 00:00:00')->first();
            if (count($check)) {
                //$check->logouttime = Carbon::now();
                //$check->save();
                $ln = new LoginHistory;
                $ln->user_id = Auth::user()->id;
                $ln->logintime = Carbon::now();
                $ln->save();
            } else {
                $ln = new LoginHistory;
                $ln->user_id = Auth::user()->id;
                $ln->logintime = Carbon::now();
                $ln->save();
            }
        }
    }
    public static function getLoginTime($user_id) {
        $check = LoginHistory::where('user_id', $user_id)->orderBy('id', 'DESC')->first();
        if (count($check)) {
            return "<label class='label label-success'>" . $check->logintime . "</label>";
        } else {
            return "<label class='label label-danger'>Never Login</label>";
        }
    }

    public static  function  getRoleName(){
        return Role::where('id', Auth::user()->role_id)->first()->name;
    }
    public static function getLogoutTime($user_id) {
        $check = LoginHistory::where('user_id', $user_id)->orderBy('id', 'DESC')->where('logouttime', '!=', '0000-00-00 00:00:00')->first();
        if (count($check)) {
            return "<label class='label label-success'>" . $check->logouttime . "</label>";
        } else {
            $check = LoginHistory::where('user_id', $user_id)->orderBy('id', 'DESC')->where('logouttime', '=', '0000-00-00 00:00:00')->where('logintime', '!=', '0000-00-00 00:00:00')->first();
            if (count($check)) {
                return "<label class='label label-primary'>Still in System</label>";
            } else {
                return "<label class='label label-danger'>Never Logout</label>";
            }
        }
    }

    public static function getStatus($s)
    {
        if ($s == 1) {
            return "<label class='label label-success'>Active</label>";
        } else {
            return "<label class='label label-danger'>Blocked</label>";
        }
    }

    public static function ve($data){
        return View::make('partials._ve')->withData($data);
    }

	public static function getSchoolInfo(){
		return School::find(1);
	}

	public static function uplodFileThenReturnPath($fileStringInput, $destinationPath='uploads/companylogos/')
    {
        $file            = Input::file($fileStringInput);
        $archivo         = value(function () use ($file) {
            $filename = str_random(10) . '.' . $file->getClientOriginalExtension();
            return strtolower($filename);
        });
        $filename = $archivo; //str_random(6) . '_' . $file->getClientOriginalName();
        $url      = $destinationPath . $filename;
        try {
            $uploadSuccess = $file->move($destinationPath, $filename);
            if ($uploadSuccess) {
                $path = url($url);
                return $path;
            }
        } catch (Exception $ex) {
            return $ex->getMessage(); 
        }
    }

}