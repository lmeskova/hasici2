<?php

namespace App\Http\Controllers;

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
use Illuminate\Http\Request;

use App\Http\Requests;

class IncidentDetailController extends Controller
{
    public function details()
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


        return view('incidentDetail', [
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

}
