<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\evento;
use Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;


class EventoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function mostrar()
    {
        $eventos = evento::all();
        return view('pageevento', compact('eventos'));
    }
    public function addEvento(Request $request)
    {
        $rules = array(
            'nombre_e' => 'required',
            'descripcion_e' => 'required',
            'fecha' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
            return response()->json(array('errors' => $validator->getMessageBag()->toarray()));
        else {
            $evento = new evento;
            $evento->nombre_e = $request->nombre_e;
            $evento->fecha = $request->fecha;
            $evento->descripcion_e = $request->descripcion_e;
            $evento->save();
            return response()->json($evento);
        }
    }
    public function editEvento(request $request)
    {
        $rules = array(
            'nombre_e' => 'required',
            'descripcion_e' => 'required',
            'fecha' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
            return response()->json(array('errors' => $validator->getMessageBag()->toarray()));
        else {
            $evento = evento::find($request->id);
            $evento->nombre_e = $request->nombre_e;
            $evento->fecha = $request->fecha;
            $evento->descripcion_e = $request->descripcion_e;
            $evento->save();
            return response()->json($evento);
        }
    }
    public function deleteEvento(request $request)
    {
        $evento = evento::find($request->id)->delete();
        return response()->json();
    }
}
