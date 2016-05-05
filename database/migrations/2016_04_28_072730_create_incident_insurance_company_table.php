<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIncidentInsuranceCompanyTable extends Migration {

	public function up()
	{
		Schema::create('incident_insurance_company', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('incident_id')->unsigned()->index();
			$table->integer('insurance_company_id')->unsigned()->index();
		});
	}

	public function down()
	{
		Schema::drop('incident_insurance_company');
	}
}