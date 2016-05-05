<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIncidentDetailsTable extends Migration {

	public function up()
	{
		Schema::create('incident_details', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('incident_id')->unsigned()->index();
			$table->integer('area_id')->unsigned()->index();
			$table->integer('fire_location_id')->unsigned()->index();
			$table->integer('vehicle_part_id')->unsigned()->index();
			$table->integer('conveyor_equipment_id')->unsigned()->index();
			$table->integer('incident_cause_id')->unsigned()->index();
			$table->integer('flammable_substance_id')->unsigned()->index();
			$table->integer('initiator_id')->unsigned()->index();
			$table->integer('electrical_wiring_id')->unsigned()->index();
			$table->integer('initiators_impact_id')->unsigned()->index();
			$table->integer('burning_substance_id')->unsigned()->index();
			$table->integer('following_substance_id')->unsigned()->index();
			$table->integer('hazard_class_id')->unsigned()->index();
			$table->integer('organization_shortcoming_id')->unsigned()->index();
			$table->integer('action_shortcoming_id')->unsigned()->index();
			$table->integer('incident_conclusion_id')->unsigned()->index();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('incident_details');
	}
}