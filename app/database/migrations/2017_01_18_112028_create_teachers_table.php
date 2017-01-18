<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeachersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teachers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('firstname');
			$table->string('lastname');
			$table->date('birthday');
			$table->string('gender');
			$table->string('address');
			$table->string('phone');
			$table->string('email');
			$table->string('username');
			$table->string('password');
			$table->integer('status');
			$table->string('profile_photo');
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
		Schema::drop('teachers');
	}

}
