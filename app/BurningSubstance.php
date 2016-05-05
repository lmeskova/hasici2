<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BurningSubstance extends Model {

	protected $table = 'burning_substances';
	public $timestamps = true;
	protected $fillable = array('name', 'code');

	public function incidentDetails()
	{
		return $this->hasMany('App\IncidentDetail', 'burning_substance_id');
	}

}