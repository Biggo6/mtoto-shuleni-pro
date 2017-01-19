<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddTeacherIdToMsclassesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('msclasses', function(Blueprint $table)
		{
			$table->integer('teacher_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('msclasses', function(Blueprint $table)
		{
			$table->dropColumn('teacher_id');
		});
	}

}
