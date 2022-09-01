<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use App\padrino;
use App\padre;

//use PDF;

class PadrinosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function obternerpadrinos(request $request)
    {
        $padres = padre::find($request->padre_id);
        $padrinos = padrino::Where('persona_id', $request->persona_id)->Where('sacramento_id', '=',  $request->sacramento_id)->get();
        return response()->json(['padrinos' => $padrinos, 'padres' => $padres]);
    }
}
