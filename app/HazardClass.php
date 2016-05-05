<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HazardClass extends Model {

	protected $table = 'hazard_classes';
	public $timestamps = true;
	protected $fillable = array('name', 'code');

	public function incidentDetails()
	{
		return $this->hasMany('App\IncidentDetail', 'hazard_class_id');
	}

}