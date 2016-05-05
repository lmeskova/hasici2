<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInitiatorsImpactsTable extends Migration {

	public function up()
	{
		Schema::create('initiators_impacts', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('code', 10)->index();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('initiators_impacts');
	}
}