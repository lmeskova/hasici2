<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InjuryCause extends Model {

	protected $table = 'injury_causes';
	public $timestamps = true;
	protected $fillable = array('name', 'code');

	public function injuries()
	{
		return $this->hasMany('App\Injury', 'injury_cause_id');
	}

}