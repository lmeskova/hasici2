<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Initiator extends Model {

	protected $table = 'initiators';
	public $timestamps = true;
	protected $fillable = array('name', 'code');

	public function incidentDetails()
	{
		return $this->hasMany('App\IncidentDetail', 'initiator_id');
	}

}