<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConveyorEquipment extends Model {

	protected $table = 'conveyor_equipments';
	public $timestamps = true;
	protected $fillable = array('name', 'code');

	public function incidentDetails()
	{
		return $this->hasMany('App\IncidentDetail', 'conveyor_equipment_id');
	}

}