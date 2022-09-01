@extends('layouts.app')
@section('htmlheader_title')
Matrimonio
@endsection
@section('content')
<div class="container">
    <div class="page-title">
        <h4>Matrimonios
            <i class="fa fa-address-book "></i>
        </h4>
    </div>
    <div class="col s12 m2" style="background-color:#4caf50; height:8px; border-radius:5px;">
    </div>
    <br>
        <table id="table_matrimonio"  class="striped bordered centered display" style="font-size: 11px">
            <thead style="background-color:#a5d6a7 ">
              <tr>
                <th>CÓDIGO</th>
                <th>NOVIO</th>
                <th>NOVIA</th>
                <th>FECHA DE MATRIMONIO</th>
                <th>VISUALIZAR</th>
                <th>GENERAR ACTA</th>
                <th><a href="{{ route('registarmatrimonio') }}" class="btn-floating orange btn-small tooltipped" data-position="top" data-tooltip="Registrar Matrimonio">
                  <i class="material-icons">add</i>
                  </a></th>
              </tr>
            </thead>
            <tbody>
              {{ csrf_field() }}
            
              @foreach ($matrimonios as $novios)  
              @foreach ($novios->novios_sacramento as $no_sacra) 
                <tr>
                  <td>{{$novios->slug}}</td>
                  <td>{{$novios->nombres_novio}} {{$novios->apellidos_novio}}</td>
                  <td>{{$novios->nombres_novia}} {{$novios->apellidos_novia}}</td>
                  <td>{{$no_sacra->dia_ma}} DE {{$no_sacra->mes_ma}} DE {{$no_sacra->anio_ma}}</td>
                  <td><a href="#show_ma" class="show-modalg_ma btn-floating modal-trigger light-blue btn-small tooltipped" data-position="top" data-tooltip="Ver Matrimonio" 
                       data-nombres_novio="{{$novios->nombres_novio}}" data-apellidos_novio="{{$novios->apellidos_novio}}"
                       data-nombres_novia="{{$novios->nombres_novia}}" data-apellidos_novia="{{$novios->apellidos_novia}}"
                       data-dia_ma="{{$no_sacra->dia_ma}}" data-mes_ma="{{$no_sacra->mes_ma}}" data-anio_ma="{{$no_sacra->anio_ma}}"
                       data-ecle_anio="{{$no_sacra->ecle_anio}}" data-ecle_tomo="{{$no_sacra->ecle_tomo}}" data-ecle_pagina="{{$no_sacra->ecle_pagina}}" data-ecle_no="{{$no_sacra->ecle_no}}"
                       data-civil_anio="{{$no_sacra->civil_anio}}" data-civil_tomo="{{$no_sacra->civil_tomo}}" data-civil_pagina="{{$no_sacra->civil_pagina}}"
                       data-civil_no="{{$no_sacra->civil_no}}" data-civil_ciudad="{{$no_sacra->civil_ciudad}}" data-civil_partida="{{$no_sacra->civil_partida}}" data-civil_ciudad="{{$no_sacra->civil_ciudad}}"
                       data-id_novios="{{$novios->id}}" data-id_padres="{{$novios->padres_novios_id}}" data-sacramento_id="{{$no_sacra->sacramento_id}}">
                     <i class="material-icons">visibility</i>
                     </a>
                  </td>
                  <td><a href="{{route('actamatrimonio',[$novios->slug])}}" target="_blank" class=" btn-floating orange darken-3 btn-small tooltipped" data-position="top" data-tooltip="Generar Acta">
                    <i class="material-icons">arrow_downward</i>
                    </a>
                  </td>
                  <td>
                    <a href="{{route('editarmatrimonio',[$novios->slug])}}" class="btn-floating green btn-small tooltipped" data-position="top" data-tooltip="Actualizar">
                        <i class="material-icons">edit</i>
                        </a>
                  </td>
                </tr>
              @endforeach
              @endforeach
              
            </tbody>
         </table>
    
</div>

<div id="show_ma" class="modal modal-fixed-footer" >
  <div class="modal-content">
    {{ csrf_field() }}
    <div class="modal-header">
      <h4 class="modal-title">Información de Matrimonio<i class="material-icons" >book</i></h4>
    </div>
    <li class="divider"></li>
    <div class="modal-body" id="body"> 
      <p style="color: #4caf50"><b>DATOS DEL NOVIO</b></p>
      <p>NOMBRES Y APELLIDOS : <b id="nombres_novio"></b> <b id="apellidos_novio"></b></p>
      <p style="color: #4caf50"><b>DATOS DE LA NOVIA</b></p>
      <p>NOMBRES Y APELLIDOS : <b id="nombres_novia"></b> <b id="apellidos_novia"></b></p>
      <p style="color: #4caf50"><b>FECHA MATRIMONIO</b></p>
      <p>FECHA DE MATRIMONIO: <b id="dia_ma"></b> <b>DE</b> <b id="mes_ma"></b> <b>DE</b> <b id="anio_ma"></b></p>
      <p style="color: #4caf50"><b>PADRES DEL NOVIO</b></p>
      <div id="padres_novio">
      </div>
      <p style="color: #4caf50"><b>PADRES DE LA NOVIA</b></p>
      <div id="padres_novia">
      </div>
      <p style="color: #4caf50"><b>REGISTRO ECLESIÁSTICO</b></p>
      <p>AÑO : <b id="ecle_anio"></b>&nbsp;&nbsp;&nbsp;TOMO: <b id="ecle_tomo"></b>&nbsp;&nbsp;&nbsp;PÁGINA: <b id="ecle_pagina"></b>&nbsp;&nbsp;&nbsp;NÚMERO: <b id="ecle_no"></b></p>
      <p style="color: #4caf50"><b>REGISTRO CIVIL</b></p>
      <p>AÑO : <b id="civil_anio"></b>&nbsp;&nbsp;&nbsp;TOMO: <b id="civil_tomo"></b>&nbsp;&nbsp;&nbsp;PÁGINA: <b id="civil_pagina"></b>&nbsp;&nbsp;&nbsp;NÚMERO: <b id="civil_no"></b>&nbsp;&nbsp;&nbsp;PARROQUIA: <b id="civil_parroquia"></b></p>
      <p style="color: #4caf50"><b>TESTIGOS DEL NOVIO</b></p>
      <div id="testigos_novio">
      </div>
      <p style="color: #4caf50"><b>TESTIGOS DE LA NOVIA</b></p>
      <div id="testigos_novia">
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
<script type="text/javascript" src="{{ asset('js/logicaMostrarmatrimonio.js') }}"></script>
@endsection
@endsection
