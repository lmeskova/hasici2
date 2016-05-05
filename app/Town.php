<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Town extends Model {

	protected $table = 'towns';
	public $timestamps = false;
	protected $fillable = array('name', 'code', 'district_id');

	public function incidents()
	{
		return $this->hasMany('App\Incident', 'town_id');
	}

	public function district()
	{
		return $this->belongsTo('App\District', 'district_id');
	}

}