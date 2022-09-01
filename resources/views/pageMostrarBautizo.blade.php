@extends('layouts.app')
@section('htmlheader_title')
	Bautizos
@endsection
@section('content')
<div class="container">
    <div class="page-title">
        <h4>Bautizo
            <i class="fa fa-address-book "></i>
        </h4>
    </div>
    
    <div class="col s12 m2" style="background-color:#F1BFFF; height:8px; border-radius:5px;">
    </div>
    <br>
    
        <table id="table_bautizo"  class="striped bordered centered display" style="font-size: 11px">
            <thead style="background-color:#F1BFFF;">
              <tr>
                <th>CÓDIGO</th>
                <th>NOMBRES</th>
                <th>APELLIDOS</th>
                <th>FECHA NACIMIENTO</th>
                <th>FECHA BAUTIZO</th>
                <th>VISUALIZAR</th>
                <th>GENERAR ACTA</th>
                <th><a href="{{ route('bautizo') }}" class="btn-floating purple btn-small tooltipped" data-position="top" data-tooltip="Registrar Bautizo">
                  <i class="material-icons">add</i>
                  </a></th>
              </tr>
            </thead>
            <tbody>
              {{ csrf_field() }}
            
              @foreach ($bautizos as $persona)  
              @foreach ($persona->persona_sacramentobautizo as $per_sacrabau) 
                <tr>
                  <td>{{$persona->slug}}</td>
                  <td>{{$persona->nombres}}</td>
                  <td>{{$persona->apellidos}}</td>
                  <td>{{$per_sacrabau->dia_nac}} DE {{$per_sacrabau->mes_nac}} DE {{$per_sacrabau->anio_nac}}</td>
                  <td>{{$per_sacrabau->dia_sa}} DE {{$per_sacrabau->mes_sa}} DE {{$per_sacrabau->anio_sa}}</td>
                  <td><a href="#show_bau" class="show-modalg_bau btn-floating modal-trigger light-blue btn-small tooltipped" data-position="top" data-tooltip="Ver Bautizo" 
                       data-nombres="{{$persona->nombres}}" data-apellidos="{{$persona->apellidos}}" data-ciudad_nac="{{$per_sacrabau->ciudad_nac}}"
                       data-dia_nac="{{$per_sacrabau->dia_nac}}" data-mes_nac="{{$per_sacrabau->mes_nac}}" data-anio_nac="{{$per_sacrabau->anio_nac}}"
                       data-dia_sa="{{$per_sacrabau->dia_sa}}" data-mes_sa="{{$per_sacrabau->mes_sa}}" data-anio_sa="{{$per_sacrabau->anio_sa}}" data-parroco="{{$per_sacrabau->parroco}}"
                      
                       data-ecle_anio="{{$per_sacrabau->ecle_anio}}" data-ecle_tomo="{{$per_sacrabau->ecle_tomo}}" data-ecle_pagina="{{$per_sacrabau->ecle_pagina}}" data-ecle_no="{{$per_sacrabau->ecle_no}}"
                       data-civil_anio="{{$per_sacrabau->civil_anio}}" data-civil_tomo="{{$per_sacrabau->civil_tomo}}" data-civil_pagina="{{$per_sacrabau->civil_pagina}}" data-civil_no="{{$per_sacrabau->civil_no}}" data-civil_parroquia="{{$per_sacrabau->civil_parroquia}}"
                       data-nota="{{$per_sacrabau->nota}}"  data-id_persona="{{$persona->id}}" data-id_padre="{{$persona->padre_id}}" data-sacramento_id="{{$per_sacrabau->sacramento_id}}" data-slug="{{$persona->slug}}">
                     <i class="material-icons">visibility</i>
                     </a>
                  </td>
                  <td><a href="{{route('actabautizo',[$persona->slug])}}" target="_blank" class="btn-floating purple btn-small tooltipped" data-position="top" data-tooltip="Generar Acta">
                    <i class="material-icons">arrow_downward</i>
                    </a>
                  </td>
                  <td>
                    <a href="{{route('editarbautizos',[$persona->slug])}}" class="btn-floating green btn-small tooltipped" data-position="top" data-tooltip="Actualizar">
                        <i class="material-icons">edit</i>
                        </a>&nbsp;&nbsp;
                    <a{{-- href="{{route('registarcomunion1',[$persona->slug])}}" --}} class="ingrebau btn-floating pink btn-small tooltipped" data-position="top" data-tooltip="Registrar Comunión" data-id_persona="{{$persona->id}}" data-slug="{{$persona->slug}}">
                        <i class="material-icons">person_add</i>
                    </a>&nbsp;&nbsp;  
                    <a{{--  href="{{route('registarconfirma1',[$persona->slug])}}" --}} class="ingreconfir btn-floating modal-trigger orange btn-small tooltipped" data-position="top" data-tooltip="Registrar Confirmación" data-id_persona="{{$persona->id}}" data-slug="{{$persona->slug}}">
                         <i class="material-icons">person_add</i>
                    </a>
                  </td>
                </tr>
              @endforeach
              @endforeach
              
            </tbody>
         </table>
    
