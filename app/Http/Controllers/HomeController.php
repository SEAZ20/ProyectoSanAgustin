<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\persona_sacramentobautizo;
use App\persona_sacramentocomunion;
use App\persona_sacramentoconfirma;
use App\novios_sacramento;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalbautizos = persona_sacramentobautizo::count();
        $totalcomunion = persona_sacramentocomunion::count();
        $totalconfirmas = persona_sacramentoconfirma::count();
        $totalmatrimonios = novios_sacramento::count();
        return view('home', compact('totalbautizos', 'totalcomunion', 'totalconfirmas', 'totalmatrimonios'));
    }
}
