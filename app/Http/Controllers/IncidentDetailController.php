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

        $incident->incidentDetail()->create($request->all());

        return redirect()->route('incident.create');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
