<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Dataclerk;
use App\Models\Epidemiologiste;
use App\Models\Contamine;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalDataclerks = Dataclerk::get()->count();
        $totalEpidemiologistes = Epidemiologiste::get()->count();
        $totalContamines = Contamine::get()->count();
        return view('home', compact('totalDataclerks','totalEpidemiologistes','totalContamines'));
    }
}