</div>

<div id="show_bau" class="modal modal-fixed-footer" >
  <div class="modal-content">
    {{ csrf_field() }}
    <div class="modal-header">
      <h4 class="modal-title">Información de bautizo<i class="material-icons" >book</i></h4>
    </div>
    <li class="divider"></li>
    <div class="modal-body" id="body"> 
      <p style="color: #7E418F"><b>DATOS PERSONALES</b></p>
      <p>NOMBRES Y APELLIDOS : <b id="nombres"></b> <b id="apellidos"></b></p>
      <p>CIUDAD DE NACIMIENTO : <b id="ciudad_nac"></b></p>
      <p>FECHA DE NACIMIENTO: <b id="dia_nac"></b> <b>DE</b> <b id="mes_nac"></b> <b>DE</b> <b id="anio_nac"></b></p>
      <p style="color: #7E418F"><b>DATOS DE BAUTIZO</b></p>
      <p>FECHA DE BAUTIZO: <b id="dia_sa"></b> <b>DE</b> <b id="mes_sa"></b> <b>DE</b> <b id="anio_sa"></b></p>
      <p>PÁRROCO : <b id="parroco"></b></p>
      <p style="color: #7E418F"><b>PADRES</b></p>
      <div id="padres">
      </div>
      <p style="color: #7E418F"><b>REGISTRO ECLESIÁSTICO</b></p>
      <p>AÑO : <b id="ecle_anio"></b>&nbsp;&nbsp;&nbsp;TOMO: <b id="ecle_tomo"></b>&nbsp;&nbsp;&nbsp;PÁGINA: <b id="ecle_pagina"></b>&nbsp;&nbsp;&nbsp;NÚMERO: <b id="ecle_no"></b></p>
      <p style="color: #7E418F"><b>REGISTRO CIVIL</b></p>
      <p>AÑO : <b id="civil_anio"></b>&nbsp;&nbsp;&nbsp;TOMO: <b id="civil_tomo"></b>&nbsp;&nbsp;&nbsp;PÁGINA: <b id="civil_pagina"></b>&nbsp;&nbsp;&nbsp;NÚMERO: <b id="civil_no"></b>&nbsp;&nbsp;&nbsp;PARROQUIA: <b id="civil_parroquia"></b></p>
      <p style="color: #7E418F"><b>NOTA MARGINAL</b></p>
      <p>NOTA: <b id="nota"></b></p>
      <p style="color: #7E418F"><b>DATOS DE PADRINOS</b></p>
      <div id="padri">
      
      </div>
     
    </div>   
  </div>
  <div class="modal-footer">
    
    <a class=" btn red modal-close"><i class="material-icons left" >close</i>Cerrar</a>
   
  </div>
</div>

<br>
@section('script')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> --}}

<script src="{{ asset('/jstables/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/logicaMostrarBautizo.js') }}"></script>
@endsection
@endsection
