<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddStudentIdToStudentspromotionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('studentpromotions', function(Blueprint $table)
		{
			$table->integer('student_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('studentpromotions', function(Blueprint $table)
		{
			$table->dropColumn('student_id');
		});
	}

}
