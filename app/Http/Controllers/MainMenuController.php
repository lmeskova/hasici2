<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MainMenuController extends Controller
{
    public function index()
    {
        return view('mainMenu');
    }
}
    
