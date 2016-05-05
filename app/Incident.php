<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Incident extends Model {

	protected $table = 'incidents';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = array('user_id', 'evidence_number', 'town_id', 'address', 'property_owner_id', 'property_user_id', 'ownership_id', 'damage_specification_id', 'damage_type_id', 'industry_type_id', 'direct_damage_value', 'followup_damage_value', 'saved_value', 'observe_date', 'report_date');

	public function town()
	{
		return $this->belongsTo('App\Town', 'town_id');
	}

	public function insuranceCompanies()
	{
		return $this->belongsToMany('App\InsuranceCompany', 'incident_insurance_company');
	}

	public function ownership()
	{
		return $this->belongsTo('App\Ownership', 'ownership_id');
	}

	public function damageType()
	{
		return $this->belongsTo('App\DamageType', 'damage_type_id');
	}

	public function damageSpecification()
	{
		return $this->belongsTo('App\DamageSpecification', 'damage_specification_id');
	}

	public function propertyOwner()
	{
		return $this->belongsTo('App\PropertyOwner', 'property_owner_id');
	}

	public function propertyUser()
	{
		return $this->belongsTo('App\PropertyUser', 'property_user_id');
	}

	public function industryType()
	{
		return $this->belongsTo('App\IndustryType', 'industry_type_id');
	}

	public function user()
	{
		return $this->belongsTo('App\User', 'user_id');
	}

	public function injuries()
	{
		return $this->hasMany('App\Injury', 'injury_id');
	}

	public function incidentDetail()
	{
		return $this->hasOne('App\IncidentDetail', 'incident_detail_id');
	}

	public function damagedObject()
	{
		return $this->hasOne('App\DamagedObject', 'incident_id');
	}

}