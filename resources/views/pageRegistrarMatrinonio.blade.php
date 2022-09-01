@extends('layouts.app')
@section('htmlheader_title')
Matrimonio
@endsection
@section('content')
<div class="container">
  <div class="page-title">
    <h4>Registrar Matrimonio
      <i class="fa fa-user-plus"></i>
    </h4>
  </div>
  <div class="col s12 m2" style="background-color:#4caf50 ; height:8px; border-radius:5px;"></div>
  <br>
  <div class="row">
    <div class="col s12 m12">
      <div class="card">
        <div class="card-content">
            <form method="POST" id="dynamic_form_matriminio">
                <span class="card-title" style="color: #4caf50 ; font-weight: normal;">Datos del Novio</span> 
                <li class="divider"></li>
                {{ csrf_field() }}
                <div class="row ">
                    <div class="input-field col s6">
                        <input type="text" name="nombres_novio" id="nombres_novio" class="validate" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        <label for="nombres_novio">Nombres del novio</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" name="apellidos_novio" id="apellidos_novio" class="validate" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        <label for="apellidos_novio">Apellidos del novio</label>
                    </div>
                </div>
                <span class="card-title" style="color: #4caf50 ; font-weight: normal;">Datos de la Novia</span> 
                <li class="divider"></li>
                <div class="row ">
                    <div class="input-field col s6">
                        <input type="text" name="nombres_novia" id="nombres_novia" class="validate" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        <label for="nombres_novia">Nombres de la novia</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" name="apellidos_novia" id="apellidos_novia" class="validate" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        <label for="apellidos_novia">Apellidos de la novia</label>
                    </div>
                </div>
                <span class="card-title" style="color: #4caf50; font-weight: normal;">Fecha de Matrimonio</span> 
                <li class="divider"></li>
                <div class="row ">
                    <div class="input-field col s5">
                        <select id="mes_ma" name="mes_ma" required>
                          <option value="" disabled selected>Mes de Matrimonio</option>
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
                    <div class="input-field col s3">
                        <select id="dia_ma" name="dia_ma" required>
                            <option value="" disabled selected>Dia de Matrimonio</option>
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
                    <div class="input-field col s4">
                        <input type="text" id="anio_ma" name="anio_ma" class="validate" maxlength="4" minlength="4" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                        <label for="anio_ma">Año de Matrimonio</label>
                    </div>
                   
                </div>
                
                <span class="card-title" style="color: #4caf50; font-weight: normal;">Datos de los padres del novio</span> 
                <li class="divider"></li>
                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" id="nombres_p_novio" name="nombres_p_novio" class="validate" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        <label for="nombres_p_novio">Nombres del padre</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" id="apellidos_p_novio" name="apellidos_p_novio" class="validate" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        <label for="apellidos_p_novio">Apellidos del padre</label>
                    </div>
                </div> 
                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" id="nombres_m_novio" name="nombres_m_novio" class="validate" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        <label for="nombres_m_novio">Nombres de la madre</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" id="apellidos_m_novio" name="apellidos_m_novio" class="validate" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        <label for="apellidos_m_novio">Apellidos de la madre</label>
                    </div> 
                </div> 
                <span class="card-title" style="color: #4caf50; font-weight: normal;">Datos de los padres de la novia</span> 
                <li class="divider"></li>
                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" id="nombres_p_novia" name="nombres_p_novia" class="validate" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        <label for="nombres_p_novia">Nombres del padre</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" id="apellidos_p_novia" name="apellidos_p_novia" class="validate" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        <label for="apellidos_p_novia">Apellidos del padre</label>
                    </div>
                </div> 
                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" id="nombres_m_novia" name="nombres_m_novia" class="validate" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        <label for="nombres_m_novia">Nombres de la madre</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" id="apellidos_m_novia" name="apellidos_m_novia" class="validate" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        <label for="apellidos_m_novia">Apellidos de la madre</label>
                    </div> 
                </div> 
                <span class="card-title" style="color: #4caf50; font-weight: normal;">Registro eclesiástico</span> 
                <li class="divider"></li>
                <div class="row">
                    <div class="input-field col s3">
                        <input type="text" id="ecle_anio" name="ecle_anio" class="validate" maxlength="4" minlength="4" autocomplete="off" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" min="1">
                        <label for="ecle_anio">Año</label>
                    </div>
                    <div class="input-field col s3">
                        <input type="text" id="ecle_tomo" name="ecle_tomo" class="validate" maxlength="10">
                        <label for="ecle_tomo">Tomo</label>
                    </div>
                    <div class="input-field col s3">
                        <input type="text" id="ecle_pagina" name="ecle_pagina" class="validate" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                        <label for="ecle_pagina">Pagina</label>
                    </div>
                    <div class="input-field col s3">
                        <input type="text" id="ecle_no" name="ecle_no" class="validate" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                        <label for="ecle_no">Número</label>
                    </div>
                </div>
                <span class="card-title" style="color: #4caf50; font-weight: normal;">Registro civil</span> 
                <li class="divider"></li>
                <div class="row">
                    <div class="input-field col s2">
                        <input type="text" id="civil_anio" name="civil_anio" class="validate" maxlength="4" minlength="4" autocomplete="off" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" min="1">
                        <label for="civil_anio">Año</label>
                    </div>
                    <div class="input-field col s2">
                        <input type="text" id="civil_tomo" name="civil_tomo" class="validate" maxlength="10" >
                        <label for="civil_tomo">Tomo</label>
                    </div>
                    <div class="input-field col s2">
                        <input type="text" id="civil_pagina" name="civil_pagina" class="validate" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                        <label for="civil_pagina">Pagina</label>
                    </div>
                    <div class="input-field col s2">
                        <input type="text" id="civil_no" name="civil_no" class="validate" maxlength="10" >
                        <label for="civil_no">Número de acta</label>
                    </div>
                    <div class="input-field col s2">
                        <input type="text" id="civil_ciudad" name="civil_ciudad" class="validate" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        <label for="civil_ciudad">Parroquia</label>
                    </div>
                    <div class="input-field col s2">
                        <input type="text" id="civil_partida" name="civil_partida" class="validate" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        <label for="civil_partida">Partida</label>
                    </div>
                </div>
                <span class="card-title" style="color: #4caf50; font-weight: normal;">Testigos del Novio</span> 
                <li class="divider"></li>
                <div class="row ">
                        <table class="" id="dynamic_field1" >
                            <tr>
                            <td><input type="text" id="nombres_testigo1" name="nombres_testigo1[]" placeholder="Nombres del testigo" class="form-control name_list" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
                            <td><input type="text" id="apellidos_testigo1" name="apellidos_testigo1[]" placeholder="Apellidos del testigo" class="form-control name_list" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
                            <td><a class="create-modalg btn-floating modal-trigger green btn-small tooltipped" name="addp1" id="addp1" data-position="top" data-tooltip="Agregar testigo">
                                <i class="material-icons">add</i>
                              </a></td>
                            </tr>  
                        </table>
                </div> 
                <span class="card-title" style="color: #4caf50; font-weight: normal;">Testigos de la Novia</span> 
                <li class="divider"></li>
                <div class="row ">
                        <table class="" id="dynamic_field0" >
                            <tr>
                            <td><input type="text" id="nombres_testigo0" name="nombres_testigo0[]" placeholder="Nombres del testigo" class="form-control name_list" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
                            <td><input type="text" id="apellidos_testigo0" name="apellidos_testigo0[]" placeholder="Apellidos del testigp" class="form-control name_list" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
                            <td><a class="create-modalg btn-floating modal-trigger green btn-small tooltipped" name="addp0" id="addp0" data-position="top" data-tooltip="Agregar testigo">
                                <i class="material-icons">add</i>
                              </a></td>
                            </tr>  
                        </table>
                </div> 
                <li class="divider"></li>
                <div class="row">
                    <br>
                      <div style="text-align:left " class="col s6">
                        <button class="btn blue" type="submit" name="action">Registrar
                            <i class="material-icons left">done</i>
                        </button>
                      </div>
                      <div style="text-align:right " class="col s6">
                        <a href="{{ route('matrimonios') }}" style="aling:right" class="waves-effect waves-light green btn"><i class="material-icons left">arrow_back</i>Administrar Matrimonios</a>
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
<script type="text/javascript" src="{{ asset('js/logicaMatrimonio.js') }}"></script>
@endsection
