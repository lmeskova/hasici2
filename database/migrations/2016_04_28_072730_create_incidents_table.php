<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIncidentsTable extends Migration {

	public function up()
	{
		Schema::create('incidents', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index();
			$table->integer('evidence_number')->unsigned();
			$table->integer('town_id')->unsigned()->index();
			$table->string('address')->index();
			$table->integer('property_owner_id')->unsigned()->index();
			$table->integer('property_user_id')->unsigned()->index();
			$table->integer('ownership_id')->unsigned()->index();
			$table->integer('damage_specification_id')->unsigned()->index();
			$table->integer('damage_type_id')->unsigned()->index();
			$table->integer('industry_type_id')->unsigned()->index();
			$table->float('direct_damage_value', 8,2)->nullable()->index();
			$table->float('followup_damage_value', 8,2)->nullable()->index();
			$table->float('saved_value', 8,2)->nullable()->index();
			$table->datetime('observe_date')->index();
			$table->datetime('report_date')->index();
			$table->softDeletes();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('incidents');
	}
}