@extends('layouts.app')
@section('htmlheader_title')
Confirmas
@endsection
@section('content')
<div class="container">
    <div class="page-title">
        <h4>Confirmaciones
            <i class="fa fa-address-book "></i>
        </h4>
    </div>
    <div class="col s12 m2" style="background-color:#ffab40; height:8px; border-radius:5px;">
    </div>
    <br>
        <table id="table_confirma"  class="striped bordered centered display" style="font-size: 11px">
            <thead style="background-color:#ffcc80">
              <tr>
                <th>CÓDIGO</th>
                <th>NOMBRES</th>
                <th>APELLIDOS</th>
                <th>FECHA BAUTIZO</th>
                <th>FECHA CONFIRMACIÓN</th>
                <th>VISUALIZAR</th>
                <th>GENERAR ACTA</th>
                <th><a href="{{ route('registarconfirma2') }}" class="btn-floating orange btn-small tooltipped" data-position="top" data-tooltip="Registrar Confirmación">
                  <i class="material-icons">add</i>
                  </a></th>
              </tr>
            </thead>
            <tbody>
              {{ csrf_field() }}
            
              @foreach ($confirmas as $persona)  
              @foreach ($persona->persona_sacramentoconfirma as $per_sacracon) 
                <tr>
                  <td>{{$persona->slug}}</td>
                  <td>{{$persona->nombres}}</td>
                  <td>{{$persona->apellidos}}</td>
                  <td>{{$per_sacracon->dia_sa}} DE {{$per_sacracon->mes_sa}} DE {{$per_sacracon->anio_sa}}</td>
                  <td>{{$per_sacracon->dia_con}} DE {{$per_sacracon->mes_con}} DE {{$per_sacracon->anio_con}}</td>
                  <td><a href="#show_co" class="show-modalg_con btn-floating modal-trigger light-blue btn-small tooltipped" data-position="top" data-tooltip="Ver Confirma" 
                       data-nombres="{{$persona->nombres}}" data-apellidos="{{$persona->apellidos}}" data-ciudad_sa="{{$per_sacracon->ciudad_sa}}"
                       data-dia_con="{{$per_sacracon->dia_con}}" data-mes_con="{{$per_sacracon->mes_con}}" data-anio_con="{{$per_sacracon->anio_con}}"
                       data-dia_sa="{{$per_sacracon->dia_sa}}" data-mes_sa="{{$per_sacracon->mes_sa}}" data-anio_sa="{{$per_sacracon->anio_sa}}" data-obispo_confirma="{{$per_sacracon->obispo_confirma}}"
                      
                       data-ecle_anio="{{$per_sacracon->ecle_anio}}" data-ecle_tomo="{{$per_sacracon->ecle_tomo}}" data-ecle_pagina="{{$per_sacracon->ecle_pagina}}" data-ecle_no="{{$per_sacracon->ecle_no}}"
                       data-civil_anio="{{$per_sacracon->civil_anio}}" data-civil_tomo="{{$per_sacracon->civil_tomo}}" data-civil_pagina="{{$per_sacracon->civil_pagina}}" data-civil_no="{{$per_sacracon->civil_no}}" data-civil_parroquia="{{$per_sacracon->civil_parroquia}}"
                       data-nota="{{$per_sacracon->nota}}"  data-id_persona="{{$persona->id}}" data-id_padre="{{$persona->padre_id}}" data-sacramento_id="{{$per_sacracon->sacramento_id}}">
                     <i class="material-icons">visibility</i>
                     </a>
                  </td>
                  <td><a href="{{route('actacconfirma',[$persona->slug])}}" target="_blank" class="btn-floating orange btn-small tooltipped" data-position="top" data-tooltip="Generar Acta">
                    <i class="material-icons">arrow_downward</i>
                    </a>
                  </td>
                  <td>
                    <a href="{{route('editarconfirma',[$persona->slug])}}" class="btn-floating green btn-small tooltipped" data-position="top" data-tooltip="Actualizar">
                        <i class="material-icons">edit</i>
                        </a>
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
      <h4 class="modal-title">Información de confirmación<i class="material-icons" >book</i></h4>
    </div>
    <li class="divider"></li>
    <div class="modal-body" id="body"> 
      <p style="color: #ffab40"><b>DATOS PERSONALES</b></p>
      <p>NOMBRES Y APELLIDOS : <b id="nombres"></b> <b id="apellidos"></b></p>
      <p style="color: #ffab40"><b>DATOS DE CONFIRMA</b></p>
      <p>FECHA DE BAUTIZO: <b id="dia_sa"></b> <b>DE</b> <b id="mes_sa"></b> <b>DE</b> <b id="anio_sa"></b></p>
      <p>CIUDAD DE BAUTIZO : <b id="ciudad_sa"></b></p>
      <p>FECHA DE CONFIRMA: <b id="dia_con"></b> <b>DE</b> <b id="mes_con"></b> <b>DE</b> <b id="anio_con"></b></p>
      <p>OBISPO QUE COMFIRMO : <b id="obispo_confirma"></b></p>
      <p style="color: #ffab40"><b>PADRES</b></p>
      <div id="padres">
      </div>
      <p style="color: #ffab40"><b>REGISTRO ECLESIÁSTICO</b></p>
      <p>AÑO : <b id="ecle_anio"></b>&nbsp;&nbsp;&nbsp;TOMO: <b id="ecle_tomo"></b>&nbsp;&nbsp;&nbsp;PAGINA: <b id="ecle_pagina"></b>&nbsp;&nbsp;&nbsp;NÚMERO: <b id="ecle_no"></b></p>
      <p style="color: #ffab40"><b>REGISTRO CIVIL</b></p>
      <p>AÑO : <b id="civil_anio"></b>&nbsp;&nbsp;&nbsp;TOMO: <b id="civil_tomo"></b>&nbsp;&nbsp;&nbsp;PAGINA: <b id="civil_pagina"></b>&nbsp;&nbsp;&nbsp;NÚMERO: <b id="civil_no"></b>&nbsp;&nbsp;&nbsp;PARROQUIA: <b id="civil_parroquia"></b></p>
      <p style="color: #ffab40"><b>NOTA MARGINAL</b></p>
      <p>NOTA: <b id="nota"></b></p>
      <p style="color: #ffab40"><b>DATOS DE PADRINOS</b></p>
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
<script type="text/javascript" src="{{ asset('js/logicaMostrarConfirma.js') }}"></script>
@endsection
@endsection
