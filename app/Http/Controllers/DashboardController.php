<?php

namespace App\Http\Controllers;

use App\Incident;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

use App\Http\Requests;

class DashboardController extends Controller
{
    public function index(Guard $auth)
    {
        if($auth->user()->isDistrictManager()){
            $incidents = Incident::whereHas('town', function($query) use ($auth){
                $query->where('district_id', $auth->user()->district_id);
            })->orderBy('id','desc')->paginate(7);
        }
        else{
            $incidents = Incident::with(['town'])->orderBy('id','desc')->paginate(7);
        }



        return view('dashboard', [
            'incidents' => $incidents
        ]);
    }
}
