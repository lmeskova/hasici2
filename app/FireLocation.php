<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FireLocation extends Model {

	protected $table = 'fire_locations';
	public $timestamps = true;
	protected $fillable = array('name', 'code');

	public function incidentDetails()
	{
		return $this->hasMany('App\IncidentDetail', 'fire_location_id');
	}

}