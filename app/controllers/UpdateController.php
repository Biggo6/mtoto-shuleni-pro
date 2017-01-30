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

                            if($uploadSuccess){
                                $target   = $destinationPath . "/". $filename;
                                $zip = new ZipArchive;
                                if ($zip->open($target) === TRUE) {

                                    // Future release we will consider this
                                    // if ($zip->setPassword("MySecretPassword"))
                                    // {
                                    //     if (!$zip->extractTo(__DIR__))
                                    //         echo "Extraction failed (wrong password?)";
                                    // }

                                    $zip->extractTo(base_path());
                                    $zip->close();
                                    
                                    $old = getcwd();
                                    chdir($destinationPath);
                                    unlink($filename);
                                    chdir($old);

                                    Artisan::call('migrate', array('--force' => true));

                                   

                                } else {
                                   //$zip->open($target);
                                }
                            }

                            

                            

                            return Response::json(['error'=>false, 'msg'=>'Successfully ' ]); 

                        

                            


                    } 
                               
                 
            }
        }else{
            return Response::json(['error'=>true, 'msg'=>'Invalid File Format']);
        }
    }
}