<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DamagedObject extends Model {

	protected $table = 'damaged_objects';
	public $timestamps = true;
	protected $fillable = array('damage_degree_id', 'dimension_value', 'segment_function_id', 'segment_altitude_id', 'fire_resistance_id', 'fire_shutter_id', 'shutter_resistance_id', 'spreading_cause_id', 'fire_alarm_id', 'fire_extinguisher_id', 'chemical_id', 'incident_id');

	public function damageDegree()
	{
		return $this->belongsTo('App\DamageDegree', 'damage_degree_id');
	}

	public function segmentFunction()
	{
		return $this->belongsTo('App\SegmentFunction', 'segment_function_id');
	}

	public function segmentAltitude()
	{
		return $this->belongsTo('App\SegmentAltitude', 'segment_altitude_id');
	}

	public function fireResistance()
	{
		return $this->belongsTo('App\FireResistance', 'fire_resistance_id');
	}

	public function flammabilityOfObject()
	{
		return $this->belongsTo('App\FlammabilityOfObject', 'flammability_of_object_id');
	}

	public function fireShutter()
	{
		return $this->belongsTo('App\FireShutter', 'fire_shutter_id');
	}

	public function spreadingCause()
	{
		return $this->belongsTo('App\SpreadingCause', 'spreading_cause_id');
	}

	public function fireAlarm()
	{
		return $this->belongsTo('App\FireAlarm', 'fire_alarm_id');
	}

	public function fireExtinguisher()
	{
		return $this->belongsTo('App\FireExtinguisher', 'fire_extinguisher_id');
	}

	public function chemical()
	{
		return $this->belongsTo('App\Chemical', 'chemical_id');
	}

	public function shutterResistance()
	{
		return $this->belongsTo('App\ShutterResistance', 'shutter_resistance_id');
	}

	public function incident()
	{
		return $this->belongsTo('App\Incident', 'incident_id');
	}

}