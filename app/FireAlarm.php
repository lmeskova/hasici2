<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FireAlarm extends Model {

	protected $table = 'fire_alarms';
	public $timestamps = true;
	protected $fillable = array('name', 'code');

	public function damagedObjects()
	{
		return $this->hasMany('App\DamagedObject', 'fire_alarm_id');
	}

}