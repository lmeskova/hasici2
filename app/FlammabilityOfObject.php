<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FlammabilityOfObject extends Model {

	protected $table = 'flammability_of_objects';
	public $timestamps = true;
	protected $fillable = array('name', 'code');

	public function damagedObjects()
	{
		return $this->hasMany('App\DamagedObject', 'flammability_of_object_id');
	}

}