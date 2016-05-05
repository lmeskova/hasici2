<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpreadingCause extends Model {

	protected $table = 'spreading_causes';
	public $timestamps = true;
	protected $fillable = array('name', 'code');

	public function damagedObjects()
	{
		return $this->hasMany('App\DamagedObject', 'spreading_cause_id');
	}

}