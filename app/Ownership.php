<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ownership extends Model {

	protected $table = 'ownerships';
	public $timestamps = true;
	protected $fillable = array('name', 'code');

	public function incidents()
	{
		return $this->hasMany('App\Incident', 'ownership_id');
	}

}