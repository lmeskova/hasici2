<?php

namespace App\Http\Controllers;

use App\DamageSpecification;
use App\DamageType;
use App\IndustryType;
use App\InsuranceCompany;
use App\Ownership;
use Illuminate\Http\Request;

use App\Http\Requests;

class IncidentController extends Controller
{


    public function createNew()
    {
        $insuranceCompanies = InsuranceCompany::all();
        $industryTypes = IndustryType::all();
        $ownerships = Ownership::all();
        $damageSpecifications = DamageSpecification::all();
        $damageTypes = DamageType::all();
        
        



        return view('createIncident', [
            'insuranceCompanies' => $insuranceCompanies,
            'industryTypes' => $industryTypes,
            'ownerships' => $ownerships,
            'damageSpecifications' => $damageSpecifications,
            'damageTypes' => $damageTypes,
        ]);
    }
}
