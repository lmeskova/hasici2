<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model {

	protected $table = 'areas';
	public $timestamps = true;
	protected $fillable = array('name', 'code');

	public function incidentDetails()
	{
		return $this->hasMany('App\IncidentDetail', 'area_id');
	}

}