<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDamagedObjectsTable extends Migration {

	public function up()
	{
		Schema::create('damaged_objects', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('damage_degree_id')->unsigned()->index();
			$table->float('dimension_value', 8,2)->nullable()->index();
			$table->integer('segment_function_id')->unsigned()->index();
			$table->integer('segment_altitude_id')->unsigned()->index();
			$table->integer('fire_resistance_id')->unsigned()->index();
			$table->integer('flammability_of_object_id');
			$table->integer('fire_shutter_id')->unsigned()->index();
			$table->integer('shutter_resistance_id')->unsigned()->index();
			$table->integer('spreading_cause_id')->unsigned()->index();
			$table->integer('fire_alarm_id')->unsigned()->index();
			$table->integer('fire_extinguisher_id')->unsigned()->index();
			$table->integer('chemical_id')->unsigned()->index();
			$table->timestamps();
			$table->integer('incident_id')->unsigned()->index();
		});
	}

	public function down()
	{
		Schema::drop('damaged_objects');
	}
}