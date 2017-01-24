<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class Init extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'mtotoshuleni:init';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'This Command that will be initilazing app..';

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
		$this->info('');
		$this->info('');
		$this->info('MtotoShuleni Pro! - Initializing........');
		
		$this->info('');
		$this->info('');
		try{
			$this->call('migrate:refresh');
		}catch(Exception $x){
			$this->call('migrate');
		}finally{
            $faker = Faker\Factory::create();
			$s = new School;
			$s->name = "MtotoShuleni Pro";
            $s->slogan = $faker->text;
            $s->phone = "+255712315840";
            $s->address = "P.O BOX 8545";
            $s->email = "info@mtotoshuleni.co.tz";
            $s->website = "http://mtotoshuleni.co.tz";
            $s->logo = url("/uploads/companylogos/w2bnif8zwz.png");
			$s->save();
			$this->info('dump data was added successfully........');
			$this->call('mtotoshuleni:add-admin');	
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
			//array('example', InputArgument::REQUIRED, 'An example argument.'),
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
			//array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}
