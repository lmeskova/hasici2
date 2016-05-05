<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InjuryCircumstance extends Model {

	protected $table = 'injury_circumstances';
	public $timestamps = true;
	protected $fillable = array('name', 'code');

	public function injuries()
	{
		return $this->hasMany('App\Injury', 'injury_circumstances_id');
	}

}