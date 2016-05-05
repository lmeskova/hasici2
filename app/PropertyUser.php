<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyUser extends Model {

	protected $table = 'property_users';
	public $timestamps = true;
	protected $fillable = array('name', 'code');

	public function incidents()
	{
		return $this->hasMany('App\Incident', 'property_user_id');
	}

}