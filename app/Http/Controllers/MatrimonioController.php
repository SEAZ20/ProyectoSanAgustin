<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use App\novios;
use App\padres_novios;
use App\testigos;
use App\novios_sacramento;
use App\sacramento;
use Illuminate\Support\Str as Str;
use PDF;

class MatrimonioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
            return view('pageRegistrarMatrinonio');
        } else {
            return view('pageRegistrarMatrinonio');
        }
    }
    public function GuardarMatrimonio(Request $request)
    {
        if ($request->ajax()) {
            //testigod novio
            $rules = array(
                'nombres_testigo1.*'  => 'required',
                'apellidos_testigo1.*'  => 'required'
            );
            $error = Validator::make($request->all(), $rules);
            if ($error->fails()) {
                return response()->json([
                    'error'  => $error->errors()->all()
                ]);
            }
            //testigos novia
            $rules = array(
                'nombres_testigo0.*'  => 'required',
                'apellidos_testigo0.*'  => 'required'
            );
            $error = Validator::make($request->all(), $rules);
            if ($error->fails()) {
                return response()->json([
                    'error'  => $error->errors()->all()
                ]);
            }
            //PADRES    
            $padres_novios = new padres_novios();
            $padres_novios->nombres_p_novio = $request->nombres_p_novio;
            $padres_novios->apellidos_p_novio = $request->apellidos_p_novio;
            $padres_novios->nombres_m_novio = $request->nombres_m_novio;
            $padres_novios->apellidos_m_novio = $request->apellidos_m_novio;
            $padres_novios->nombres_p_novia = $request->nombres_p_novia;
            $padres_novios->apellidos_p_novia = $request->apellidos_p_novia;
            $padres_novios->nombres_m_novia = $request->nombres_m_novia;
            $padres_novios->apellidos_m_novia = $request->apellidos_m_novia;
            $padres_novios->save();
            $padre = padres_novios::all();
            $padre->last();
            //NOVIOS
            $novios = new novios();
            $novios->nombres_novio = $request->nombres_novio;
            $novios->apellidos_novio = $request->apellidos_novio;
            $novios->nombres_novia = $request->nombres_novia;
            $novios->apellidos_novia = $request->apellidos_novia;
            $novios->slug = Str::slug(date('i') . $request->ecle_pagina . $request->ecle_no);

            foreach ($padre as $padre) {
                $novios->padres_novios_id = $padre->id;
            }
            $novios->save();
            $novioss = novios::all();
            $novioss->last();

            //NOVIO SACRAMENTO
            $noviosacra = new novios_sacramento();
            $noviosacra->ecle_anio = $request->ecle_anio;
            $noviosacra->ecle_tomo = $request->ecle_tomo;
            $noviosacra->ecle_pagina = $request->ecle_pagina;
            $noviosacra->ecle_no = $request->ecle_no;
            $noviosacra->civil_anio = $request->civil_anio;
            $noviosacra->civil_tomo = $request->civil_tomo;
            $noviosacra->civil_pagina = $request->civil_pagina;
            $noviosacra->civil_no = $request->civil_no;
            $noviosacra->civil_ciudad = $request->civil_ciudad;
            $noviosacra->civil_partida = $request->civil_partida;
            $noviosacra->dia_ma = $request->dia_ma;
            $noviosacra->mes_ma = $request->mes_ma;
            $noviosacra->anio_ma = $request->anio_ma;
            foreach ($novioss as $novioss) {
                $noviosacra->novios_id = $novioss->id;
                $id = $novioss->id;
            }
            $varsacramento = sacramento::WhereIn('sacramento', ['MATRIMONIO'])->get();
            foreach ($varsacramento as $ma) {
                $noviosacra->sacramento_id = $ma->id;
                $idsa = $ma->id;
            }
            $noviosacra->save();

            //TESTIGOS NOVIO 1

            $nombres_testigo1 = $request->nombres_testigo1;
            $apellidos_testigo1 = $request->apellidos_testigo1;


            for ($count = 0; $count < count($nombres_testigo1); $count++) {
                $data = array(
                    'nombres_testigo' => $nombres_testigo1[$count],
                    'apellidos_testigo'  => $apellidos_testigo1[$count],
                    'novio_o_novia' => true,
                    'novios_id' => $id
                );
                $insert_data1[] = $data;
            }
            testigos::insert($insert_data1);
            //TESTIGOS NOVIO 1
            $nombres_testigo0 = $request->nombres_testigo0;
            $apellidos_testigo0 = $request->apellidos_testigo0;

            for ($count = 0; $count < count($nombres_testigo0); $count++) {
                $data = array(
                    'nombres_testigo' => $nombres_testigo0[$count],
                    'apellidos_testigo'  => $apellidos_testigo0[$count],
                    'novio_o_novia' => false,
                    'novios_id' => $id
                );
                $insert_data0[] = $data;
            }
            testigos::insert($insert_data0);
            return response()->json();
        }
    }
    public function ActualizarMatrimonio(Request $request)
    {
        if ($request->ajax()) {
            //testigod novio
            $rules = array(
                'nombres_testigo1.*'  => 'required',
                'apellidos_testigo1.*'  => 'required'
            );
            $error = Validator::make($request->all(), $rules);
            if ($error->fails()) {
                return response()->json([
                    'error'  => $error->errors()->all()
                ]);
            }
            //testigos novia
            $rules = array(
                'nombres_testigo0.*'  => 'required',
                'apellidos_testigo0.*'  => 'required'
            );
            $error = Validator::make($request->all(), $rules);
            if ($error->fails()) {
                return response()->json([
                    'error'  => $error->errors()->all()
                ]);
            }
            //PADRES    
            $padres_novios = padres_novios::find($request->padres_novios_id);
            $padres_novios->nombres_p_novio = $request->nombres_p_novio;
            $padres_novios->apellidos_p_novio = $request->apellidos_p_novio;
            $padres_novios->nombres_m_novio = $request->nombres_m_novio;
            $padres_novios->apellidos_m_novio = $request->apellidos_m_novio;
            $padres_novios->nombres_p_novia = $request->nombres_p_novia;
            $padres_novios->apellidos_p_novia = $request->apellidos_p_novia;
            $padres_novios->nombres_m_novia = $request->nombres_m_novia;
            $padres_novios->apellidos_m_novia = $request->apellidos_m_novia;
            $padres_novios->save();


            //NOVIOS
            $novios =  novios::find($request->novios_id);
            $novios->nombres_novio = $request->nombres_novio;
            $novios->apellidos_novio = $request->apellidos_novio;
            $novios->nombres_novia = $request->nombres_novia;
            $novios->apellidos_novia = $request->apellidos_novia;
            //$novios->slug = Str::slug(date('i') . $request->ecle_pagina . $request->ecle_no)
            $novios->padres_novios_id = $padres_novios->id;

            $novios->save();
            // $novioss = novios::all();
            // $novioss->last();

            //NOVIO SACRAMENTO
            $noviosacra = novios_sacramento::where('novios_id', $request->novios_id)->firstOrFail();
            //return response()->json($noviosacra);
            $noviosacra->ecle_anio = $request->ecle_anio;
            $noviosacra->ecle_tomo = $request->ecle_tomo;
            $noviosacra->ecle_pagina = $request->ecle_pagina;
            $noviosacra->ecle_no = $request->ecle_no;
            $noviosacra->civil_anio = $request->civil_anio;
            $noviosacra->civil_tomo = $request->civil_tomo;
            $noviosacra->civil_pagina = $request->civil_pagina;
            $noviosacra->civil_no = $request->civil_no;
            $noviosacra->civil_ciudad = $request->civil_ciudad;
            $noviosacra->civil_partida = $request->civil_partida;
            $noviosacra->dia_ma = $request->dia_ma;
            $noviosacra->mes_ma = $request->mes_ma;
            $noviosacra->anio_ma = $request->anio_ma;
            $noviosacra->novios_id = $novios->id;
            $id = $novios->id;

            // $varsacramento = sacramento::WhereIn('sacramento', ['MATRIMONIO'])->get();
            // foreach ($varsacramento as $ma) {
            //     $noviosacra->sacramento_id = $ma->id;
            //     $idsa = $ma->id;
            // }
            $noviosacra->save();
            //  TESTIGOS NOVIO 1
            $Testigos = testigos::Where('novios_id', $request->novios_id)->get();
            foreach ($Testigos as $pa) {
                $tes = testigos::find($pa->id);
                $tes->delete();
            }
            //TESTIGOS NOVIO 1
            $nombres_testigo1 = $request->nombres_testigo1;
            $apellidos_testigo1 = $request->apellidos_testigo1;
            // return response()->json(['testigos1nombres' => $nombres_testigo1, 'testigos1apellidos' => $apellidos_testigo1]);
            for ($count = 0; $count < count($nombres_testigo1); $count++) {
                $data = array(
                    'nombres_testigo' => $nombres_testigo1[$count],
                    'apellidos_testigo'  => $apellidos_testigo1[$count],
                    'novio_o_novia' => true,
                    'novios_id' => $id
                );
                $insert_data1[] = $data;
            }
            testigos::insert($insert_data1);
            //TESTIGOS NOVIA 0
            $nombres_testigo0 = $request->nombres_testigo0;
            $apellidos_testigo0 = $request->apellidos_testigo0;

            for ($count = 0; $count < count($nombres_testigo0); $count++) {
                $data = array(
                    'nombres_testigo' => $nombres_testigo0[$count],
                    'apellidos_testigo'  => $apellidos_testigo0[$count],
                    'novio_o_novia' => false,
                    'novios_id' => $id
                );
                $insert_data0[] = $data;
            }
            testigos::insert($insert_data0);
            return response()->json();
        }
    }
    public function mostrarmatrimonios()
    {
        $matrimonios = novios::with('novios_sacramento')->get()->reverse();
        return view('pageMastrarMatrimonio', compact('matrimonios'));
    }
    public function obternertestigosypadres(request $request)
    {
        $padres = padres_novios::find($request->padres_id);
        $testigos_novio = testigos::Where('novios_id', $request->novios_id)->Where('novio_o_novia', '=', 1)->get();
        $testigos_novia = testigos::Where('novios_id', $request->novios_id)->Where('novio_o_novia', '=', 0)->get();
        return response()->json(['testigos_novio' => $testigos_novio, 'testigos_novia' => $testigos_novia, 'padres' => $padres]);
        //return response()->json(['padrinos' => $padrinos, 'padres' => $padres]);
    }
    public function BuscarMatrimonio($slug)
    {
        $novios = novios::with('novios_sacramento')->where('slug', '=', $slug)->firstOrFail();
        $padres = padres_novios::find($novios->id);
        $testigos_novio = testigos::Where('novios_id', $novios->id)->Where('novio_o_novia', '=', 1)->get();
        $testigos_novia = testigos::Where('novios_id', $novios->id)->Where('novio_o_novia', '=', 0)->get();
        return view('pageActualizarMartrimonio', compact('novios', 'padres', 'testigos_novio', 'testigos_novia'));
    }
    public function actamatrimonio($slug)
    {
        $novios = novios::with('novios_sacramento')->where('slug', '=', $slug)->firstOrFail();
        $padres = padres_novios::find($novios->id);
        $testigos_novio = testigos::Where('novios_id', $novios->id)->Where('novio_o_novia', '=', 1)->get();
        $numtnobvio = $testigos_novio->count();
        $testigos_novia = testigos::Where('novios_id', $novios->id)->Where('novio_o_novia', '=', 0)->get();
        $numtnobvia = $testigos_novia->count();
        return PDF::loadView('reportes.matrimonio', ['novios' => $novios, 'padres' => $padres, 'testigos_novio' => $testigos_novio, 'testigos_novia' => $testigos_novia, 'numtnobvio' => $numtnobvio, 'numtnobvia' => $numtnobvia])->stream('CertificadoDeMatrimonio.pdf');
    }
}
