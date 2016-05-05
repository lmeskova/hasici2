<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DamageDegree extends Model {

	protected $table = 'damage_degrees';
	public $timestamps = true;
	protected $fillable = array('name', 'code');

	public function damagedObjects()
	{
		return $this->hasMany('App\DamagedObject', 'damage_degree_id');
	}

}