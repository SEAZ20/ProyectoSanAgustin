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
use App\persona_sacramentocomunion;
use App\sacramento;
use Illuminate\Support\Str as Str;
use PDF;

class ComunionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function registrar1($slug)
    {
        $persona = persona::with('persona_sacramentobautizo')->where('slug', '=', $slug)->firstOrFail();
        $padres = padre::find($persona->id);
        return view('pageResgistrarComunion1', compact('persona', 'padres'));
    }
    public function registrar2()
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
            return view('pageRegistrarComunion2');
        } else {
            return view('pageRegistrarComunion2');
        }
    }
    public function GuardarComunion1(Request $request)
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
            $person = persona::find($request->persona_id);
            //PERSONA_SACRAMENTO
            $persacracomu = new persona_sacramentocomunion;
            $persacracomu->dia_sa = $request->dia_sa;
            $persacracomu->mes_sa = $request->mes_sa;
            $persacracomu->anio_sa = $request->anio_sa;
            // $persacracomu->anio_nac = $request->anio_nac;
            $persacracomu->ciudad_sa = $request->ciudad_sa;
            $persacracomu->ecle_anio = $request->ecle_anio;
            $persacracomu->ecle_tomo = $request->ecle_tomo;
            $persacracomu->ecle_pagina = $request->ecle_pagina;
            $persacracomu->ecle_no = $request->ecle_no;
            $persacracomu->civil_anio = $request->civil_anio;
            $persacracomu->civil_tomo = $request->civil_tomo;
            $persacracomu->civil_pagina = $request->civil_pagina;
            $persacracomu->civil_no = $request->civil_no;
            $persacracomu->civil_parroquia = $request->civil_parroquia;
            $persacracomu->dia_co = $request->dia_co;
            $persacracomu->mes_co = $request->mes_co;
            $persacracomu->anio_co = $request->anio_co;
            $persacracomu->parroco_comunion = $request->parroco_comunion;
            $persacracomu->nota = $request->nota;
            //$persacracomu->edad_comunion = $request->anio_co - $request->anio_nac;
            //foreach ($person as $person) {
            $persacracomu->persona_id = $person->id;
            $id = $person->id;
            // }
            $varsacramento = sacramento::WhereIn('sacramento', ['COMUNIÓN'])->get();
            foreach ($varsacramento as $ba) {
                $persacracomu->sacramento_id = $ba->id;
                $idsa = $ba->id;
            }

            $persacracomu->save();
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
    public function GuardarComunion2(Request $request)
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

            $persacracomu = new persona_sacramentocomunion;
            $persacracomu->dia_sa = $request->dia_sa;
            $persacracomu->mes_sa = $request->mes_sa;
            $persacracomu->anio_sa = $request->anio_sa;
            // $persacracomu->anio_nac = $request->anio_nac;
            $persacracomu->ciudad_sa = $request->ciudad_sa;
            $persacracomu->ecle_anio = $request->ecle_anio;
            $persacracomu->ecle_tomo = $request->ecle_tomo;
            $persacracomu->ecle_pagina = $request->ecle_pagina;
            $persacracomu->ecle_no = $request->ecle_no;
            $persacracomu->civil_anio = $request->civil_anio;
            $persacracomu->civil_tomo = $request->civil_tomo;
            $persacracomu->civil_pagina = $request->civil_pagina;
            $persacracomu->civil_no = $request->civil_no;
            $persacracomu->civil_parroquia = $request->civil_parroquia;
            $persacracomu->dia_co = $request->dia_co;
            $persacracomu->mes_co = $request->mes_co;
            $persacracomu->anio_co = $request->anio_co;
            $persacracomu->parroco_comunion = $request->parroco_comunion;
            $persacracomu->nota = $request->nota;
            // $persacracomu->edad_comunion = $request->anio_co - $request->anio_nac;
            foreach ($person as $person) {
                $persacracomu->persona_id = $person->id;
                $id = $person->id;
            }
            $varsacramento = sacramento::WhereIn('sacramento', ['COMUNIÓN'])->get();
            foreach ($varsacramento as $ba) {
                $persacracomu->sacramento_id = $ba->id;
                $idsa = $ba->id;
            }
            $persacracomu->save();
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
    public function mostrarcomunion()
    {
        $comuniones = persona::with('persona_sacramentocomunion')->get()->reverse();
        return view('pageMostrarComunion', compact('comuniones'));
    }
    public function Buscarcomunion($slug)
    {
        $persona = persona::with('persona_sacramentocomunion')->where('slug', '=', $slug)->firstOrFail();
        $padres = padre::find($persona->id);
        $padrinos = padrino::Where('persona_id', $persona->id)->Where('sacramento_id', '=', 2)->get();
        //dd($padrinos);
        //return response()->json($padrinos);
        return view('pageActualizarComunion', compact('persona', 'padres', 'padrinos'));
    }
    public function ActualizarComunion(Request $request)
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
            //ini_set('display_error', 0);
            // $persacracomu = (object)array();
            //ini_set('error_reporting', E_STRICT);
            $person_id = (int)$request->persona_id;
            $persacracomu = persona_sacramentocomunion::where('persona_id', $request->persona_id)->firstOrFail();

            // return response()->json($persacracomu);

            $persacracomu->dia_sa = $request->dia_sa;
            $persacracomu->mes_sa = $request->mes_sa;
            $persacracomu->anio_sa = $request->anio_sa;
            // $persacracomu->anio_nac = $request->anio_nac;
            $persacracomu->ciudad_sa = $request->ciudad_sa;
            $persacracomu->ecle_anio = $request->ecle_anio;
            $persacracomu->ecle_tomo = $request->ecle_tomo;
            $persacracomu->ecle_pagina = $request->ecle_pagina;
            $persacracomu->ecle_no = $request->ecle_no;
            $persacracomu->civil_anio = $request->civil_anio;
            $persacracomu->civil_tomo = $request->civil_tomo;
            $persacracomu->civil_pagina = $request->civil_pagina;
            $persacracomu->civil_no = $request->civil_no;
            $persacracomu->civil_parroquia = $request->civil_parroquia;
            $persacracomu->dia_co = $request->dia_co;
            $persacracomu->mes_co = $request->mes_co;
            $persacracomu->anio_co = $request->anio_co;
            $persacracomu->parroco_comunion = $request->parroco_comunion;
            $persacracomu->nota = $request->nota;
            //$persacracomu->edad_comunion = $request->anio_co - $request->anio_nac;
            // foreach ($person as $person) {
            $persacracomu->persona_id = $persona->id;
            $id = $persona->id;
            //}
            $varsacramento = sacramento::WhereIn('sacramento', ['COMUNIÓN'])->get();
            foreach ($varsacramento as $ba) {
                $persacracomu->sacramento_id = $ba->id;
                $idsa = $ba->id;
            }
            $persacracomu->save();

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
            return response()->json();
        }
    }

    public function actacomunion($slug)
    {
        $persona = persona::with('persona_sacramentocomunion')->where('slug', '=', $slug)->firstOrFail();
        $padres = padre::find($persona->id);
        $padrinos = padrino::Where('persona_id', $persona->id)->Where('sacramento_id', '=', 2)->get();
        $numpa = $padrinos->count();
        // return PDF::loadView('reportes.bautizo', ['bautizo' => $bautizo])->stream('archivo.pdf');
        return PDF::loadView('reportes.comunion', ['persona' => $persona, 'padres' => $padres, 'padrinos' => $padrinos, 'numpa' => $numpa])->stream('CertificadoDeComunion.pdf');
    }
    public function siexiste($id)
    {
        $persona = persona_sacramentocomunion::where('persona_id', '=', $id)->get();
        if ($persona->first() == null) {
            $existe = false;
            return response()->json($existe);
        } else {
            $existe = true;
            return response()->json($existe);
        }
    }
}
