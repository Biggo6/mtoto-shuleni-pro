<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class BuildApp extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'mtotoshuleni:build';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'This Command that will build mtotoshuleni ready for production use!';

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
		$this->info('MtotoShuleni Pro! - Building Tool');
		$this->info('');
		$this->info('This will build the whole system ready for production. ');
		$ans =  $this->ask('(default: Y or yes): ');
		if($ans == "Y" || $ans == "yes" || $ans == "YES" || $ans == "" || $ans == "y"){
			$path = base_path() . "/build";
			if(!File::exists($path)){
				$this->info('Creating build folder .....');
				$result = File::makeDirectory($path);
				$this->info('Build folder was created!');		
			}
			
			$this->info('');
			$this->info('Let Us Go Together!');
			$this->info('');
			$this->info('...');

			$files = glob(base_path() . '/app');
			Zipper::make(base_path() . '/build/izwebtools/app.zip')->add($files)->close();
			$path2 = base_path() . '/build/izwebtools/app';		
			if(!File::exists($path2)){
				$this->info('... ...');
				$result = File::makeDirectory($path2);	
			}	
			Zipper::make(base_path() . '/build/izwebtools/app.zip')->extractTo(base_path() . '/build/izwebtools/app');

			

			$this->info('... ... ...');

			$files_ = glob(base_path() . '/bootstrap');
			Zipper::make(base_path() . '/build/izwebtools/bootstrap.zip')->add($files_)->close();
			$path2_ = base_path() . '/build/izwebtools/bootstrap';		
			if(!File::exists($path2_)){
				$this->info('... ... ... ...');
				$result = File::makeDirectory($path2_);	
			}	
			Zipper::make(base_path() . '/build/izwebtools/bootstrap.zip')->extractTo(base_path() . '/build/izwebtools/bootstrap');

			$this->info('... ... ... ... ....');

			$filesu = glob(base_path() . '/vendor');
			Zipper::make(base_path() . '/build/izwebtools/vendor.zip')->add($filesu)->close();
			$path2__ = base_path() . '/build/izwebtools/vendor';		
			if(!File::exists($path2__)){
				$this->info('... ... ... ... .... ....');
				$result = File::makeDirectory($path2__);	
			}	
			Zipper::make(base_path() . '/build/izwebtools/bootstrap.zip')->extractTo(base_path() . '/build/izwebtools/bootstrap');
			$this->info('');

			$filesxx = glob(base_path() . '/public');
		    Zipper::make(base_path() . '/build/izwebtools/public.zip')->add($filesxx)->close();
			$path2x = base_path() . '/build/izwebtools/public';		
			if(!File::exists($path2x)){
				$this->info('... ... ... ... .... ....');
				$result = File::makeDirectory($path2x);	
			}	
			$this->info('....... ....... ');
			Zipper::make(base_path() . '/build/izwebtools/public.zip')->extractTo(base_path() . '/build');


			$this->info('At middle of Something ......');

			$this->info('');

			$files1 = glob(base_path() . '/version.json');
			Zipper::make(base_path() . '/build/izwebtools/version.json')->add($files1)->close();			
			Zipper::make(base_path() . '/build/izwebtools/version.json')->extractTo(base_path() . '/build/izwebtools');

			$files2 = glob(base_path() . '/composer.json');
			Zipper::make(base_path() . '/build/izwebtools/composer.json')->add($files2)->close();			
			Zipper::make(base_path() . '/build/izwebtools/composer.json')->extractTo(base_path() . '/build/izwebtools');

			
			$this->info('');

			$this->info('');
			$this->info('Housing Keeping ......');
			$this->info('');
			try{
				$old = getcwd();
            	chdir(base_path() . '/build/izwebtools/');
            	unlink('app.zip');
            	unlink('bootstrap.zip');
            	unlink('public.zip');
            	unlink('vendor.zip');
            	unlink('version.json.zip');
            	unlink('composer.json.zip');
            	
			}catch(Exception $x){

				//$this->info('Error ' . $x->getMessage());

			}finally{
				chdir($old);
				$this->info('....... ....... ...... ......');


				
				
				$this->info('Finilizing things .....');

				$this->info('');

				try{
					
	            	
				}catch(Exception $x2){
					$this->info('Error ' . $x2->getMessage());
				}finally{
					$this->info('... ... .... ....');
					$this->info('');
					$this->info('');
					

					$ansx =  $this->ask('(We zipping?): 1, 0 >>: ');

					$this->info('');
					$this->info('');

					if($ansx == 1){
						$filesx = (base_path() . "/build");
						$this->info('....... ...ZIPPING NOW... ........');
						$this->info('');
						$this->info('');
						Zipper::make(base_path() . "/build/" . HelperX::getSystemVersion() . ".zip")->add($filesx)->close();
						$this->info('....... ...FINISHED - ZIPPING PROCESS... ........');
						$this->info('');
						$this->info('');
						$this->info('....... ....... ');
					}

					
	

			  		$this->info('===========================================');
					$this->info('Successfully...!');
					$this->info('===========================================');
				}

				
			}

			

			





			
		}else{
			$this->info('Aborted!');
			return;
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
