<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class AddAdmin extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'mtotoshuleni:add-admin';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'This Command that will be adding admin to the app';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$this->info('Welcome to MtotoShuleni Pro!');
		$this->info('Create Admin Below:');
		$username =  $this->ask('Enter Username: ');
		while($username == ""){
			$username =  $this->ask('Please Enter Username: ');
		}
		$password =  $this->secret('Enter Password: ');
		while($password == ""){
			$password =  $this->secret('Please Enter Password: ');
		}
		$cpassword = $this->secret('Enter Confirm Password: ');
		while($cpassword == ""){
			$cpassword = $this->secret('Enter Confirm Password: ');
		}
		if($password != $cpassword){
			$this->info('Passwords Mismatch!');
			$this->info('================================');
			$this->info('');
			$this->call('mtotoshuleni:add-admin');
		}else{
			$admin = User::where('username', 'admin')->count();
			if($admin){
				User::where('username', 'admin')->first()->delete();
			}
			$user = new User;
			$user->username = $username;
			$user->firstname = "John";
			$user->lastname = "Doe";
			$user->password = Hash::make($password);
			$user->save();
			$this->info('Successfully added!');
			$this->info('================================');
			$this->info('');
		}

	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			
		);
	}

}
