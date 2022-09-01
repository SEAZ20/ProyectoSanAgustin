@extends('layouts.app')
@section('htmlheader_title')
 Información
@endsection
@section('content')

<div class="container">
    <div class="page-title">
        <h4>Información
        <i class="fa fa-info-circle "></i>
        </h4>
      </div>
      <div class="col s12 m2" style="background-color:#F1BFFF; height:8px; border-radius:5px;">
      </div>
      <div id="work-collections">
        
        <div class="row">
          <div class="col s12 m12">
            <ul id="projects-collection" class="collection z-depth-1">
                <li class="collection-item avatar">
                    <div class="row">
                      <div class="col s9">
                        <i class="material-icons blue circle">place</i>
                        <h6 class="collection-header m-0">Dirección oficina central</h6>
                        <p id="dire">{{$info->direccion}}</p>
                      </div>
                     
                      <div class="col s3">
                        <a href="#actuinf" class="actu_info modal-trigger btn blue datos" data-id="{{$info->id}}" data-direccion="{{$info->direccion}}" data-horario="{{$info->horario}}" data-urlfacebook="{{$info->urlfacebook}}" data-urltwitter="{{$info->urltwitter}}" data-urlinstagram="{{$info->urlinstagram}}" data-email="{{$info->email}}"><i class="material-icons left" >edit</i>Actulizar</a>
                      </div>
                    </div>
                  </li>
              <li class="collection-item avatar">
                <i class="material-icons cyan circle">access_time</i>
                <h6 class="collection-header m-0">Horario de atención</h6>
                <p id="hor">{{$info->horario}}</p>
              </li>
              <li class="collection-item avatar">
                <i class="fa fa-facebook circle blue darken-4"></i>
                <h6 class="collection-header m-0">Pagina de facebook (URL)</h6>
                <p id="urlf">{{$info->urlfacebook}}</p>
              </li>
              <li class="collection-item avatar">
                <i class="fa fa-instagram circle deep-orange lighten-1"></i>
                <h6 class="collection-header m-0">Instragram (URL)</h6>
                <p id="urlt">{{$info->urlinstagram}}</p>
              </li>
              <li class="collection-item avatar">
                <i class="fa fa-twitter circle blue"></i>
                <h6 class="collection-header m-0">Twitter (URL)</h6>
                <p id="urli">{{$info->urltwitter}}</p>
              </li>
              <li class="collection-item avatar">
                <i class="fa fa-envelope circle blue"></i>
                <h6 class="collection-header m-0">Email (correo electronico)</h6>
                <p id="ema">{{$info->email}}</p>
              </li>
            </ul>  
          </div>
          
        </div>
        
    </div>

    <div id="actuinf" class="modal modal-fixed-footer">
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
                        <label class="active" for="uf">Página de facebook (URL)</label>
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
                <div class="row ">
                  <div class="input-field actu col s12">
                      <i class="fa fa-envelope prefix" ></i>
                      <input type="email" name="em" id="em" class="validate">
                      <label class="active" for="ui">Email (correo electronico)</label>
                  </div>
              </div>
            </div>
        </form>
            
          </div>
          <div class="modal-footer">
            <a class=" btn green" type="submit" id="acinfo"><i class="material-icons left" >edit</i>Guardar cambios</a>
        </button>
        <a class=" btn red modal-close"><i class="material-icons left" >close</i>Cerrar</a>
        </button>
        </div>
      </div>
</div>
@section('script')
<script type="text/javascript" src="{{ asset('js/logicainfo.js') }}"></script>
@endsection
@endsection
