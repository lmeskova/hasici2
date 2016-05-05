<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FlammableSubstance extends Model {

	protected $table = 'flammable_substances';
	public $timestamps = true;
	protected $fillable = array('name', 'code');

	public function incidentDetails()
	{
		return $this->hasMany('App\IncidentDetail', 'flammable_substance_id');
	}

}