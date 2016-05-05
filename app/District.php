<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model {

	protected $table = 'districts';
	public $timestamps = true;
	protected $fillable = array('name', 'code', 'region_id');

	public function towns()
	{
		return $this->hasMany('App\Town', 'district_id');
	}

}