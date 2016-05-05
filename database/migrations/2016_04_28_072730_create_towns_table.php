<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTownsTable extends Migration {

	public function up()
	{
		Schema::create('towns', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('code', 6)->index();
			$table->integer('district_id')->unsigned()->index();
		});
	}

	public function down()
	{
		Schema::drop('towns');
	}
}