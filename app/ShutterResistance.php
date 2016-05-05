<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShutterResistance extends Model {

	protected $table = 'shutter_resistances';
	public $timestamps = true;
	protected $fillable = array('name', 'code');

	public function damagedObjects()
	{
		return $this->hasMany('App\DamagedObject', 'shutter_resistance_id');
	}

}