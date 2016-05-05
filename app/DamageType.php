<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DamageType extends Model {

	protected $table = 'damage_types';
	public $timestamps = true;
	protected $fillable = array('name', 'code');

	public function incidents()
	{
		return $this->hasMany('App\Incident', 'damage_type_id');
	}

}