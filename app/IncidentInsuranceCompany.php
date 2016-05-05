<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncidentInsuranceCompany extends Model {

	protected $table = 'incident_insurance_company';
	public $timestamps = false;
	protected $fillable = array('incident_id', 'insurance_company_id');

}