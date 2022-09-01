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
use App\persona_sacramentoconfirma;
use App\sacramento;
use Illuminate\Support\Str as Str;
use PDF;

class ConfirmaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function registrar1($slug)
    {
        $persona = persona::with('persona_sacramentobautizo')->where('slug', '=', $slug)->firstOrFail();
        $padres = padre::find($persona->id);
        return view('pageRegistrarConfirma1', compact('persona', 'padres'));
    }

    public function GuardarConfirma1(Request $request)
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
            $persacracon = new persona_sacramentoconfirma;
            $persacracon->dia_sa = $request->dia_sa;
            $persacracon->mes_sa = $request->mes_sa;
            $persacracon->anio_sa = $request->anio_sa;
            // $persacracon->anio_nac = $request->anio_nac;
            $persacracon->ciudad_sa = $request->ciudad_sa;
            $persacracon->ecle_anio = $request->ecle_anio;
            $persacracon->ecle_tomo = $request->ecle_tomo;
            $persacracon->ecle_pagina = $request->ecle_pagina;
            $persacracon->ecle_no = $request->ecle_no;
            $persacracon->civil_anio = $request->civil_anio;
            $persacracon->civil_tomo = $request->civil_tomo;
            $persacracon->civil_pagina = $request->civil_pagina;
            $persacracon->civil_no = $request->civil_no;
            $persacracon->civil_parroquia = $request->civil_parroquia;
            $persacracon->dia_con = $request->dia_con;
            $persacracon->mes_con = $request->mes_con;
            $persacracon->anio_con = $request->anio_con;
            $persacracon->obispo_confirma = $request->obispo_confirma;
            $persacracon->nota = $request->nota;
            //$persacracon->edad_confirma = $request->anio_con - $request->anio_nac;
            //foreach ($person as $person) {
            $persacracon->persona_id = $person->id;
            $id = $person->id;
            // }
            $varsacramento = sacramento::WhereIn('sacramento', ['CONFIRMACIÓN'])->get();
            foreach ($varsacramento as $ba) {
                $persacracon->sacramento_id = $ba->id;
                $idsa = $ba->id;
            }

            $persacracon->save();
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
            return view('pageRegistrarConfirma2');
        } else {
            return view('pageRegistrarConfirma2');
        }
    }
    public function GuardarConfirma2(Request $request)
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
            $persacracon = new persona_sacramentoconfirma;
            $persacracon->dia_sa = $request->dia_sa;
            $persacracon->mes_sa = $request->mes_sa;
            $persacracon->anio_sa = $request->anio_sa;
            //$persacracon->anio_nac = $request->anio_nac;
            $persacracon->ciudad_sa = $request->ciudad_sa;
            $persacracon->ecle_anio = $request->ecle_anio;
            $persacracon->ecle_tomo = $request->ecle_tomo;
            $persacracon->ecle_pagina = $request->ecle_pagina;
            $persacracon->ecle_no = $request->ecle_no;
            $persacracon->civil_anio = $request->civil_anio;
            $persacracon->civil_tomo = $request->civil_tomo;
            $persacracon->civil_pagina = $request->civil_pagina;
            $persacracon->civil_no = $request->civil_no;
            $persacracon->civil_parroquia = $request->civil_parroquia;
            $persacracon->dia_con = $request->dia_con;
            $persacracon->mes_con = $request->mes_con;
            $persacracon->anio_con = $request->anio_con;
            $persacracon->obispo_confirma = $request->obispo_confirma;
            $persacracon->nota = $request->nota;
            //$persacracon->edad_confirma = $request->anio_con - $request->anio_nac;
            foreach ($person as $person) {
                $persacracon->persona_id = $person->id;
                $id = $person->id;
            }
            $varsacramento = sacramento::WhereIn('sacramento', ['CONFIRMACIÓN'])->get();
            foreach ($varsacramento as $ba) {
                $persacracon->sacramento_id = $ba->id;
                $idsa = $ba->id;
            }
            $persacracon->save();
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
    public function mostrarconfirmas()
    {
        $confirmas = persona::with('persona_sacramentoconfirma')->get()->reverse();
        return view('pageMostrarConfirma', compact('confirmas'));
    }
    public function Buscarconfirma($slug)
    {
        $persona = persona::with('persona_sacramentoconfirma')->where('slug', '=', $slug)->firstOrFail();
        $padres = padre::find($persona->id);
        $padrinos = padrino::Where('persona_id', $persona->id)->Where('sacramento_id', '=', 3)->get();
        // return response()->json(['persona' => $persona, 'padres' => $padres, 'padrinos' => $padrinos]);
        return view('actualizarconfirmacion', compact('persona', 'padres', 'padrinos'));
    }
    public function ActualizarConfirma(Request $request)
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

            $persacracon = persona_sacramentoconfirma::where('persona_id', $request->persona_id)->firstOrFail();
            $persacracon->dia_sa = $request->dia_sa;
            $persacracon->mes_sa = $request->mes_sa;
            $persacracon->anio_sa = $request->anio_sa;
            //$persacracon->anio_nac = $request->anio_nac;
            $persacracon->ciudad_sa = $request->ciudad_sa;
            $persacracon->ecle_anio = $request->ecle_anio;
            $persacracon->ecle_tomo = $request->ecle_tomo;
            $persacracon->ecle_pagina = $request->ecle_pagina;
            $persacracon->ecle_no = $request->ecle_no;
            $persacracon->civil_anio = $request->civil_anio;
            $persacracon->civil_tomo = $request->civil_tomo;
            $persacracon->civil_pagina = $request->civil_pagina;
            $persacracon->civil_no = $request->civil_no;
            $persacracon->civil_parroquia = $request->civil_parroquia;
            $persacracon->dia_con = $request->dia_con;
            $persacracon->mes_con = $request->mes_con;
            $persacracon->anio_con = $request->anio_con;
            $persacracon->obispo_confirma = $request->obispo_confirma;
            $persacracon->nota = $request->nota;
            //$persacracon->edad_confirma = $request->anio_con - $request->anio_nac;
            // foreach ($person as $person) {
            $persacracon->persona_id = $persona->id;
            $id = $persona->id;
            //}
            $varsacramento = sacramento::WhereIn('sacramento', ['COMUNIÓN'])->get();
            foreach ($varsacramento as $ba) {
                $persacracon->sacramento_id = $ba->id;
                $idsa = $ba->id;
            }
            $persacracon->save();

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
    public function actaconfirm($slug)
    {
        $persona = persona::with('persona_sacramentoconfirma')->where('slug', '=', $slug)->firstOrFail();
        $padres = padre::find($persona->id);
        $padrinos = padrino::Where('persona_id', $persona->id)->Where('sacramento_id', '=', 3)->get();
        $numpa = $padrinos->count();
        // return PDF::loadView('reportes.bautizo', ['bautizo' => $bautizo])->stream('archivo.pdf');
        return PDF::loadView('reportes.confirma', ['persona' => $persona, 'padres' => $padres, 'padrinos' => $padrinos, 'numpa' => $numpa])->stream('CertificadoDeBautizo.pdf');
    }
    public function siexiste($id)
    {
        $persona = persona_sacramentoconfirma::where('persona_id', '=', $id)->get();
        if ($persona->first() == null) {
            $existe = false;
            return response()->json($existe);
        } else {
            $existe = true;
            return response()->json($existe);
        }
    }
}
