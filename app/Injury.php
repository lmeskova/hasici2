<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Injury extends Model {

	protected $table = 'injuries';
	public $timestamps = true;
	protected $fillable = array('injury_circumstances', 'injury_causes', 'injury_types', 'injury_categories', 'incident_id');

	public function injuryCircumstance()
	{
		return $this->belongsTo('App\InjuryCircumstance', 'injury_circumstance_id');
	}

	public function injuryCause()
	{
		return $this->belongsTo('App\InjuryCause', 'injury_cause_id');
	}

	public function injuryType()
	{
		return $this->belongsTo('App\InjuryType', 'injury_type_id');
	}

	public function injuryCategory()
	{
		return $this->belongsTo('App\InjuryCategories', 'injury_category_id');
	}

	public function incident()
	{
		return $this->belongsTo('App\Incident', 'incident_id');
	}

}