<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ElectricalWiring extends Model {

	protected $table = 'electrical_wirings';
	public $timestamps = true;
	protected $fillable = array('name', 'code');

	public function incidentDetails()
	{
		return $this->hasMany('App\IncidentDetail', 'electrical_wiring_id');
	}

}