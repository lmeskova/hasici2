<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InsuranceCompany extends Model {

	protected $table = 'insurance_companies';
	public $timestamps = true;
	protected $fillable = array('name', 'code');

	public function incidents()
	{
		return $this->belongsToMany('App\Incident', 'incident_insurance_company');
	}

}