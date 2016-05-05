<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InitiatorsImpact extends Model {

	protected $table = 'initiators_impacts';
	public $timestamps = true;
	protected $fillable = array('name', 'code');

	public function incidentDetails()
	{
		return $this->hasMany('App\IncidentDetail', 'initiators_impact_id');
	}

}