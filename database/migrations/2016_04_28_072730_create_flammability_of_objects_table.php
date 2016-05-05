<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFlammabilityOfObjectsTable extends Migration {

	public function up()
	{
		Schema::create('flammability_of_objects', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('code', 10)->index();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('flammability_of_objects');
	}
}