<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DamageSpecification extends Model {

	protected $table = 'damage_specifications';
	public $timestamps = true;
	protected $fillable = array('name', 'code');

	public function incidents()
	{
		return $this->hasMany('App\Incident', 'damage_specification_id');
	}

}