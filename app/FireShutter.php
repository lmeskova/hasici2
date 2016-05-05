<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FireShutter extends Model {

	protected $table = 'fire_shutters';
	public $timestamps = true;
	protected $fillable = array('name', 'code');

	public function damagedObjects()
	{
		return $this->hasMany('App\DamagedObject', 'fire_shutter_id');
	}

}