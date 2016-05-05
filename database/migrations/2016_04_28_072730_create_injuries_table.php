<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInjuriesTable extends Migration {

	public function up()
	{
		Schema::create('injuries', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('injury_circumstance_id')->unsigned()->index();
			$table->integer('injury_cause_id')->unsigned()->index();
			$table->integer('injury_type_id')->unsigned()->index();
			$table->integer('injury_category_id')->unsigned()->index();
			$table->integer('incident_id')->unsigned()->index();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('injuries');
	}
}