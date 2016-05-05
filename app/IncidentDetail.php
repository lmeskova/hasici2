<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncidentDetail extends Model {

	protected $table = 'incident_details';
	public $timestamps = true;
	protected $fillable = array('incident_id', 'area_id', 'fire_location_id', 'vehicle_part_id', 'conveyor_equipment_id', 'incident_cause_id', 'flammable_substance_id', 'initiator_id', 'electrical_wiring_id', 'initiators_impact_id', 'burning_substance_id', 'following_substance_id', 'hazard_class_id', 'organization_shortcoming_id', 'action_shortcoming_id', 'incident_conclusion_id');

	public function incident()
	{
		return $this->belongsTo('App\Incident', 'incident_id');
	}

	public function area()
	{
		return $this->belongsTo('App\Area', 'area_id');
	}

	public function fireLocation()
	{
		return $this->belongsTo('App\FireLocation', 'fire_location_id');
	}

	public function vehiclePart()
	{
		return $this->belongsTo('App\VehiclePart', 'vehicle_part_id');
	}

	public function conveyorEquipment()
	{
		return $this->belongsTo('App\ConveyorEquipment', 'conveyor_equipment_id');
	}

	public function incidentCause()
	{
		return $this->belongsTo('App\IncidentCause', 'incident_cause_id');
	}

	public function flammableSubstance()
	{
		return $this->belongsTo('App\FlammableSubstance', 'flammable_substance_id');
	}

	public function initiator()
	{
		return $this->belongsTo('App\Initiator', 'initiator_id');
	}

	public function electricalWiring()
	{
		return $this->belongsTo('App\ElectricalWiring', 'electrical_wiring_id');
	}

	public function initiatorsImpact()
	{
		return $this->belongsTo('App\InitiatorsImpact', 'initiators_impact_id');
	}

	public function burningSubstance()
	{
		return $this->belongsTo('App\BurningSubstance', 'burning_substance_id');
	}

	public function followingSubstance()
	{
		return $this->belongsTo('App\FollowingSubstance', 'following_substance_id');
	}

	public function hazardClass()
	{
		return $this->belongsTo('App\HazardClass', 'hazard_class_id');
	}

	public function organizationShortcoming()
	{
		return $this->belongsTo('App\OrganizationShortcoming', 'organization_shortcoming_id');
	}

	public function actionShortcoming()
	{
		return $this->belongsTo('App\ActionShortcoming', 'action_shortcoming_id');
	}

	public function incidentConclusion()
	{
		return $this->belongsTo('App\IncidentConclusion', 'incident_conclusion_id');
	}

}