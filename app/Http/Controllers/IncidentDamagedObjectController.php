<?php

namespace App\Http\Controllers;

use App\Chemical;
use App\DamageDegree;
use App\DamagedObject;
use App\FireAlarm;
use App\FireExtinguisher;
use App\FireResistance;
use App\FireShutter;
use App\FlammabilityOfObject;
use App\Incident;
use App\SegmentAltitude;
use App\SegmentFunction;
use App\ShutterResistance;
use App\SpreadingCause;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;

class IncidentDamagedObjectController extends Controller
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
        $fireExtinguishers = FireExtinguisher::all();
        $damageDegrees = DamageDegree::all();
        $fireShutters = FireShutter::all();
        $flammabilityOfObjects = FlammabilityOfObject::all();
        $chemicals = Chemical::all();
        $fireAlarms = FireAlarm::all();
        $fireResistances = FireResistance::all();
        $spreadingCauses = SpreadingCause::all();
        $segmentFunctions = SegmentFunction::all();
        $shutterResistances = ShutterResistance::all();
        $segmentAltitudes = SegmentAltitude::all();

        return view('incidentDamagedObject.create', [
                'fireExtinguishers' => $fireExtinguishers,
                'damageDegrees' => $damageDegrees,
                'fireShutters' => $fireShutters,
                'flammabilityOfObjects' => $flammabilityOfObjects,
                'chemicals' => $chemicals,
                'fireAlarms' => $fireAlarms,
                'fireResistances' => $fireResistances,
                'spreadingCauses' => $spreadingCauses,
                'segmentFunctions' => $segmentFunctions,
                'shutterResistances' => $shutterResistances,
                'segmentAltitudes' => $segmentAltitudes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $incidentId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $incidentId)
    {

        $incident = Incident::findOrFail($incidentId);

        $validator = Validator::make($request->all(), [
              "dimension_value" => "numeric",
              "damage_degree_id" => "numeric",
              "segment_function_id" => "numeric",
              "segment_altitude_id" => "numeric",
              "fire_resistance_id" => "numeric",
              "flammability_of_object_id" => "numeric",
              "fire_shutter_id" => "numeric",
              "shutter_resistance_id" => "numeric",
              "spreading_cause_id" => "numeric",
              "fire_alarm_id" => "numeric",
              "fire_extinguisher_id" => "numeric",
              "chemical_id" => "numeric",
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $incident->damagedObject()->create($request->all());

        Flash::success('Záznam o poškodenom objekte vytvorený.');

        return redirect()->route('incident.show', [$incidentId]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($incidentId, $incidentDamagedObjectId)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $incidentId
     * @param $incidentDamagedObjectId
     * @return \Illuminate\Http\Response
     */
    public function edit($incidentId, $incidentDamagedObjectId)
    {
        $incidentDamagedObject = DamagedObject::findOrFail($incidentDamagedObjectId);

        $fireExtinguishers = FireExtinguisher::all();
        $damageDegrees = DamageDegree::all();
        $fireShutters = FireShutter::all();
        $flammabilityOfObjects = FlammabilityOfObject::all();
        $chemicals = Chemical::all();
        $fireAlarms = FireAlarm::all();
        $fireResistances = FireResistance::all();
        $spreadingCauses = SpreadingCause::all();
        $segmentFunctions = SegmentFunction::all();
        $shutterResistances = ShutterResistance::all();
        $segmentAltitudes = SegmentAltitude::all();

        return view('incidentDamagedObject.edit', [
            'fireExtinguishers' => $fireExtinguishers,
            'damageDegrees' => $damageDegrees,
            'fireShutters' => $fireShutters,
            'flammabilityOfObjects' => $flammabilityOfObjects,
            'chemicals' => $chemicals,
            'fireAlarms' => $fireAlarms,
            'fireResistances' => $fireResistances,
            'spreadingCauses' => $spreadingCauses,
            'segmentFunctions' => $segmentFunctions,
            'shutterResistances' => $shutterResistances,
            'segmentAltitudes' => $segmentAltitudes,
            'incidentDamagedObject' => $incidentDamagedObject,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $incidentId, $incidentDamagedObjectId)
    {
        $incidentDamagedObject = DamagedObject::findOrFail($incidentDamagedObjectId);

        $validator = Validator::make($request->all(), [
            "dimension_value" => "numeric",
            "damage_degree_id" => "numeric",
            "segment_function_id" => "numeric",
            "segment_altitude_id" => "numeric",
            "fire_resistance_id" => "numeric",
            "flammability_of_object_id" => "numeric",
            "fire_shutter_id" => "numeric",
            "shutter_resistance_id" => "numeric",
            "spreading_cause_id" => "numeric",
            "fire_alarm_id" => "numeric",
            "fire_extinguisher_id" => "numeric",
            "chemical_id" => "numeric",
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }


        $incidentDamagedObject->update($request->all());

        Flash::success('Záznam o poškodenom objekte upravený.');

        return redirect()->route('incident.show', [$incidentId]);

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
