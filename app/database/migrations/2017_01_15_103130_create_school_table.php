<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSchoolTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('school', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('slogan');
			$table->string('address');
			$table->string('phone');
			$table->string('fax');
			$table->string('email');
			$table->string('website');
			$table->string('physical_address');
			$table->string('region');
			$table->string('district');
			$table->string('logo');
			$table->string('country');
			$table->integer('isStreamEnable')->default(1);
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
		Schema::drop('school');
	}

}
