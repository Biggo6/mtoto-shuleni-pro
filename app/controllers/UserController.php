<?php


class UserController  extends BaseController{
	public function permissions(){
		return View::make('users.permissions.index');
	}
    public function manage(){
        return View::make('users.manage');
    }
    public function refreshWith(){
        return Redirect::back()->withSuccess('Successfully processed');
    }

    public function  roles(){
        return View::make('users.roles');
    }

    public function  history(){
        $user_id = Input::get('user_id');
        $user = User::find($user_id);
        return View::make('users.history')->withUser($user);
    }

    public function storeAdmin(){
        
        $firstname = Input::get('firstname');
        $lastname = Input::get('lastname');
        $username = Input::get('username');
        $password = Input::get('password');
        $status   = Input::get('status');


        $check = User::where('username', $username)->count();


        if($check){
            return Response::json(['error'=>true, 'msg'=>'Username exists']);
        }

        $perms = (Input::get('perms'));
        
        if(count($perms) == 0){
            return Response::json(['error'=>true, 'msg'=>'Please Choose Some Permissions']);
        }

         $check_ = Role::where('name', 'custom_admin')->count();

        if($check_){
            $role_id = Role::where('name', 'custom_admin')->first()->id;
        }else{
            $r = new Role;
            $r->name   = 'custom_admin';
            $r->system = 0;
            $r->save();
            $role_id = $r->id;
        }


        $u = new User;
        $u->username  = $username;
        $u->password  = Hash::make($password);
        $u->firstname = $firstname;
        $u->lastname = $lastname;
        $u->active    = $status;
        $u->role_id   = $role_id;
        $u->save();



        

        $user_id = $u->id;

        foreach ($perms as $p) {
            $px = new Permission;
            $px->name    = $p;
            $px->user_id = $user_id;
            $px->save(); 
        }

        return Response::json(['error'=>false, 'msg'=>'Successfully']);
    }

}