<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use App\Informacion;

class InformacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function mostrar()
    {
        $info = Informacion::first();
        if (empty($info)) {
            return view('pageinfoadd');
        } else {
            return view('pageinfo', compact('info'));
        }
        //dd($info);
        //  $info->first();
    }
    public function addinfo(Request $re)
    {
        $info = new Informacion();
        $info->direccion = $re->direccion;
        $info->horario = $re->horario;
        $info->urlfacebook = $re->urlfacebook;
        $info->urltwitter = $re->urltwitter;
        $info->urlinstagram = $re->urlinstagram;
        $info->email = $re->email;
        $info->save();
        return redirect()->action('InformacionController@mostrar');
    }

    //public function addEvento(Request $request){
    // 	$rules = array(
    //     'nombre' => 'required',
    //     'descripcion' => 'required',
    //     );
    //     $validator = Validator::make ( Input::all(), $rules);
    //     if ($validator->fails())
    //         return response()->json(array('errors'=> $validator->getMessageBag()->toarray()));
    //     else {
    //         $evento = new evento;
    //         $evento->nombre = $request->nombre;
    //         $evento->descripcion = $request->descripcion;
    //         $evento->save();
    //         return response()->json($evento);
    //     }
    // }
    public function editInfo(request $request)
    {
        $info = Informacion::find($request->id);
        $info->direccion = $request->direccion;
        $info->horario = $request->horario;
        $info->urlfacebook = $request->urlfacebook;
        $info->urltwitter = $request->urltwitter;
        $info->urlinstagram = $request->urlinstagram;
        $info->email = $request->email;
        $info->save();
        return response()->json($info);
    }
    // public function deleteInfo(request $request)
    // {
    //     $info = Informacion::find($request->id)->delete();
    //     return response()->json();
    // }
}
