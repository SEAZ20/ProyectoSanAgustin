@extends('layouts.app')
@section('htmlheader_title')
 Ingresar Bautizo
@endsection
@section('content')
<div class="container">
  <div class="page-title">
    <h4>Registrar Bautizo
      <i class="fa fa-user-plus"></i>
    </h4>
  </div>
  <div class="col s12 m2" style="background-color:#7E418F; height:8px; border-radius:5px;"></div>
  <br>
  <div class="row">
    <div class="col s12 m12">
      <div class="card">
        <div class="card-content">
            <form method="POST" id="dynamic_form">
                <span class="card-title" style="color: #7E418F; font-weight: normal;">Datos Personales</span> 
                <li class="divider"></li>
                {{ csrf_field() }}
                <div class="row ">
                    <div class="input-field col s6">
                        <input type="text" name="nombres" id="nombres" class="validate" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        <label for="nombres">Nombres</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" name="apellidos" id="apellidos" class="validate" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        <label for="apellidos">Apellidos</label>
                    </div>
                </div>
                <span class="card-title" style="color: #7E418F; font-weight: normal;">Fecha de nacimiento</span> 
                <div class="row ">
                    <div class="input-field col s3">
                        <select id="mes_nac" name="mes_nac" required class="validate" >
                          <option value=""  required disabled selected>Mes de nacimiento</option>
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
                    </div>
                    <div class="input-field col s2">
                        <select id="dia_nac" name="dia_nac"  required>
                            <option value="" disabled selected>D??a de nacimiento</option>
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
                    </div>
                    <div class="input-field col s2">
                        <input type="text" id="anio_nac" name="anio_nac" class="validate"  maxlength="4" minlength="4" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                        <label for="anio_nac">A??o de nacimiento</label>
                    </div>
                    <div class="input-field col s5">
                        <input type="text" id="ciudad_nac" name="ciudad_nac" class="validate" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        <label for="ciudad_nac">Ciudad de nacimiento</label>
                    </div>
                </div>
                <span class="card-title" style="color: #7E418F; font-weight: normal;">Fecha de Bautizo</span> 
                <li class="divider"></li>
                <div class="row ">
                    <div class="input-field col s3">
                        <select id="mes_sa" name="mes_sa" required>
                          <option value="" disabled selected>Mes de bautizo</option>
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
                    </div>
                    <div class="input-field col s2">
                        <select id="dia_sa" name="dia_sa" required>
                            <option value="" disabled selected>D??a de bautizo</option>
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
                    </div>
                    <div class="input-field col s2">
                        <input type="text" id="anio_sa" name="anio_sa" class="validate" maxlength="4" minlength="4" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                        <label for="anio_sa">A??o de bautizo</label>
                    </div>
                    <div class="input-field col s5">
                        <input type="text" id="parroco" name="parroco" class="validate" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        <label for="parroco">P??rroco</label>
                    </div>
                </div>
                <span class="card-title" style="color: #7E418F; font-weight: normal;">Datos de los padres</span> 
                <li class="divider"></li>
                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" id="nombres_p" name="nombres_p" class="validate" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        <label for="nombres_p">Nombres del padre</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" id="apellidos_p" name="apellidos_p" class="validate" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        <label for="apellidos_p">Apellidos del padre</label>
                    </div>
                </div> 
                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" id="nombres_m" name="nombres_m" class="validate" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        <label for="nombres_m">Nombres de la madre</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" id="apellidos_m" name="apellidos_m" class="validate" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        <label for="apellidos_m">Apellidos de la madre</label>
                    </div> 
                </div> 
                <span class="card-title" style="color: #7E418F; font-weight: normal;">Registro eclesi??stico</span> 
                <li class="divider"></li>
                <div class="row">
                    <div class="input-field col s3">
                        <input type="text" id="ecle_anio" name="ecle_anio" class="validate" maxlength="4" minlength="4" autocomplete="off" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" min="1">
                        <label for="ecle_anio">A??o</label>
                    </div>
                    <div class="input-field col s3">
                        <input type="text" id="ecle_tomo" name="ecle_tomo" class="validate" maxlength="10">
                        <label for="ecle_tomo">Tomo</label>
                    </div>
                    <div class="input-field col s3">
                        <input type="text" id="ecle_pagina" name="ecle_pagina" class="validate" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                        <label for="ecle_pagina">P??gina</label>
                    </div>
                    <div class="input-field col s3">
                        <input type="text" id="ecle_no" name="ecle_no" class="validate" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                        <label for="ecle_no">N??mero</label>
                    </div>
                </div>
                <span class="card-title" style="color: #7E418F; font-weight: normal;">Registro civil</span> 
                <li class="divider"></li>
                <div class="row">
                    <div class="input-field col s2">
                        <input type="text" id="civil_anio" name="civil_anio" class="validate" maxlength="4" minlength="4" autocomplete="off" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" min="1">
                        <label for="civil_anio">A??o</label>
                    </div>
                    <div class="input-field col s2">
                        <input type="text" id="civil_tomo" name="civil_tomo" class="validate" maxlength="10" >
                        <label for="civil_tomo">Tomo</label>
                    </div>
                    <div class="input-field col s2">
                        <input type="text" id="civil_pagina" name="civil_pagina" class="validate" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                        <label for="ecle_pagina">P??gina</label>
                    </div>
                    <div class="input-field col s2">
                        <input type="text" id="civil_no" name="civil_no" class="validate" maxlength="10" >
                        <label for="civil_no">N??mero de acta</label>
                    </div>
                    <div class="input-field col s4">
                        <input type="text" id="civil_parroquia" name="civil_parroquia" class="validate" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        <label for="civil_parroquia">Parroquia</label>
                    </div>
                </div>
                <span class="card-title" style="color: #7E418F; font-weight: normal;">Nota Marginal</span> 
                <li class="divider"></li>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" id="nota" name="nota" class="validate" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        <label for="nombres_m">Ingrese nota marginal</label>
                    </div>
                </div> 
                <span class="card-title" style="color: #7E418F; font-weight: normal;">Datos de padrinos</span> 
                <li class="divider"></li>
                <div class="row ">
                        <table class="" id="dynamic_field" >
                            <tr>
                            <td><input type="text" id="nombre_padrino" name="nombre_padrino[]" placeholder="Nombres del padrino" class="form-control name_list" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
                            <td><input type="text" id="apellidos_padrino" name="apellidos_padrino[]" placeholder="Apellidos del padrino" class="form-control name_list" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
                            <td><a class="create-modalg btn-floating modal-trigger green btn-small tooltipped" name="addp" id="addp" data-position="top" data-tooltip="Agregar Padrino">
                                <i class="material-icons">add</i>
                              </a></td>
                            </tr>  
                        </table>
                </div> 
                <li class="divider"></li>
                <div class="row">
                    <br>
                      <div style="text-align:left " class="col s6">
                        <button class="btn blue waves-effect" type="submit" name="action">Registrar
                            <i class="material-icons left">done</i>
                        </button>
                        <div id="progre"></div>
                        
                      </div>
                      <div style="text-align:right " class="col s6">
                        <a href="{{ route('bautizos') }}" style="aling:right" class="waves-effect purple waves-light btn"><i class="material-icons left">arrow_back</i>Administrar Bautizos</a>
                      </div>
                  </div>
                <br>
            </form>  
        </div>
      </div>
    </div>
  </div>
</div>
<br>
@section('script')
<script type="text/javascript" src="{{ asset('js/LogicaBautizo.js') }}"></script>
@endsection
@endsection