<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FireExtinguisher extends Model {

	protected $table = 'fire_extinguishers';
	public $timestamps = true;
	protected $fillable = array('code');

	public function damagedObjects()
	{
		return $this->hasMany('App\DamagedObject', 'fire_extinguisher_id');
	}

}