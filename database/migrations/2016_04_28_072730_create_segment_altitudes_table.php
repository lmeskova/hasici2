<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSegmentAltitudesTable extends Migration {

	public function up()
	{
		Schema::create('segment_altitudes', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('code', 10)->index();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('segment_altitudes');
	}
}