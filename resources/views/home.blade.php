@extends('layouts.app')
@section('htmlheader_title')
	Principal
@endsection
@section('content')
<div id="loader-wrapper">
  <div id="loader"></div>
  <div class="loader-section section-left"></div>
  <div class="loader-section section-right"></div>
</div>
<div class="container">
  <div class="page-title">
    <h4>Principal
      <i class="material-icons">turned_in</i>
    </h4>
  </div>
  <div class="col s12 m2" style="background-color:#F1BFFF; height:8px; border-radius:5px;">
  
  </div>
  <div class="container-fluid spark-screen " align="center" vertical-align="middle" >
    <div id="card-stats">
      <div class="row mt-1">
        <div class="col s12 m6 l3 ">
          <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text ">
            <div class="padding-4 ">
              <div class="col s7 m7">
                <a href="{{ route('bautizos') }}" style="color:#ffff;" class="tooltipped" data-position="top" data-tooltip="Ir a Bautizos"><i class="material-icons background-round mt-5">group</i></a>
                <a href="{{ route('bautizos') }}" style="color:#ffff;" class="tooltipped" data-position="botton" data-tooltip="Ir a Bautizos"><p>Bautizo</p></a>      
              </div>
              <div class="col s5 m5 right-align">
                <h5 class="mb-0">Total</h5>
                <p class="no-margin">Registros</p>
                <p>{{$totalbautizos}}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col s12 m6 l3 ">
          <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text">
            <div class="padding-4">
              <div class="col s7 m7">
                <a href="{{ route('comuniones') }}" style="color:#ffff;" class="tooltipped" data-position="top" data-tooltip="Ir a Comuniones"><i class="material-icons background-round mt-5">group</i></a>
                <a href="{{ route('comuniones') }}" style="color:#ffff;" class="tooltipped" data-position="botton" data-tooltip="Ir a Comuniones"><p>Comunión</p></a>
              </div>
              <div class="col s5 m5 right-align">
                <h5 class="mb-0">Total</h5>
                <p class="no-margin">Registros</p>
                <p>{{$totalcomunion}}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col s12 m6 l3">
          <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text">
            <div class="padding-4">
              <div class="col s7 m7">
               <a href="{{ route('confirmas') }}" style="color:#ffff;" class="tooltipped" data-position="top" data-tooltip="Ir a Confirmaciones"><i class="material-icons  background-round mt-5">group</i></a> 
                <a href="{{ route('confirmas') }}" style="color:#ffff;" class="tooltipped" data-position="bottom" data-tooltip="Ir a Confirmaciones"><p>Confirmación</p></a>
              </div>
              <div class="col s5 m5 right-align">
                <h5 class="mb-0">Total</h5>
                <p class="no-margin">Registros</p>
                <p>{{$totalconfirmas}}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col s12 m6 l3">
          <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text">
            <div class="padding-4">
              <div class="col s7 m7">
                <a href="{{ route('matrimonios') }}" style="color:#ffff;" class="tooltipped" data-position="top" data-tooltip="Ir a Matrimonios"><i class="material-icons background-round mt-5">group</i></a>
                <a href="{{ route('matrimonios') }}" style="color:#ffff;" class="tooltipped" data-position="botton" data-tooltip="Ir a Matrimonios"><p>Matrimonio</p></a>
              </div>
              <div class="col s5 m5 right-align">
                 <h5 class="mb-0">Total</h5>
                <p class="no-margin">Registros</p>
                <p>{{$totalmatrimonios}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <img class="col s12 m3" src="{{ asset('/img/imghome.png') }}" width="45%" height: auto;>
    
	</div>
</div>
@section('footer')
<footer class="page-footer gradient-45deg-light-blue-cyan">
  <div class="footer-copyright" style="text-aling:center">
    <div class="container">
      <span>Copyright ©
        <script type="text/javascript">
          document.write(new Date().getFullYear());
        </script> <a class="grey-text text-lighten-2" target="_blank">San Agustín</a> todos los derechos reservados.</span>
      
    </div>
  </div>
</footer>
@endsection
@endsection
