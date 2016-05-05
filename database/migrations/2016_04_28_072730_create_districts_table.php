<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDistrictsTable extends Migration {

	public function up()
	{
		Schema::create('districts', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name')->index();
			$table->string('code', 3)->index();
			$table->integer('region_id')->unsigned()->index();
		});
	}

	public function down()
	{
		Schema::drop('districts');
	}
}