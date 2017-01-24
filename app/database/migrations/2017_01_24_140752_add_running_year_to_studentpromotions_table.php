<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddRunningYearToStudentpromotionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('studentpromotions', function(Blueprint $table)
		{
			$table->string('running_year');
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
			$table->dropColumn('running_year');
		});
	}

}
