@extends('layouts.app')
@section('htmlheader_title')
Agregar Información
@endsection
@section('content')
<div class="container">
    <div class="page-title">
        <h4> Agregar Información
        <i class="fa fa-info-circle "></i>
        </h4>
    </div>
    <div class="col s12 m2" style="background-color:#F1BFFF; height:8px; border-radius:5px;"></div>
    <div class="row">
        <div class="col s12 m12">
          <div class="card">
            <div class="card-content">
                <form id="guardarinfo" action="{{ url('addInfo') }}" method="POST">
                    
                    {{ csrf_field() }}
                    <div class="row ">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">place</i>
                            <input type="text" name="direccion" id="direccion" class="validate">
                            <label for="dir">Dirección oficina central</label>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">access_time</i>
                            <input type="text" name="horario" id="horario" class="validate">
                            <label for="h">Horario de atención</label>
                        </div>
                    </div>
                   
                    <div class="row ">
                        <div class="input-field col s12">
                            <i class="fa fa-facebook prefix" ></i>
                            <input type="text" name="urlfacebook" id="urlfacebook" class="validate">
                            <label for="uf">Página de facebook (URL)</label>
                        </div>
                    </div>
    
                    <div class="row ">
                        <div class="input-field col s12">
                            <i class="fa fa-instagram prefix" ></i>
                            <input type="text" name="urlinstagram" id="urlinstagram" class="validate">
                            <label for="ui">Instragram (URL)</label>
                        </div>
                    </div>
    
                    <div class="row ">
                        <div class="input-field col s12">
                            <i class="fa fa-twitter prefix" ></i>
                            <input type="text" name="urltwitter" id="urltwitter" class="validate">
                            <label for="ui">Twitter (URL)</label>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="input-field col s12">
                            <i class="fa fa-envelope prefix" ></i>
                            <input type="email" name="email" id="email" class="validate">
                            <label for="ui">Email (correo electronico)</label>
                        </div>
                    </div>
            </div>
                    <div class="card-action">  
                        <button class="btn waves-effect waves-light blue" type="submit" name="action" id="addinfo">Guardar
                            <i class="material-icons right">save</i>
                          </button>   
                        
                    </div>
                </form>
                
            </div>
           
          </div>
        </div>
    </div>

    {{--  <div id="actuinf" class="modal ">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Actualizar Información <i class="fa fa-info-circle "></i></h4>
            </div>
            <li class="divider"></li>
            <div class="modal-body">
            <form class="form-horizontal" role="modal">
                {{ csrf_field() }}
                <div class="row ">
                    <div class="input-field col s12">
                        <input type="hidden" name="id_i" id="id_i" class="validate">
                    </div>
                </div>
                <div class="row ">
                    <div class="input-field actu col s12">
                        <i class="material-icons prefix">place</i>
                        <input type="text" name="dir" id="dir" class="validate">
                        <label class="active" for="dir">Dirección oficina central</label>
                    </div>
                </div>
                <div class="row ">
                    <div class="input-field actu col s12">
                        <i class="material-icons prefix">access_time</i>
                        <input type="text" name="h" id="h" class="validate">
                        <label class="active" for="h">Horario de atención</label>
                    </div>
                </div>
               
                <div class="row ">
                    <div class="input-field actu col s12">
                        <i class="fa fa-facebook prefix" ></i>
                        <input type="text" name="uf" id="uf" class="validate">
                        <label class="active" for="uf">Pagina de facebook (URL)</label>
                    </div>
                </div>

                <div class="row ">
                    <div class="input-field actu col s12">
                        <i class="fa fa-instagram prefix" ></i>
                        <input type="text" name="ui" id="ui" class="validate">
                        <label class="active" for="ui">Instragram (URL)</label>
                    </div>
                </div>

                <div class="row ">
                    <div class="input-field actu col s12">
                        <i class="fa fa-twitter prefix" ></i>
                        <input type="text" name="ut" id="ut" class="validate">
                        <label class="active" for="ui">Twitter (URL)</label>
                    </div>
                </div>
                </div>
            </form>
            <div class="modal-footer">
                <a class=" btn green" type="submit" id="acinfo"><i class="material-icons left" >edit</i>Guardar cambios</a>
            </button>
            <a class=" btn red modal-close"><i class="material-icons left" >close</i>Cerrar</a>
            </button>
            </div>
          </div>
      </div>  --}}

</div>
@section('script')
<script type="text/javascript" src="{{ asset('js/logicainfo.js') }}"></script>
@endsection
@endsection
