<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use App\grupos;

class GruposController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function mostrar()
    {
        $grupos = grupos::all();
        return view('pagegrupos', compact('grupos'));
    }
    public function addGrupo(Request $request)
    {
        $rules = array(
            'nombre' => 'required',
            'descripcion' => 'required',

        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
            return response()->json(array('errors' => $validator->getMessageBag()->toarray()));
        else {
            $grupo = new grupos;
            $grupo->nombre = $request->nombre;

            $grupo->descripcion = $request->descripcion;
            $grupo->save();
            return response()->json($grupo);
        }
    }
    public function editGrupo(request $request)
    {
        $grupo = grupos::find($request->id);
        $grupo->nombre = $request->nombre;

        $grupo->descripcion = $request->descripcion;
        $grupo->save();
        return response()->json($grupo);
    }
    public function deleteGrupo(request $request)
    {
        $grupo = grupos::find($request->id)->delete();
        return response()->json();
    }
}
