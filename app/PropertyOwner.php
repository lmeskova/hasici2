<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyOwner extends Model {

	protected $table = 'property_owners';
	public $timestamps = true;
	protected $fillable = array('name', 'code');

	public function incidents()
	{
		return $this->hasMany('App\Incident', 'property_owner_id');
	}

}