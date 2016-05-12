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

	/**
	 * Scope a query to only include popular users.
	 *
	 * @param $query
	 * @param $user
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeUserDistrict($query, $user)
	{
		return $query->where('district_id', $user->district_id);
	}
}