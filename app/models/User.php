<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

use Cmgmyr\Messenger\Traits\Messagable;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use SoftDeletingTrait;
    use Messagable;
	protected $dates = ['deleted_at'];

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


	public function roles() {
        return $this->belongsToMany('Role');
    }

    public function permissions() {
        return $this->hasMany('Permission');
    }

    public function hasRole($key) {
        foreach($this->roles as $role){
            if($role->name === $key)
            {
                return true;
            }
        }
        return false;
    }

}
