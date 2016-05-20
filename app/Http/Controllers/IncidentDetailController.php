<?php

namespace App\Http\Controllers;

use App\Incident;
use App\IncidentDetail;
use Illuminate\Http\Request;

use App\ActionShortcoming;
use App\Area;
use App\BurningSubstance;
use App\ConveyorEquipment;
use App\ElectricalWiring;
use App\FireLocation;
use App\FlammableSubstance;
use App\FollowingSubstance;
use App\HazardClass;
use App\IncidentCause;
use App\IncidentConclusion;
use App\Initiator;
use App\InitiatorsImpact;
use App\OrganizationShortcoming;
use App\SpreadingCause;
use App\VehiclePart;
use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;


class IncidentDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::all();
        $fireLocations = FireLocation::all();
        $vehicleParts = VehiclePart::all();
        $conveyorEquipments = ConveyorEquipment::all();
        $incidentCauses = IncidentCause::all();
        $flammableSubstances = FlammableSubstance::all();
        $initiators = Initiator::all();
        $electricalWirings = ElectricalWiring::all();
        $initiatorsImpacts = InitiatorsImpact::all();
        $burningSubstances = BurningSubstance::all();
        $followingSubstances = FollowingSubstance::all();
        $hazardClasses = HazardClass::all();
        $organizationShortcomings = OrganizationShortcoming::all();
        $actionShortcomings = ActionShortcoming::all();
        $incidentConclusions = IncidentConclusion::all();


        return view('incidentDetail.create', [
            'areas' => $areas,
            'fireLocations' => $fireLocations,
            'vehicleParts' => $vehicleParts,
            'conveyorEquipments' => $conveyorEquipments,
            'incidentCauses' => $incidentCauses,
            'flammableSubstances' => $flammableSubstances,
            'initiators' => $initiators,
            'electricalWirings' => $electricalWirings,
            'initiatorsImpacts' => $initiatorsImpacts,
            'burningSubstances' => $burningSubstances,
            'followingSubstances' => $followingSubstances,
            'hazardClasses' => $hazardClasses,
            'organizationShortcomings' => $organizationShortcomings,
            'actionShortcomings' => $actionShortcomings,
            'incidentConclusions' => $incidentConclusions,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $incidentId
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store($incidentId, Request $request)
    {
        $incident = Incident::findOrFail($incidentId);

        $validator = Validator::make($request->all(), [
            "area_id" => "numeric",
            "fire_location_id" => "numeric",
            "vehicle_part_id" => "numeric",
            "conveyor_equipment_id" => "numeric",
            "incident_cause_id" => "numeric",
            "flammable_substance_id" => "numeric",
            "initiator_id" => "numeric",
            "electrical_wiring_id" => "numeric",
            "initiators_impact_id" => "numeric",
            "burning_substance_id" => "numeric",
            "following_substance_id" => "numeric",
            "hazard_class_id" => "numeric",
            "organization_shortcoming_id" => "numeric",
            "action_shortcoming_id" => "numeric",
            "incident_conclusion_id" => "numeric",
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }



        $incident->incidentDetail()->create($request->all());

        Flash::success('Detail incidentu úspešne vytvorený :)');

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param $incidentId
     * @param $incidentDetailId
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show($incidentId, $incidentDetailId)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $incidentId
     * @param $incidentDetailId
     * @return \Illuminate\Http\Response
     */
    public function edit($incidentId, $incidentDetailId)
    {
        $incidentDetail = IncidentDetail::findOrFail($incidentDetailId);

        $areas = Area::all();
        $fireLocations = FireLocation::all();
        $vehicleParts = VehiclePart::all();
        $conveyorEquipments = ConveyorEquipment::all();
        $incidentCauses = IncidentCause::all();
        $flammableSubstances = FlammableSubstance::all();
        $initiators = Initiator::all();
        $electricalWirings = ElectricalWiring::all();
        $initiatorsImpacts = InitiatorsImpact::all();
        $burningSubstances = BurningSubstance::all();
        $followingSubstances = FollowingSubstance::all();
        $hazardClasses = HazardClass::all();
        $organizationShortcomings = OrganizationShortcoming::all();
        $actionShortcomings = ActionShortcoming::all();
        $incidentConclusions = IncidentConclusion::all();


        return view('incidentDetail.edit', [
            'areas' => $areas,
            'fireLocations' => $fireLocations,
            'vehicleParts' => $vehicleParts,
            'conveyorEquipments' => $conveyorEquipments,
            'incidentCauses' => $incidentCauses,
            'flammableSubstances' => $flammableSubstances,
            'initiators' => $initiators,
            'electricalWirings' => $electricalWirings,
            'initiatorsImpacts' => $initiatorsImpacts,
            'burningSubstances' => $burningSubstances,
            'followingSubstances' => $followingSubstances,
            'hazardClasses' => $hazardClasses,
            'organizationShortcomings' => $organizationShortcomings,
            'actionShortcomings' => $actionShortcomings,
            'incidentConclusions' => $incidentConclusions,
            'incidentDetail' => $incidentDetail,


        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $incidentId
     * @param $incidentDetailId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $incidentId, $incidentDetailId)
    {
        $incidentDetail = IncidentDetail::findOrFail($incidentDetailId);

        $validator = Validator::make($request->all(), [
            "area_id" => "numeric",
            "fire_location_id" => "numeric",
            "vehicle_part_id" => "numeric",
            "conveyor_equipment_id" => "numeric",
            "incident_cause_id" => "numeric",
            "flammable_substance_id" => "numeric",
            "initiator_id" => "numeric",
            "electrical_wiring_id" => "numeric",
            "initiators_impact_id" => "numeric",
            "burning_substance_id" => "numeric",
            "following_substance_id" => "numeric",
            "hazard_class_id" => "numeric",
            "organization_shortcoming_id" => "numeric",
            "action_shortcoming_id" => "numeric",
            "incident_conclusion_id" => "numeric",
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }


        $incidentDetail->update($request->all());

        Flash::success('Detail incidentu upravený.');

        return redirect()->route('dashboard');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
