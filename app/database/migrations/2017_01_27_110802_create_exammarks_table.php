<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExammarksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exammarks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('examlist_id');
			$table->integer('student_id');
			$table->float('marks');
			$table->text('comment');
			$table->integer('status');
			$table->string('running_year');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('exammarks');
	}

}
