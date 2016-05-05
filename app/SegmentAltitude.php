<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SegmentAltitude extends Model {

	protected $table = 'segment_altitudes';
	public $timestamps = true;
	protected $fillable = array('name', 'code');

	public function damagedObjects()
	{
		return $this->hasMany('App\DamagedObject', 'segment_altitude_id');
	}

}