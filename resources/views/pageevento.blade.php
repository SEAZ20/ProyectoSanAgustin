@extends('layouts.app')
@section('htmlheader_title')
	Eventos
@endsection
@section('content')

<div class="container">

  <div class="page-title">
    <h4>Eventos
        <i class="fa fa-calendar "></i>
    </h4>
  </div>
  <div class="col s12 m2" style="background-color:#F1BFFF; height:8px; border-radius:5px;">
  </div>
  <br>
  <div class="col s12 m7">
    <div class="card">
      <table class="striped bordered"  id="table_e" >
        <thead style="background-color:#F1BFFF">
          <tr>
            <th style="text-align: center;" width="250px">Nombre del evento</th>
            <th style="text-align: center;" width="150px">Fecha del evento</th>
            <th style="text-align: center;">Descripción del evento</th>
            <th class="text-center" style="text-align: center;" width="150px">
              <a href="#create_e" class="hoverable waves-effect waves-light create-modalg_e btn-floating modal-trigger green btn-small tooltipped" data-position="top" data-tooltip="Agregar un evento">
                <i class="material-icons">add</i>
              </a>
            </th>
          </tr>
        </thead>
        <tbody>
          {{ csrf_field() }}
    
          @foreach ($eventos as $key=>$value)
            <tr class="evento{{$value->id}}">
    
              <td style="vertical-align: middle; text-align: center">{{ $value->nombre_e }}</td>
              <td style="vertical-align: middle; text-align: center">{{ $value->fecha }}</td>
              <td style="vertical-align: middle; text-align: left">{{ $value->descripcion_e }}</td>
              <td style="vertical-align: middle; text-align: center; ">
                <a href="#show_e" class="hoverable waves-effect waves-light show-modal_e btn-floating modal-trigger light-blue btn-small tooltipped" data-id="{{$value->id}}" data-nombre_e="{{$value->nombre_e}}" data-fecha="{{$value->fecha}}" data-descripcion_e="{{$value->descripcion_e}}" data-position="bottom" data-tooltip="Ver evento">
                 <i class="material-icons">visibility</i>
                </a>
                <a href="#editar_e" class="hoverable waves-effect waves-light edit-modal_e btn-floating modal-trigger amber btn-small tooltipped" data-id="{{$value->id}}" data-nombre_e="{{$value->nombre_e}}" data-fecha="{{$value->fecha}}" data-descripcion_e="{{$value->descripcion_e}}" data-position="bottom" data-tooltip="Editar evento">
                 <i class="material-icons">edit</i>
                </a>
                <a href="#" class="hoverable waves-effect waves-light delete-modal_e btn-floating red btn-small tooltipped" data-id="{{$value->id}}" data-nombre_e="{{$value->nombre_e}}" data-fecha="{{$value->fecha}}" data-descripcion_e="{{$value->descripcion_e}}" data-position="bottom" data-tooltip="Eliminar evento">
                 <i class="material-icons">delete</i>
                </a>
              </td>
            </tr>
          @endforeach
    
        </tbody>
    
     </table>
    </div>
  </div>
 


{{-- Modal Form Show POST --}}
<div id="show_e" class="modal modal-fixed-footer">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Ver Evento <i class="material-icons" >visibility</i></h4>
        </div>
        <li class="divider"></li>
        <div class="modal-body">
          <p>Nombre del evento: <b id="nomb_e"></b></p>
          <p>Fecha del evento: <b id="fech"></b></p>
          <p>Fecha del evento: <b id="descrip_e"></b></p>
        </div>    
    </div>
    <div class="modal-footer">
      <a class="hoverable waves-effect waves-light btn red modal-close"><i class="material-icons left" >close</i>Cerrar</a>
  </div>
</div>

{{-- Modal para insert --}}
<div id="create_e" class="modal modal-fixed-footer">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Nuevo Evento<i class="material-icons" >event_note</i></h4>

    </div>
    <li class="divider"></li>
    <div class="modal-body">
      <form class="form-horizontal" role="form">
       <div class="row add">
         <div class="input-field col s12">
           <input type="text" name="nombre_e" id="nombre_e" class="validate">
           <label for="nombre">Nombre del evento</label>
          
         </div>
       </div>
       <div class="row ">
        <div class="input-field act col s12">
          <input type="date" name="fecha" id="fecha" class="validate">
          <label class="active" for="f_e">Fecha del evento</label>
        </div>
        
      </div>
       <div class="row">
         <div class="input-field col s12">
           <textarea class="materialize-textarea" name="descripcion_e" id="descripcion_e" ></textarea>
           <label for="descripcion_e">Ingrese una descripción</label>
           <p class="error text-center alert alert-danger hidden"></p>
         </div>
       </div>
      </form>
    </div>
        
  </div>
  <div class="modal-footer">
    <a class="hoverable waves-effect waves-light btn green" type="submit" id="add_e"><i class="material-icons left" >add</i>Agregar</a>
    </button>
    <a class="hoverable waves-effect waves-light btn red modal-close"><i class="material-icons left" >close</i>Cerrar</a>
    </button>
  </div>
</div>

{{-- Modal para editar --}}
<div id="editar_e" class="modal modal-fixed-footer">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Editar Evento<i class="material-icons" >edit</i></h4>
    </div>
    <li class="divider"></li>
    <div class="modal-body">
      <form class="form-horizontal" role="form">
       <div class="row ">
         <div class="input-field col s12">
           <input type="hidden" name="id_e" id="id_e" class="validate">
         </div>
      </div>
      <div class="row ">
        <div class="input-field act col s12">
          <input type="text" name="n_e" id="n_e" class="validate">
          <label class="active" for="n_e">Nombre del evento</label>

        </div>
       </div>
      <div class="row ">
        <div class="input-field act col s12">
          <input type="date" name="f_e" id="f_e" class="validate">
          <label class="active" for="f_e">Fecha del evento</label>
        </div>
      </div>
       <div class="row">
         <div class="input-field act col s12">
           <textarea class="materialize-textarea" name="d_e" id="d_e"></textarea>
           <label class="active" for="d_e">Descripción de grupo</label>
         </div>
       </div>
      </form>
    </div>
   
  </div>
  <div class="modal-footer">
    <a class="hoverable waves-effect waves-light btn green" type="submit" id="edit_e"><i class="material-icons left" >edit</i>Actualizar</a>
    </button>
    <a class="hoverable waves-effect waves-light btn red modal-close"><i class="material-icons left" >close</i>Cerrar</a>
    </button>
  </div>
</div>

{{--  <div id="elimg" class="modal">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Eliminar Grupo<i class="material-icons" >delete</i></h4>
    </div>
    <li class="divider"></li>
    <div class="modal-body">
      <h6>¿Estas seguro de eliminar el grupo <span class="nom"></span>?</h6>
      <br>
      <input type="hidden" id="idel"></input>
    </div>
    <div class="modal-footer">
      <a class=" btn green" type="submit" id="elimarg"><i class="material-icons left" >delete</i>Si, eliminar este grupo!</a>
      </button>
      <a class=" btn red modal-close"><i class="material-icons left" >close</i>Cancelar</a>
    </div>
  </div>

</div>  --}}

</div>

<br>
@section('script')
<script type="text/javascript" src="{{ asset('js/logicaevento.js') }}"></script>
@endsection
@endsection
