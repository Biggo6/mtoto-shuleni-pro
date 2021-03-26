<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentpromotionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('studentpromotions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('currentyear');
			$table->string('promotedyear');
			$table->string('classfrom');
			$table->string('classpromoted');
			$table->string('sectionfrom');
			$table->string('sectionto');
			$table->timestamps();
            $table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('studentpromotions');
	}

}
