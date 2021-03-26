<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddClassNameToExammarksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('exammarks', function(Blueprint $table)
		{
			$table->string('class_name');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('exammarks', function(Blueprint $table)
		{
			$table->dropColumn('class_name');
		});
	}

}
