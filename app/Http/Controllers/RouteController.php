<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function __construct() {
        
    }

    public function ShowDashboard()
    {
        return view('dashboard');
    }
}
