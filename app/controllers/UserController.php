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

    public function updatePerms(){
        
        
        $user_id  = Input::get('user_id');

        if(Input::has('perms')){
            Permission::where('user_id', $user_id)->delete();
            $perms = Input::get('perms');
            foreach ($perms as $p) {
                $px = new Permission;
                $px->name    = $p;
                $px->user_id = $user_id;
                $px->save(); 
            }
        }    

    }


    public function updateUser(){
        $row_id     = Input::get('row_id');
        $firstname  = Input::get('firstname');
        $lastname   = Input::get('lastname');
        $username   = Input::get('username');
        $status     = Input::get('status');


        $check = User::where('id', $row_id)->where('username', $username)->count();

        if($check){
                //update

                $us = User::find($row_id);
                $us->firstname = $firstname;
                $us->lastname  = $lastname;
                $us->username  = $username;
                $us->active    = $status;
                $us->save();
                return Response::json(['error'=>false, 'msg'=>'Successfully added']);
        }else{
            $check_ = User::where('id', '!=',$row_id)->where('username', $username)->count();
            if($check_){
                return Response::json(['error'=>true, 'msg'=>'Username already registered']);
            }else{
                //update
                $us = User::find($row_id);
                $us->firstname = $firstname;
                $us->lastname  = $lastname;
                $us->username  = $username;
                $us->active    = $status;
                $us->save();
                return Response::json(['error'=>false, 'msg'=>'Successfully added']);
            } 
        }

    }

    public function editUser(){
        $user = Input::get('user');
        $usr  = User::find($user);
        return View::make('users.editUser')->withUser($usr);
    }


    public function getUserPerms(){
        $user = Input::get('user');
        sleep(1);
        return View::make('users.getUserPerms')->withUser($user);
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