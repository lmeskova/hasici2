<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DamagedObjectController extends Controller
{
    public function objects()
    {
        return view('damagedObject', []);
    }
}

