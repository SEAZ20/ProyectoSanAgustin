<?php

namespace App\Http\Controllers;

use App\novios;
use Illuminate\Http\Request;
use Validator;
use App\persona;
use App\padre;
use App\padres_novios;
use App\persona_sacramentobautizo;
use Illuminate\Support\Facades\DB;

class ConsultasController extends Controller
{
    public function ConsultaBautizo(Request $request)
    {
        if ($request->ajax()) {
            $rules = array(
                'nombres'  => 'required',
                'apellidos'  => 'required'
            );
            $error = Validator::make($request->all(), $rules);
            if ($error->fails()) {
                return response()->json([
                    'error'  => $error->errors()->all()
                ]);
            }
            //$personas = persona::with('persona_sacramentobautizo')->get();
            $padres = collect();
            $personas = persona::join('persona_sacramentobautizo', 'persona.id', '=', 'persona_sacramentobautizo.persona_id')
                ->select('*')
                ->where('persona.nombres', '=', $request->nombres)->Where('persona.apellidos', $request->apellidos)
                ->get();

            //$personas = persona::with('persona_sacramentobautizo')->Where('nombres', $request->nombres)->Where('apellidos', $request->apellidos)->get();
            foreach ($personas as $perso) {
                $padre_persona = padre::find($perso->padre_id);
                $padres->push($padre_persona);
            }
            return response()->json(['personas' => $personas, 'padres' => $padres]);
        }
    }
    public function ConsultaComunion(Request $request)
    {
        if ($request->ajax()) {
            $rules = array(
                'nombres'  => 'required',
                'apellidos'  => 'required'
            );
            $error = Validator::make($request->all(), $rules);
            if ($error->fails()) {
                return response()->json([
                    'error'  => $error->errors()->all()
                ]);
            }
            //$personas = persona::with('persona_sacramentobautizo')->get();
            $padres = collect();
            $personas = persona::join('persona_sacramentocomunion', 'persona.id', '=', 'persona_sacramentocomunion.persona_id')
                ->select('*')
                ->where('persona.nombres', '=', $request->nombres)->Where('persona.apellidos', $request->apellidos)
                ->get();
            // $personas = persona::with('persona_sacramentocomunion')->Where('nombres', $request->nombres)->Where('apellidos', $request->apellidos)->get();
            foreach ($personas as $perso) {
                $padre_persona = padre::find($perso->padre_id);
                $padres->push($padre_persona);
            }
            return response()->json(['personas' => $personas, 'padres' => $padres]);
        }
    }
    public function ConsultaConfirma(Request $request)
    {
        if ($request->ajax()) {
            $rules = array(
                'nombres'  => 'required',
                'apellidos'  => 'required'
            );
            $error = Validator::make($request->all(), $rules);
            if ($error->fails()) {
                return response()->json([
                    'error'  => $error->errors()->all()
                ]);
            }
            //$personas = persona::with('persona_sacramentobautizo')->get();
            $padres = collect();
            $personas = persona::join('persona_sacramentoconfirma', 'persona.id', '=', 'persona_sacramentoconfirma.persona_id')
                ->select('*')
                ->where('persona.nombres', '=', $request->nombres)->Where('persona.apellidos', $request->apellidos)
                ->get();
            // $personas = persona::with('persona_sacramentoconfirma')->Where('nombres', $request->nombres)->Where('apellidos', $request->apellidos)->get();
            foreach ($personas as $perso) {
                $padre_persona = padre::find($perso->padre_id);
                $padres->push($padre_persona);
            }
            return response()->json(['personas' => $personas, 'padres' => $padres]);
        }
    }
    public function ConsultaMatrimonio(Request $request)
    {
        if ($request->ajax()) {
            $rules = array(
                'nombres'  => 'required',
                'apellidos'  => 'required'
            );
            $error = Validator::make($request->all(), $rules);
            if ($error->fails()) {
                return response()->json([
                    'error'  => $error->errors()->all()
                ]);
            }
            //$personas = persona::with('persona_sacramentobautizo')->get();

            $padres = collect();

            $personas = novios::join('novios_sacramento', 'novios.id', '=', 'novios_sacramento.novios_id')
                ->select('*')
                ->where('novios.nombres_novio', '=', $request->nombres)->Where('novios.apellidos_novio', $request->apellidos)
                ->get();

            if ($personas->isEmpty()) {

                $personas = novios::join('novios_sacramento', 'novios.id', '=', 'novios_sacramento.novios_id')
                    ->select('*')
                    ->where('novios.nombres_novia', '=', $request->nombres)->Where('novios.apellidos_novia', $request->apellidos)
                    ->get();
            }
            foreach ($personas as $perso) {
                $padre_persona = padres_novios::find($perso->padres_novios_id);
                $padres->push($padre_persona);
            }
            return response()->json(['personas' => $personas, 'padres' => $padres]);
        }
    }
}
