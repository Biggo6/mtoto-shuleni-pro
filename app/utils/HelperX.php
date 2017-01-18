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

    public static function getVersionLabel(){
        return '<label class="label label-warning">' . HelperX::getSystemVersion() .'</label>';
    }

    public static function getSystemVersion(){
        $localVersionFile = file_get_contents(base_path('version.json'));
        $localVersionJson = json_decode($localVersionFile, true);
        return 'v'.$localVersionJson['version'];
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