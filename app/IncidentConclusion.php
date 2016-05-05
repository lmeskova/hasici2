<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncidentConclusion extends Model {

	protected $table = 'incident_conclusions';
	public $timestamps = true;
	protected $fillable = array('name', 'code');

	public function incidentDetails()
	{
		return $this->hasMany('App\IncidentDetail', 'incident_conclusion_id');
	}

}