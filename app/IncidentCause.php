<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncidentCause extends Model {

	protected $table = 'incident_causes';
	public $timestamps = true;
	protected $fillable = array('name', 'code');

	public function incidentDetails()
	{
		return $this->hasMany('App\IncidentDetail', 'incident_cause_id');
	}

}