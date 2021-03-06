<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateElectricalWiringsTable extends Migration {

	public function up()
	{
		Schema::create('electrical_wirings', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('code', 10)->index();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('electrical_wirings');
	}
}