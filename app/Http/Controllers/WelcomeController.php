<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Informacion;
use App\grupos;
use App\evento;
use App\persona_sacramentobautizo;

class WelcomeController extends Controller
{
    public function index()
    {
        $eventos = evento::all();
        $info = Informacion::all();
        $info2 = Informacion::all();
        $grupos = grupos::all();

        return view('welcome', compact('eventos', 'info', 'info2', 'grupos'));
    }
    public function irconsultas()
    {
        return view('pageConsultas');
    }
}
