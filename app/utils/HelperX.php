<?php


class HelperX {
	public static function getClassesFromModelsDir(){
		$dir = app_path() . '/models/';
		$files = scandir($dir);
		$models = [];
		foreach ($files as $file) {
			$models[] = str_replace(".php", "", $file);
		}
		return $models;
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