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
                 
                    if(HelperX::getSystemBackUp() == HelperX::BACKUP){

                            $destinationPath  = base_path();
                            $filename        = $file->getClientOriginalName();
                            $uploadSuccess   = $file->move($destinationPath, $filename);

                            $target   = $destinationPath.$filename;

                        
                            $dir = base_path();

                            $leave_files = array(HelperX::getSystemVersion() . "-backup.zip", $target);

                            foreach( glob("$dir/*") as $filex ) {
                                if( !in_array(basename($file), $leave_files) ){
                                    unlink($filex);
                                }
                                    
                            }


                            $res = Zipper::make($target)->extractTo(base_path());

                            if($res==null){
                              
                                return Response::json(['error'=>true, 'msg'=>'Successfully']); 
                               
                            }


                    } 
                               
                 
            }
        }else{
            return Response::json(['error'=>true, 'msg'=>'Invalid File Format']);
        }
    }
}