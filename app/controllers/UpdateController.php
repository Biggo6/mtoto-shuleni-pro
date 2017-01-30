<?php


class UpdateController extends BaseController{
	public function check(){
        return View::make('packages.biggo6.laravel-updater.checker');
	}

    public function appUpdate(){
        $currentVersion = Input::get('currentVersion');
        if(Input::hasFile('updateSoftware')){
            $file = Input::file('updateSoftware');
            if($file->getClientOriginalExtension() != "zip"){
                return Response::json(['error'=>true, 'msg'=>'Invalid File Uploaded! Please Check Administrator']);
            }else{
                 
                    $destinationPath  = public_path() . '/files/tmp/';
                    $filename        = $file->getClientOriginalName();
                    $uploadSuccess   = $file->move($destinationPath, $filename);

                    if($uploadSuccess){
                        $target   = $destinationPath.$filename;

                        if(HelperX::getSystemBackUp() == HelperX::BACKUP){

                            $dir = base_path();

                            $leave_files = array(HelperX::getSystemVersion() . ".zip", $target);

                            foreach( glob("$dir/*") as $file ) {
                                if( !in_array(basename($file), $leave_files) )
                                    unlink($file);
                            }



                            $res = (Zipper::make($target)->extractTo(base_path());

                            if($res==null){
                              
                                return Response::json(['error'=>true, 'msg'=>'Successfully']); 
                               
                            }
                        }

    
                    }else{
                        return Response::json(['error'=>true, 'msg'=>'There was a problem with the upload. Please try again.']);  
                    }

                    
                 
            }
        }else{
            return Response::json(['error'=>true, 'msg'=>'Invalid File Format']);
        }
    }
}