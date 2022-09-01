@extends('layouts.app')
@section('htmlheader_title')
Comunión
@endsection
@section('content')
<div class="container">
  <div class="page-title">
    <h4>Actualizar Comunión
        <i class="fa fa-edit"></i>
    </h4>
  </div>
  <div class="col s12 m2" style="background-color:#f06292; height:8px; border-radius:5px;"></div>
  <br>
  <div class="row">
    <div class="col s12 m12">
      <div class="card">
        <div class="card-content">
            <form method="POST" id="dynamic_form_actu_comu">
                @foreach ($persona->persona_sacramentocomunion as $per_sacracomu) 
                <span class="card-title" style="color: #f06292; font-weight: normal;">Datos Personales</span> 
                <li class="divider"></li>
                {{ csrf_field() }}
                <div class="row ">
                    <div class="input-field col s6">
                        <input type="text" name="nombres" id="nombres" class="validate" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{$persona->nombres}}">
                        <label for="nombres">Nombres</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" name="apellidos" id="apellidos" class="validate" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{$persona->apellidos}}">
                        <label for="apellidos">Apellidos</label>
                        <input type="hidden" name="persona_id" id="persona_id" class="validate" value="{{$persona->id}}">
                        <input type="hidden" name="padre_id" id="padre_id" class="validate" value="{{$persona->padre_id}}">
                    </div>
                    
                </div>
                <span class="card-title" style="color: #f06292; font-weight: normal;">Fecha de Bautizo</span> 
                <li class="divider"></li>
                <div class="row ">
                    <div class="input-field col s3">
                        <select id="mes_sa" name="mes_sa" >
                        <option value="{{$per_sacracomu->mes_sa}}" selected>{{$per_sacracomu->mes_sa}}</option>
                        <option value="ENERO">Enero</option>
                          <option value="FEBRERO">Febrero</option>
                          <option value="MARZO">Marzo</option>
                          <option value="ABRIL">Abril</option>
                          <option value="MAYO">Mayo</option>
                          <option value="JUNIO">Junio</option>
                          <option value="JULIO">Julio</option>
                          <option value="AGOSTO">Agosto</option>
                          <option value="SEPTIEMBRE">Septiembre</option>
                          <option value="OCTUBRE">Octubre</option>
                          <option value="NOVIEMBRE">Noviembre</option>
                          <option value="DICIEMBRE">Diciembre</option>
                        </select>
                        <label>Mes de bautizo</label>
                    </div>
                    <div class="input-field col s2">
                        <select id="dia_sa" name="dia_sa">
                            <option value="{{$per_sacracomu->dia_sa}}" selected>{{$per_sacracomu->dia_sa}}</option>
                            <option value="1">1</option> 
                            <option value="2">2</option> 
                            <option value="3">3</option> 
                            <option value="4">4</option> 
                            <option value="5">5</option> 
                            <option value="6">6</option> 
                            <option value="7">7</option> 
                            <option value="8">8</option> 
                            <option value="9">9</option> 
                            <option value="10">10</option> 
                            <option value="11">11</option> 
                            <option value="12">12</option> 
                            <option value="13">13</option> 
                            <option value="14">14</option> 
                            <option value="15">15</option> 
                            <option value="16">16</option> 
                            <option value="17">17</option> 
                            <option value="18">18</option> 
                            <option value="19">19</option> 
                            <option value="20">20</option> 
                            <option value="21">21</option> 
                            <option value="22">22</option> 
                            <option value="23">23</option> 
                            <option value="24">24</option> 
                            <option value="25">25</option> 
                            <option value="26">26</option> 
                            <option value="27">27</option> 
                            <option value="28">28</option> 
                            <option value="29">29</option> 
                            <option value="30">30</option> 
                            <option value="31">31</option>
                        </select>
                        <label>Mes de bautizo</label>
                    </div>
                    <div class="input-field col s2">
                        <input type="text" id="anio_sa" name="anio_sa" class="validate" maxlength="4" minlength="4" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" value="{{$per_sacracomu->anio_sa}}">
                        <label for="anio_sa">Año de bautizo</label>
                    </div>
                    <div class="input-field col s5">
                        <input type="text" id="ciudad_sa" name="ciudad_sa" class="validate" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{$per_sacracomu->ciudad_sa}}">
                        <label for="ciudad_sa">Ciudad de bautizo</label>
                    </div>
                </div>
                <span class="card-title" style="color: #f06292; font-weight: normal;">Fecha de comunión</span> 
                <li class="divider"></li>
                <div class="row ">
                    <div class="input-field col s3">
                        <select id="mes_co" name="mes_co" required class="validate" >
                          <option value="{{$per_sacracomu->mes_co}}" selected>{{$per_sacracomu->mes_co}}</option>
                          <option value="ENERO">Enero</option>
                          <option value="FEBRERO">Febrero</option>
                          <option value="MARZO">Marzo</option>
                          <option value="ABRIL">Abril</option>
                          <option value="MAYO">Mayo</option>
                          <option value="JUNIO">Junio</option>
                          <option value="JULIO">Julio</option>
                          <option value="AGOSTO">Agosto</option>
                          <option value="SEPTIEMBRE">Septiembre</option>
                          <option value="OCTUBRE">Octubre</option>
                          <option value="NOVIEMBRE">Noviembre</option>
                          <option value="DICIEMBRE">Diciembre</option>
                        </select>
                        <label>Mes de comunión</label>
                    </div>
                    <div class="input-field col s2">
                        <select id="dia_co" name="dia_co" required class="validate" >
                            <option value="{{$per_sacracomu->dia_co}}" selected>{{$per_sacracomu->dia_co}}</option>
                            <option value="1">1</option> 
                            <option value="2">2</option> 
                            <option value="3">3</option> 
                            <option value="4">4</option> 
                            <option value="5">5</option> 
                            <option value="6">6</option> 
                            <option value="7">7</option> 
                            <option value="8">8</option> 
                            <option value="9">9</option> 
                            <option value="10">10</option> 
                            <option value="11">11</option> 
                            <option value="12">12</option> 
                            <option value="13">13</option> 
                            <option value="14">14</option> 
                            <option value="15">15</option> 
                            <option value="16">16</option> 
                            <option value="17">17</option> 
                            <option value="18">18</option> 
                            <option value="19">19</option> 
                            <option value="20">20</option> 
                            <option value="21">21</option> 
                            <option value="22">22</option> 
                            <option value="23">23</option> 
                            <option value="24">24</option> 
                            <option value="25">25</option> 
                            <option value="26">26</option> 
                            <option value="27">27</option> 
                            <option value="28">28</option> 
                            <option value="29">29</option> 
                            <option value="30">30</option> 
                            <option value="31">31</option>
                        </select>
                        <label>Día de comunión</label>
                    </div>
                    <div class="input-field col s2">
                        <input type="text" id="anio_co" name="anio_co" class="validate"  maxlength="4" minlength="4" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" value="{{$per_sacracomu->anio_co}}">
                        <label for="anio_co">Año de comunión</label>
                    </div>
                    <div class="input-field col s5">
                        <input type="text" id="parroco_comunion" name="parroco_comunion" class="validate" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{$per_sacracomu->parroco_comunion}}">
                        <label for="ciudad_nac">Párroco</label>
                    </div>
                </div>
                <span class="card-title" style="color: #f06292; font-weight: normal;">Datos de los padres</span> 
                <li class="divider"></li>
                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" id="nombres_p" name="nombres_p" class="validate" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{$padres->nombres_p}}">
                        <label for="nombres_p">Nombres del padre</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" id="apellidos_p" name="apellidos_p" class="validate" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{$padres->apellidos_p}}">
                        <label for="apellidos_p">Apellidos del padre</label>
                    </div>
                </div> 
                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" id="nombres_m" name="nombres_m" class="validate" onkeyup="javascript:this.value=this.value.toUpperCase();"value="{{$padres->nombres_m}}">
                        <label for="nombres_m">Nombres de la madre</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" id="apellidos_m" name="apellidos_m" class="validate" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{$padres->apellidos_m}}">
                        <label for="apellidos_m">Apellidos de la madre</label>
                    </div> 
                </div> 
                <span class="card-title" style="color: #f06292; font-weight: normal;">Registro eclesiástico</span> 
                <li class="divider"></li>
                <div class="row">
                    <div class="input-field col s3">
                        <input type="text" id="ecle_anio" name="ecle_anio" class="validate" maxlength="4" minlength="4" autocomplete="off" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" min="1" value="{{$per_sacracomu->ecle_anio}}">
                        <label for="ecle_anio">Año</label>
                    </div>
                    <div class="input-field col s3">
                        <input type="text" id="ecle_tomo" name="ecle_tomo" class="validate" maxlength="10" value="{{$per_sacracomu->ecle_tomo}}">
                        <label for="ecle_tomo">Tomo</label>
                    </div>
                    <div class="input-field col s3">
                        <input type="text" id="ecle_pagina" name="ecle_pagina" class="validate" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="{{$per_sacracomu->ecle_pagina}}">
                        <label for="ecle_pagina">Página</label>
                    </div>
                    <div class="input-field col s3">
                        <input type="text" id="ecle_no" name="ecle_no" class="validate" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="{{$per_sacracomu->ecle_no}}">
                        <label for="ecle_no">Número</label>
                    </div>
                </div>
                <span class="card-title" style="color: #f06292; font-weight: normal;">Registro civil</span> 
                <li class="divider"></li>
                <div class="row">
                    <div class="input-field col s2">
                        <input type="text" id="civil_anio" name="civil_anio" class="validate" maxlength="4" minlength="4" autocomplete="off" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" min="1" value="{{$per_sacracomu->civil_anio}}">
                        <label for="civil_anio">Año</label>
                    </div>
                    <div class="input-field col s2">
                        <input type="text" id="civil_tomo" name="civil_tomo" class="validate" maxlength="10" value="{{$per_sacracomu->civil_tomo}}">
                        <label for="civil_tomo">Tomo</label>
                    </div>
                    <div class="input-field col s2">
                        <input type="text" id="civil_pagina" name="civil_pagina" class="validate" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="{{$per_sacracomu->civil_pagina}}">
                        <label for="ecle_pagina">Página</label>
                    </div>
                    <div class="input-field col s2">
                        <input type="text" id="civil_no" name="civil_no" class="validate" maxlength="10" value="{{$per_sacracomu->civil_no}}">
                        <label for="civil_no">Número de acta</label>
                    </div>
                    <div class="input-field col s4">
                        <input type="text" id="civil_parroquia" name="civil_parroquia" class="validate" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{$per_sacracomu->civil_parroquia}}">
                        <label for="civil_parroquia">Parroquia</label>
                    </div>
                </div>
                <span class="card-title" style="color: #f06292; font-weight: normal;">Nota Marginal</span> 
                <li class="divider"></li>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" id="nota" name="nota" class="validate" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{$per_sacracomu->nota}}">
                        <label for="nombres_m"> Nota marginal</label>
                    </div>
                </div> 
                <span class="card-title" style="color: #f06292; font-weight: normal;">Datos de padrinos</span> 
                <li class="divider"></li>
                <div class="row ">
                        <table class="" id="dynamic_field" >
                            <?php  $no=1; ?>
                            @foreach ($padrinos as $item)
                            @if($no == 1 )
                                <tr>
                                <td><input type="text" id="nombre_padrino" name="nombre_padrino[]" value="{{$item->nombre_padrino}}" placeholder="Nombres del padrino" class="form-control name_list" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
                                <td><input type="text" id="apellidos_padrino" name="apellidos_padrino[]" value="{{$item->apellidos_padrino}}" placeholder="Apellidos del padrino" class="form-control name_list" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
                                <td><a class=" btn-floating modal-trigger green btn-small tooltipped" name="addp" id="addp" data-position="top" data-tooltip="Agregar Padrino">
                                    <i class="material-icons">add</i>
                                </a></td>
                                </tr>  
                                <?php  $no++; ?>
                            @else
                              <tr id="row{{$no}}">
                                <td><input type="text" name="nombre_padrino[]" value="{{$item->nombre_padrino}}" placeholder="Nombres del testigo" class="form-control name_list" onkeyup="javascript:this.value=this.value.toUpperCase();" /></td>
                                <td><input type="text" name="apellidos_padrino[]" value="{{$item->apellidos_padrino}}" placeholder="Apellidos del testigo" class="form-control name_list" onkeyup="javascript:this.value=this.value.toUpperCase();" /></td>
                                <td><a type="button" name="remove" id="{{$no}}" class=" btn-floating modal-trigger red btn-small btn_removep "><i class="material-icons">clear</i></a></td>
                              </tr>
                             <?php  $no++; ?>
                            @endif
                            @endforeach
                            <input type="hidden" name="canti" id="canti" class="validate" value="{{$no=$no-1}}">
                        </table>
                </div> 
                @endforeach
                <li class="divider"></li>
                <div class="row">
                    <br>
                <div style="text-align:left " class="col s6">
                    <button class="btn blue" type="submit" name="action">Actualizar
                        <i class="material-icons left">done</i>
                    </button>
                </div>
                <div style="text-align:right " class="col s6">
                    <a href="{{ route('comuniones') }}" style="aling:right" class="waves-effect waves-light btn"><i class="material-icons left">arrow_back</i>Administrar Comuniones</a>
                </div>
                </div>
    
            </form>  
        </div>
      </div>
    </div>
  </div>
</div>
<br>
@endsection
@section('script')
<script type="text/javascript" src="{{ asset('js/logicaActualizarComunion.js') }}"></script>
@endsection
