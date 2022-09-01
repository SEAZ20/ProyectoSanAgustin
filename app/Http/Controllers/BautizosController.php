<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use App\persona;
use App\padre;
use App\padrino;
use App\persona_sacramentobautizo;
use App\sacramento;
use Illuminate\Support\Str as Str;
use PDF;

class BautizosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function GuardarBautizo(Request $request)
    {
        if ($request->ajax()) {
            $rules = array(
                'nombre_padrino.*'  => 'required',
                'apellidos_padrino.*'  => 'required'
            );
            $error = Validator::make($request->all(), $rules);
            if ($error->fails()) {
                return response()->json([
                    'error'  => $error->errors()->all()
                ]);
            }
            //PADRES
            $padres = new padre;
            $padres->nombres_p = $request->nombres_p;
            $padres->apellidos_p = $request->apellidos_p;
            $padres->nombres_m = $request->nombres_m;
            $padres->apellidos_m = $request->apellidos_m;
            $padres->save();
            $padre = padre::all();
            $padre->last();
            //PERSONA

            $persona = new persona();
            $persona->nombres = $request->nombres;
            $persona->apellidos = $request->apellidos;
            $persona->slug = Str::slug(date('i') . $request->ecle_pagina . $request->ecle_no);
            foreach ($padre as $padre) {
                $persona->padre_id = $padre->id;
            }
            $persona->save();
            $person = persona::all();
            $person->last();
            //PERSONA_SACRAMENTO
            $persacrabau = new persona_sacramentobautizo;
            $persacrabau->dia_nac = $request->dia_nac;
            $persacrabau->mes_nac = $request->mes_nac;
            $persacrabau->anio_nac = $request->anio_nac;
            $persacrabau->ciudad_nac = $request->ciudad_nac;
            $persacrabau->ecle_anio = $request->ecle_anio;
            $persacrabau->ecle_tomo = $request->ecle_tomo;
            $persacrabau->ecle_pagina = $request->ecle_pagina;
            $persacrabau->ecle_no = $request->ecle_no;
            $persacrabau->civil_anio = $request->civil_anio;
            $persacrabau->civil_tomo = $request->civil_tomo;
            $persacrabau->civil_pagina = $request->civil_pagina;
            $persacrabau->civil_no = $request->civil_no;
            $persacrabau->civil_parroquia = $request->civil_parroquia;
            $persacrabau->dia_sa = $request->dia_sa;
            $persacrabau->mes_sa = $request->mes_sa;
            $persacrabau->anio_sa = $request->anio_sa;
            $persacrabau->parroco = $request->parroco;
            $persacrabau->nota = $request->nota;
            $persacrabau->edad_bautizo = $request->anio_sa - $request->anio_nac;
            foreach ($person as $person) {
                $persacrabau->persona_id = $person->id;
                $id = $person->id;
            }
            $varsacramento = sacramento::WhereIn('sacramento', ['BAUTIZO'])->get();
            foreach ($varsacramento as $ba) {
                $persacrabau->sacramento_id = $ba->id;
                $idsa = $ba->id;
            }

            $persacrabau->save();

            //PADRINOS
            $nombre_padrino = $request->nombre_padrino;
            $apellidos_padrino = $request->apellidos_padrino;
            for ($count = 0; $count < count($nombre_padrino); $count++) {
                $data = array(
                    'nombre_padrino' => $nombre_padrino[$count],
                    'apellidos_padrino'  => $apellidos_padrino[$count],
                    'persona_id' => $id,
                    'sacramento_id' => $idsa
                );
                $insert_data[] = $data;
            }
            padrino::insert($insert_data);
            return response()->json();
        }
    }
    public function index()
    {
        $var = sacramento::first();
        if (empty($var)) {
            $info = array('BAUTIZO', 'COMUNIÓN', 'CONFIRMACIÓN', 'MATRIMONIO');
            $long = count($info);
            for ($i = 0; $i < $long; $i++) {
                $newsacra = new sacramento;
                $newsacra->sacramento = $info[$i];
                $newsacra->save();
            }
            return view('pageIngresarBautizo');
        } else {
            return view('pageIngresarBautizo');
        }
    }
    public function mostrarButizos()
    {
        $bautizos = persona::with('persona_sacramentobautizo')->get()->reverse();
        //$bautizos = padre::with('persona.persona_sacramentobautizo.padrino')->get()->reverse();
        //$bautizos->reverse();
        return view('pageMostrarBautizo', compact('bautizos'));
    }
    public function BuscarBautizo($slug)
    {
        $persona = persona::with('persona_sacramentobautizo')->where('slug', '=', $slug)->firstOrFail();
        $padres = padre::find($persona->id);
        $padrinos = padrino::Where('persona_id', $persona->id)->Where('sacramento_id', '=', 1)->get();
        return view('pageActulizarBautizo', compact('persona', 'padres', 'padrinos'));
    }
    public function ActualizarBautizo(Request $request)
    {
        if ($request->ajax()) {
            $rules = array(
                'nombre_padrino.*'  => 'required',
                'apellidos_padrino.*'  => 'required'
            );
            $error = Validator::make($request->all(), $rules);
            if ($error->fails()) {
                return response()->json([
                    'error'  => $error->errors()->all()
                ]);
            }
            //PADRES
            $padres = padre::find($request->padre_id);

            $padres->nombres_p = $request->nombres_p;
            $padres->apellidos_p = $request->apellidos_p;
            $padres->nombres_m = $request->nombres_m;
            $padres->apellidos_m = $request->apellidos_m;
            $padres->save();

            // //PERSONA
            $persona = persona::find($request->persona_id);

            $persona->nombres = $request->nombres;
            $persona->apellidos = $request->apellidos;
            // //foreach ($padre as $padre) {
            $persona->padre_id = $padres->id;
            // //}
            $persona->save();

            // //PERSONA_SACRAMENTO
            //ierror_reporting(E_STRICT);
            $persacrabau = persona_sacramentobautizo::where('persona_id', $request->persona_id)->firstOrFail();

            $persacrabau->dia_nac = $request->dia_nac;
            $persacrabau->mes_nac = $request->mes_nac;
            $persacrabau->anio_nac = $request->anio_nac;
            $persacrabau->ciudad_nac = $request->ciudad_nac;
            $persacrabau->ecle_anio = $request->ecle_anio;
            $persacrabau->ecle_tomo = $request->ecle_tomo;
            $persacrabau->ecle_pagina = $request->ecle_pagina;
            $persacrabau->ecle_no = $request->ecle_no;
            $persacrabau->civil_anio = $request->civil_anio;
            $persacrabau->civil_tomo = $request->civil_tomo;
            $persacrabau->civil_pagina = $request->civil_pagina;
            $persacrabau->civil_no = $request->civil_no;
            $persacrabau->civil_parroquia = $request->civil_parroquia;
            $persacrabau->dia_sa = $request->dia_sa;
            $persacrabau->mes_sa = $request->mes_sa;
            $persacrabau->anio_sa = $request->anio_sa;
            $persacrabau->parroco = $request->parroco;
            $persacrabau->nota = $request->nota;
            $persacrabau->edad_bautizo = $request->anio_sa - $request->anio_nac;
            // // foreach ($person as $person) {
            $persacrabau->persona_id = $persona->id;
            $id = $persona->id;

            // // }
            $varsacramento = sacramento::WhereIn('sacramento', ['BAUTIZO'])->get();
            foreach ($varsacramento as $ba) {
                $persacrabau->sacramento_id = $ba->id;
                $idsa = $ba->id;
            }
            $persacrabau->save();

            // //PADRINOS
            $padrinos = padrino::Where('persona_id', $request->persona_id)->Where('sacramento_id', '=', $idsa)->get();
            foreach ($padrinos as $pa) {
                $pad = padrino::find($pa->id);
                $pad->delete();
            }
            $nombre_padrino = $request->nombre_padrino;
            $apellidos_padrino = $request->apellidos_padrino;

            for ($count = 0; $count < count($nombre_padrino); $count++) {
                $data = array(
                    'nombre_padrino' => $nombre_padrino[$count],
                    'apellidos_padrino'  => $apellidos_padrino[$count],
                    'persona_id' => $id,
                    'sacramento_id' => $idsa
                );
                $update_data[] = $data;
            }
            padrino::insert($update_data);

            // $bautizo = padre::with('persona.persona_sacramentobautizo.padrino')->find($padres->id);
            //return redirect()->action('BautizosController@mostrarButizos');
            return response()->json();
        }
    }

    public function actabautizo($slug)
    {
        $persona = persona::with('persona_sacramentobautizo')->where('slug', '=', $slug)->firstOrFail();
        $padres = padre::find($persona->id);
        $padrinos = padrino::Where('persona_id', $persona->id)->Where('sacramento_id', '=', 1)->get();
        $numpa = $padrinos->count();
        // return PDF::loadView('reportes.bautizo', ['bautizo' => $bautizo])->stream('archivo.pdf');
        return PDF::loadView('reportes.bautizo', ['persona' => $persona, 'padres' => $padres, 'padrinos' => $padrinos, 'numpa' => $numpa])->stream('CertificadoDeBautizo.pdf');
    }
}
