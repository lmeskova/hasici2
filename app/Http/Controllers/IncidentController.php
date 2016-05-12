<?php

namespace App\Http\Controllers;

use App\DamageSpecification;
use App\DamageType;
use App\District;
use App\Incident;
use App\IndustryType;
use App\InsuranceCompany;
use App\Ownership;
use App\Town;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class IncidentController extends Controller
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
    public function create(Guard $auth)
    {
        $insuranceCompanies = InsuranceCompany::all();
        $industryTypes = IndustryType::all();
        $ownerships = Ownership::all();
        $damageSpecifications = DamageSpecification::all();
        $damageTypes = DamageType::all();
        
        if($auth->user()->isDistrictManager()){
            $towns = Town::userDistrict($auth->user())->get();
        }else{
            $towns = Town::all();
        }

        return view('incident.create', [
            'insuranceCompanies' => $insuranceCompanies,
            'industryTypes' => $industryTypes,
            'ownerships' => $ownerships,
            'damageSpecifications' => $damageSpecifications,
            'damageTypes' => $damageTypes,
            'towns' => $towns,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        if(Gate::denies('store-incident')){
            abort(404);
        }
        


        $validator = Validator::make($request->all(), [
            'evidence_number' => 'required|numeric',
            'report_date' => 'required|date',
            'observe_date' => 'required|date',
            'address' => 'required',
            'ownership_id' => 'required',
            'damage_specification_id' => 'required',
            'damage_type_id' => 'required',
            'industry_type_id' => 'required',
            'town_id' => 'required',
            'direct_damage_value' => 'required|numeric',
            'followup_damage_value' => 'required|numeric',
            'saved_value' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();


        }



        $incident = Incident::create($request->all());

        $incident->insuranceCompanies()->detach();
        $incident->insuranceCompanies()->attach($request->get('insurance_companies'));

        return redirect()->route('dashboard');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $incident = Incident::findOrFail($id);

        if(Gate::denies('show-incident', $incident)){
            abort(404);
        }

        // return view('incident.show', ['incident' => $incident]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $incident = Incident::findOrFail($id);

        if(Gate::denies('update-incident', $incident)){
            abort(404);
        }





        $incidentInsuranceCompanies = $incident->insuranceCompanies->map(function($item){
            return $item->id;
        })->toArray();



        $insuranceCompanies = InsuranceCompany::all();
        $industryTypes = IndustryType::all();
        $ownerships = Ownership::all();
        $damageSpecifications = DamageSpecification::all();
        $damageTypes = DamageType::all();
        $towns = Town::all();
        $districts = District::all();



        return view('incident.edit', [
            'incident' => $incident,
            'insuranceCompanies' => $insuranceCompanies,
            'industryTypes' => $industryTypes,
            'ownerships' => $ownerships,
            'damageSpecifications' => $damageSpecifications,
            'damageTypes' => $damageTypes,
            'towns' => $towns,
            'incidentInsuranceCompanies' => $incidentInsuranceCompanies,
            'districts' => $districts,
        ]);
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
        $incident = Incident::findOrFail($id);

        if(Gate::denies('update-incident', $incident)){
            abort(404);
        }


        $validator = Validator::make($request->all(), [
            'evidence_number' => 'required|numeric',
            'report_date' => 'required|date',
            'observe_date' => 'required|date',
            'address' => 'required',
            'ownership_id' => 'required',
            'damage_specification_id' => 'required',
            'damage_type_id' => 'required',
            'industry_type_id' => 'required',
            'town_id' => 'required',
            'direct_damage_value' => 'required|numeric',
            'followup_damage_value' => 'required|numeric',
            'saved_value' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();


        }


        $incident->update($request->all());

        $incident->insuranceCompanies()->detach();
        $incident->insuranceCompanies()->attach($request->get('insurance_companies'));


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
