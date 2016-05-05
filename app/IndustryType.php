<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndustryType extends Model {

	protected $table = 'industry_types';
	public $timestamps = true;
	protected $fillable = array('name', 'code');

	public function incidents()
	{
		return $this->hasMany('App\Incident', 'industry_type_id');
	}

}