<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrganizationShortcoming extends Model {

	protected $table = 'organization_shortcomings';
	public $timestamps = true;
	protected $fillable = array('name', 'code');

	public function incidentDetails()
	{
		return $this->hasMany('App\IncidentDetail', 'organization_shortcoming_id');
	}

}