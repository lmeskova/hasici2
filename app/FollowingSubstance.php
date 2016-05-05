<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FollowingSubstance extends Model {

	protected $table = 'following_substances';
	public $timestamps = true;
	protected $fillable = array('code');

	public function incidentDetails()
	{
		return $this->hasMany('App\IncidentDetail', 'following_substance_id');
	}

}