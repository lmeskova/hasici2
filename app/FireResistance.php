<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FireResistance extends Model {

	protected $table = 'fire_resistances';
	public $timestamps = true;
	protected $fillable = array('name', 'code');

	public function damagedObjects()
	{
		return $this->hasMany('App\DamagedObject', 'fire_resistance_id');
	}

}