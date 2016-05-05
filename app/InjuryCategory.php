<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InjuryCategory extends Model {

	protected $table = 'injury_categories';
	public $timestamps = true;
	protected $fillable = array('name', 'code');

	public function injuries()
	{
		return $this->hasMany('App\Injury', 'injury_category_id');
	}

}