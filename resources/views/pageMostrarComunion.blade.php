@extends('layouts.app')
@section('htmlheader_title')
Comunión
@endsection
@section('content')
<div class="container">
    <div class="page-title">
        <h4>Comunión
            <i class="fa fa-address-book "></i>
        </h4>
    </div>
    <div class="col s12 m2" style="background-color:#f06292; height:8px; border-radius:5px;">
    </div>
    <br>
        <table id="table_comunion"  class="striped bordered centered display" style="font-size: 11px">
            <thead style="background-color:#f48eaf">
              <tr>
                <th>CÓDIGO</th>
                <th>NOMBRES</th>
                <th>APELLIDOS</th>
                <th>FECHA BAUTIZO</th>
                <th>FECHA COMUNIÓN</th>
                <th>VISUALIZAR</th>
                <th>GENERAR ACTA</th>
                <th><a href="{{ route('registarcomunion2') }}" class="btn-floating pink btn-small tooltipped" data-position="top" data-tooltip="Registrar Comunión">
                  <i class="material-icons">add</i>
                  </a></th>
              </tr>
            </thead>
            <tbody>
              {{ csrf_field() }}
            
              @foreach ($comuniones as $persona)  
              @foreach ($persona->persona_sacramentocomunion as $per_sacracomu) 
                <tr>
                  <td>{{$persona->slug}}</td>
                  <td>{{$persona->nombres}}</td>
                  <td>{{$persona->apellidos}}</td>
                  <td>{{$per_sacracomu->dia_sa}} DE {{$per_sacracomu->mes_sa}} DE {{$per_sacracomu->anio_sa}}</td>
                  <td>{{$per_sacracomu->dia_co}} DE {{$per_sacracomu->mes_co}} DE {{$per_sacracomu->anio_co}}</td>
                  <td><a href="#show_co" class="show-modalg_co btn-floating modal-trigger light-blue btn-small tooltipped" data-position="top" data-tooltip="Ver Comunión" 
                       data-nombres="{{$persona->nombres}}" data-apellidos="{{$persona->apellidos}}" data-ciudad_sa="{{$per_sacracomu->ciudad_sa}}"
                       data-dia_co="{{$per_sacracomu->dia_co}}" data-mes_co="{{$per_sacracomu->mes_co}}" data-anio_co="{{$per_sacracomu->anio_co}}"
                       data-dia_sa="{{$per_sacracomu->dia_sa}}" data-mes_sa="{{$per_sacracomu->mes_sa}}" data-anio_sa="{{$per_sacracomu->anio_sa}}" data-parroco_comunion="{{$per_sacracomu->parroco_comunion}}"
                      
                       data-ecle_anio="{{$per_sacracomu->ecle_anio}}" data-ecle_tomo="{{$per_sacracomu->ecle_tomo}}" data-ecle_pagina="{{$per_sacracomu->ecle_pagina}}" data-ecle_no="{{$per_sacracomu->ecle_no}}"
                       data-civil_anio="{{$per_sacracomu->civil_anio}}" data-civil_tomo="{{$per_sacracomu->civil_tomo}}" data-civil_pagina="{{$per_sacracomu->civil_pagina}}" data-civil_no="{{$per_sacracomu->civil_no}}" data-civil_parroquia="{{$per_sacracomu->civil_parroquia}}"
                       data-nota="{{$per_sacracomu->nota}}"  data-id_persona="{{$persona->id}}" data-id_padre="{{$persona->padre_id}}" data-sacramento_id="{{$per_sacracomu->sacramento_id}}">
                     <i class="material-icons">visibility</i>
                     </a>
                  </td>
                  <td><a href="{{route('actacomunion',[$persona->slug])}}" target="_blank" class="show-modalg btn-floating pink btn-small tooltipped" data-position="top" data-tooltip="Generar Acta">
                    <i class="material-icons">arrow_downward</i>
                    </a>
                  </td>
                  <td>
                    <a href="{{route('editarcomunion',[$persona->slug])}}" class="btn-floating green btn-small tooltipped" data-position="top" data-tooltip="Actualizar">
                        <i class="material-icons">edit</i>
                        </a>&nbsp;&nbsp;
                   
                  </td>
                </tr>
              @endforeach
              @endforeach
              
            </tbody>
         </table>
    
</div>

<div id="show_co" class="modal modal-fixed-footer" >
  <div class="modal-content">
    {{ csrf_field() }}
    <div class="modal-header">
      <h4 class="modal-title">Información de comunión<i class="material-icons" >book</i></h4>
    </div>
    <li class="divider"></li>
    <div class="modal-body" id="body"> 
      <p style="color: #f06292"><b>DATOS PERSONALES</b></p>
      <p>NOMBRES Y APELLIDOS : <b id="nombres"></b> <b id="apellidos"></b></p>
      <p style="color: #f06292"><b>DATOS DE COMUNIÓN</b></p>
      <p>FECHA DE BAUTIZO: <b id="dia_sa"></b> <b>DE</b> <b id="mes_sa"></b> <b>DE</b> <b id="anio_sa"></b></p>
      <p>CIUDAD DE BAUTIZO : <b id="ciudad_sa"></b></p>
      <p>FECHA DE COMUNIÓN: <b id="dia_co"></b> <b>DE</b> <b id="mes_co"></b> <b>DE</b> <b id="anio_co"></b></p>
      <p>PÁRROCO : <b id="parroco_comunion"></b></p>
      <p style="color: #f06292"><b>PADRES</b></p>
      <div id="padres">
      </div>
      <p style="color: #f06292"><b>REGISTRO ECLESIÁSTICO</b></p>
      <p>AÑO : <b id="ecle_anio"></b>&nbsp;&nbsp;&nbsp;TOMO: <b id="ecle_tomo"></b>&nbsp;&nbsp;&nbsp;PÁGINA: <b id="ecle_pagina"></b>&nbsp;&nbsp;&nbsp;NÚMERO: <b id="ecle_no"></b></p>
      <p style="color: #f06292"><b>REGISTRO CIVIL</b></p>
      <p>AÑO : <b id="civil_anio"></b>&nbsp;&nbsp;&nbsp;TOMO: <b id="civil_tomo"></b>&nbsp;&nbsp;&nbsp;PÁGINA: <b id="civil_pagina"></b>&nbsp;&nbsp;&nbsp;NÚMERO: <b id="civil_no"></b>&nbsp;&nbsp;&nbsp;PARROQUIA: <b id="civil_parroquia"></b></p>
      <p style="color: #f06292"><b>NOTA MARGINAL</b></p>
      <p>NOTA: <b id="nota"></b></p>
      <p style="color: #f06292"><b>DATOS DE PADRINOS</b></p>
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
<script type="text/javascript" src="{{ asset('js/logicaMostrarComunion.js') }}"></script>
@endsection
@endsection
