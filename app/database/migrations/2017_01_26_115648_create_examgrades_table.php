<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExamgradesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('examgrades', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->integer('grade_point');
			$table->float('mark_from');
			$table->float('mark_upto');
			$table->text('comment');
			$table->integer('status');
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
		Schema::drop('examgrades');
	}

}
