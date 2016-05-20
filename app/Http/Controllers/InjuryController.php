<?php

namespace App\Http\Controllers;

use App\Incident;
use App\Injury;
use App\InjuryCategory;
use App\InjuryCause;
use App\InjuryCircumstance;
use App\InjuryType;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;

class InjuryController extends Controller
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
        $injuryTypes = InjuryType::all();
        $injuryCategories = InjuryCategory::all();
        $injuryCircumstances = InjuryCircumstance::all();
        $injuryCauses = InjuryCause::all();

        return view('injury.create', [
            'injuryTypes' => $injuryTypes,
            'injuryCategories' => $injuryCategories,
            'injuryCircumstances' => $injuryCircumstances,
            'injuryCauses' => $injuryCauses,
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
            'injuryTypes' => "numeric",
            'injuryCategories' => "numeric",
            'injuryCircumstances' => "numeric",
            'injuryCauses' => "numeric",
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $incident->injury()->create($request->all());

        Flash::success('Záznam o zranení vytvorený.');

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
    public function edit($incidentId, $injuryId)
    {
        $injury = Injury::findOrFail($injuryId);
        $injuryTypes = InjuryType::all();
        $injuryCategories = InjuryCategory::all();
        $injuryCircumstances = InjuryCircumstance::all();
        $injuryCauses = InjuryCause::all();

        return view('injury.edit', [
            'injuryTypes' => $injuryTypes,
            'injuryCategories' => $injuryCategories,
            'injuryCircumstances' => $injuryCircumstances,
            'injuryCauses' => $injuryCauses,
            'injury' => $injury,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $incidentId, $injuryId)
    {
        $injury = Injury::findOrFail($injuryId);

        $validator = Validator::make($request->all(), [
            'injuryTypes' => "numeric",
            'injuryCategories' => "numeric",
            'injuryCircumstances' => "numeric",
            'injuryCauses' => "numeric",
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $injury->update($request->all());

        Flash::success('Záznam o zranení upravený.');

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
