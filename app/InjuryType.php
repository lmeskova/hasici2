<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InjuryType extends Model {

	protected $table = 'injury_types';
	public $timestamps = true;
	protected $fillable = array('name', 'code');

	public function injuries()
	{
		return $this->hasMany('App\Injury', 'injury_type_id');
	}

}