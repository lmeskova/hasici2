<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chemical extends Model {

	protected $table = 'chemicals';
	public $timestamps = true;
	protected $fillable = array('name', 'code');

	public function damagedObjects()
	{
		return $this->hasMany('App\DamagedObject', 'chemical_id');
	}

}