<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehiclePart extends Model {

	protected $table = 'vehicle_parts';
	public $timestamps = true;
	protected $fillable = array('name', 'code');

	public function incidentDetails()
	{
		return $this->hasMany('App\IncidentDetail', 'vehicle_part_id');
	}

}