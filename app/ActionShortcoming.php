<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActionShortcoming extends Model {

	protected $table = 'action_shortcomings';
	public $timestamps = true;
	protected $fillable = array('name', 'code');

	public function incidentDetails()
	{
		return $this->hasMany('App\IncidentDetail', 'action_shortcoming_id');
	}

}