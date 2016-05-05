<?php

namespace App\Http\Controllers;

use App\DamageSpecification;
use App\DamageType;
use App\Incident;
use App\IndustryType;
use App\InsuranceCompany;
use App\Ownership;
use Illuminate\Http\Request;

use App\Http\Requests;
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
    public function create()
    {
        $insuranceCompanies = InsuranceCompany::all();
        $industryTypes = IndustryType::all();
        $ownerships = Ownership::all();
        $damageSpecifications = DamageSpecification::all();
        $damageTypes = DamageType::all();

        return view('incident.create', [
            'insuranceCompanies' => $insuranceCompanies,
            'industryTypes' => $industryTypes,
            'ownerships' => $ownerships,
            'damageSpecifications' => $damageSpecifications,
            'damageTypes' => $damageTypes,
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


        $validator = Validator::make($request->all(), [
            'evidence_number' => 'required|numeric',
            'report_date' => 'required|date',
            'observe_date' => 'required|date',
            'address' => 'required',
            'ownerships' => 'required',
            'damage_specifications' => 'required',
            'damage_types' => 'required',
            'industry_types' => 'required',

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



        Incident::create($request->all());

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
