@extends('layouts.app')
@section('htmlheader_title')
	Grupos
@endsection

@section('content')

<div class="container">

  <div class="page-title">
    <h4>Grupos
      <i class="fa fa-users "></i>
    </h4>
  </div>
  <div class="col s12 m2" style="background-color:#F1BFFF; height:8px; border-radius:5px;">
  </div>
  <br>
  <div class="col s12 m7">
    <div class="card">
      <table class="striped bordered hoverable"  id="tableg" >
        <thead style="background-color:#F1BFFF">
          <tr>
            <th style="text-align: center;" width="250px">Nombre del grupo</th>
            <th style="text-align: center;">Descripción del grupo</th>
            <th class="text-center" style="text-align: center;" width="150px">
              <a href="#createg" class="hoverable waves-effect waves-light create-modalg btn-floating modal-trigger green btn-small tooltipped " data-position="top" data-tooltip="Agregar un grupo">
                <i class="material-icons">add</i>
              </a>
            </th>
          </tr>
        </thead>
        <tbody>
          {{ csrf_field() }}
    
          @foreach ($grupos as $key=>$value)
            <tr class="grupo{{$value->id}}">
    
              <td style="vertical-align: middle; text-align: center">{{ $value->nombre }}</td>
              <td style="vertical-align: middle; text-align: left">{{ $value->descripcion }}</td>
              <td style="vertical-align: middle; text-align: center; ">
                <a href="#showg" class="hoverable waves-effect waves-light show-modalg btn-floating modal-trigger light-blue btn-small tooltipped hoverable" data-id="{{$value->id}}" data-nombre="{{$value->nombre}}" data-descripcion="{{$value->descripcion}}" data-position="bottom" data-tooltip="Ver grupo">
                 <i class="material-icons">visibility</i>
                </a>
                <a href="#editarg" class="hoverable waves-effect waves-light edit-modalg btn-floating modal-trigger amber btn-small tooltipped " data-id="{{$value->id}}" data-nombre="{{$value->nombre}}" data-descripcion="{{$value->descripcion}}" data-position="bottom" data-tooltip="Editar grupo">
                 <i class="material-icons">edit</i>
                </a>
                <a href="#" class="hoverable waves-effect waves-light delete-modalg btn-floating red btn-small tooltipped " data-id="{{$value->id}}" data-nombre="{{$value->nombre}}" data-descripcion="{{$value->descripcion}}" data-position="bottom" data-tooltip="Eliminar grupo">
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
<div id="showg" class="modal modal-fixed-footer">
		<div class="modal-content">
		  <div class="modal-header">
		    <h4 class="modal-title">Ver Grupo <i class="material-icons" >visibility</i></h4>
      </div>
      <li class="divider"></li>
		  <div class="modal-body">
          <p>Nombre del grupo: <b id="nomb"></b></p>     
          <p>Descripción del grupo: <b id="descrip"></b></p>    
        </div>    
    </div>
    <div class="modal-footer">
      <a class=" btn red modal-close hoverable waves-effect waves-light"><i class="material-icons left" >close</i>Cerrar</a>
    </div>
</div>

{{-- Modal para insert --}}
<div id="createg" class="modal modal-fixed-footer" >
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Nuevo Grupo<i class="material-icons" >group_add</i></h4>
    </div>
    <li class="divider"></li>
    <div class="modal-body">
      <form class="form-horizontal" role="form">
       <div class="row add">
         <div class="input-field col s12">
           <input type="text" name="nombre" id="nombre" class="validate">
           <label for="nombre">Nombre del grupo</label>
           <p class="error text-center alert alert-danger hidden"></p>
         </div>
       </div>
       <div class="row">
         <div class="input-field col s12">
           <textarea class="materialize-textarea" name="descripcion" id="descripcion" ></textarea>
           <label for="descripcion">Ingrese una descripción</label>
           <p class="error text-center alert alert-danger hidden"></p>
         </div>
       </div>
      </form>
    </div>  
  </div>
  <div class="modal-footer">
    <a class=" btn green hoverable waves-effect waves-light" type="submit" id="addg"><i class="material-icons left" >add</i>Agregar</a>
    </button>
    <a class=" btn red modal-close hoverable waves-effect waves-light"><i class="material-icons left" >close</i>Cerrar</a>
    </button>
  </div>
</div>


{{-- Modal para editar --}}
<div id="editarg" class="modal modal-fixed-footer" >
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Editar Grupo<i class="material-icons" >edit</i></h4>
    </div>
    <li class="divider"></li>
    <div class="modal-body">
      <form class="form-horizontal" role="form">
       <div class="row ">
         <div class="input-field col s12">
           <input type="hidden" name="nombre" id="fid" class="validate">
         </div>
       </div>
       <div class="row ">
        <div class="input-field ac col s12">
          <input type="text" name="n" id="n" class="validate">
          <label class="active" for="n">Nombre del grupo</label>
        </div>
      </div>
       <div class="row">
         <div class="input-field ac col s12">
           <textarea class="materialize-textarea" name="d" id="d" ></textarea>
           <label class="active" for="d">Descripción de grupo</label>
           <p class="error text-center alert alert-danger hidden"></p>
         </div>
       </div>
      </form>
    </div>
  </div>
  <div class="modal-footer">
    <a class=" btn green hoverable waves-effect waves-light" type="submit" id="editg"><i class="material-icons left" >edit</i>Actualizar</a>
    </button>
    <a class=" btn red modal-close hoverable waves-effect waves-light"><i class="material-icons left" >close</i>Cerrar</a>
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
<script type="text/javascript" src="{{ asset('js/logicagrupos.js') }}"></script>
@endsection
@endsection
