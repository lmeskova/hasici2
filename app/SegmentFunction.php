<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SegmentFunction extends Model {

	protected $table = 'segment_functions';
	public $timestamps = true;
	protected $fillable = array('name', 'code');

	public function damagedObjects()
	{
		return $this->hasMany('App\DamagedObject', 'segment_function_id');
	}

}