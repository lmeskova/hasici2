<?php

namespace App\Http\Controllers;

use App\Incident;
use Illuminate\Http\Request;

use App\Http\Requests;

class DashboardController extends Controller
{
    public function index()
    {
        $incidents = Incident::with(['industryType', 'town'])->get();

        return view('dashboard', [
            'incidents' => $incidents
        ]);
    }
}
