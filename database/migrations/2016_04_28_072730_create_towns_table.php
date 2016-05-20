<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTownsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('towns', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('code', 6)->index();
			$table->integer('district_id')->unsigned()->index();
		});
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('towns');
	}
}