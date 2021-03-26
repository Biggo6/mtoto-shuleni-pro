<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMsclassTeacherTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('msclass_teacher', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('msclass_id')->unsigned()->index();
			$table->foreign('msclass_id')->references('id')->on('msclasses')->onDelete('cascade');
			$table->integer('teacher_id')->unsigned()->index();
			$table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
			$table->timestamps();
			//$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('msclass_teacher');
	}

}
