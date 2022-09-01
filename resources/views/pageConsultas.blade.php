<!DOCTYPE html>
<html lang="en">
  <!--================================================================================
	Item Name: SEAZ - Desarrollador Web
	Version: 1.0
	Author: SEAZ Silvio Enrique Alcivar Zambrano
	Author URL: https://themeforest.net/user/pixinvent/portfolio
  ================================================================================ -->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
   
    <title>SA | Consultas</title>
    <!-- Favicons-->
    {{-- <link rel="icon" href="{{ url('images/favicon/favicon-32x32.png') }}" sizes="32x32"> --}}
    <link rel="icon" type="image/png" href="{{ asset('images/favicon/icosa2.png') }}">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="{{ asset('images/favicon/apple-touch-icon-152x152.png') }}">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="{{ asset('images/favicon/mstile-144x144.png') }}">
    <!-- For Windows Phone -->
    <!-- CORE CSS-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('csstables/datatables.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <link rel="stylesheet" href="{{ asset('css/vendor.css') }}">
      <link rel="stylesheet" href="{{ asset('css/app.css') }}">
     
      
      {{--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>  --}}
      
    
  </head>
<body>
<div class="container">
  <div id="loader-wrapper">
    <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
</div>
<header id="header" class="page-topbar">
  <div class="navbar-fixed">
    <nav class="navbar-color gradient-45deg-light-blue-cyan">
      <div class="nav-wrapper">
       
          <ul class="left">
            <li>
              <h1 class="logo-wrapper">
                <a href="{{ url('/') }}" class="brand-logo darken-1">
                  <img src="{{ asset('images/logo/3.png') }}" alt="materialize logo">  
                </a>
                <span class="logo-text hide-on-med-and-down">Parroquia San Agustín</span>   
              </h1>
            </li>
          </ul>
          <ul class="right hide-on-med-and-down">  
            
            <li>
              <a href="{{ url('/') }}" class="waves-effect waves-block waves-light" >
                <i class="material-icons">arrow_forward</i>
              </a>
            </li>
          </ul>
          <!-- translation-button -->
          <!-- profile-dropdown -->
          <ul id="profile-dropdown" class="dropdown-content">
            <li>
              <a href="{{ url('/') }}" class="grey-text text-darken-1">
                <i class="material-icons">home</i> Inicio </a>
            </li>
            <li class="divider"></li> 
          </ul>
        </div>
      
    </nav>
  </div>
</header>
<main>

    <div class="container">
        <div class="page-title">
          <h4>Consulta de sacramentos
            <i class="fa fa-book "></i>
          </h4>
        </div>
    </div>
    <div class="col s12 m" style="background-color:#F1BFFF; height:8px; border-radius:5px;"></div>
    <br> 
    <div class="container">
        <div class="col s12 m6 l3">
          <div class="ojo">
            <p><strong>Nota</strong>: Estimado usuario, le informamos que se ha habilitado este servicio para la consulta en línea de los SACRAMENTOS DE BAUTIZO, COMUNIÓN, CONFIRMACIÓN Y MATRIMONIO, realizados desde el año 1985 hasta la presente fecha. Para obtener 
            su certificado acérquese a la oficina central de la parroquia con el código que se muestra en la tabla de búsqueda.</p>
          </div>
        </div>
    </div>
    <br>
    <div class="container">
      <form id="buscar" class="col s12">
        {{ csrf_field() }}
        <div class="row ">
          <div class="input-field col s2">
            <select id="sacra" name="sacra" required class="validate" >
              <option value="" disabled selected>Seleccione un sacramento</option>
                <option value="BAUTIZO">BAUTIZO</option>
                <option value="COMUNIÓN">COMUNIÓN</option>
                <option value="CONFIRMACIÓN">CONFIRMACIÓN</option>
                <option value="MATRIMONIO">MATRIMONIO</option>
            </select> 
          </div>
          <div class="input-field col s4">
             <input type="text" name="nombres" id="nombres" class="validate" onkeyup="javascript:this.value=this.value.toUpperCase();">
              <label for="nombres" class="nom">Nombres</label>
          </div>
          <div class="input-field col s4">
              <input type="text" name="apellidos" id="apellidos" class="validate" onkeyup="javascript:this.value=this.value.toUpperCase();">
              <label for="apellidos" class="ape">Apellidos</label>
          </div>
          <div class=" col s2">
             <br>
             <button class="btn blue waves-effect" type="submit" name="action">Buscar
             <i class="material-icons left">search</i>
             </button>  
          </div>                
      </div>
      </form>  
  </div>  
        <br>
        <div class="container">
          <table id="table_consulta"  class="striped bordered centered display " style="font-size: 11px">
            <thead style="background-color:#F1BFFF;">
              <tr class="cambiar">
                <th>CÓDIGO</th>
                <th>NOMBRES Y APELLIDOS</th>
                <th>FECHA DE SACRAMENTO</th>
                <th>PADRE</th>
                <th>MADRE</th>     
              </tr>
            </thead>
            <tbody class="body">

            </tbody>
         </table>
        </div>    
         <br>
         <br>
         <br>
</main>
<footer class="page-footer gradient-45deg-light-blue-cyan" style="padding-left: 0px;">
        <div class="footer-copyright">
          <div class="container">
            <span>Copyright ©
              <script type="text/javascript">
                document.write(new Date().getFullYear());
              </script> <a class="grey-text text-lighten-2" target="_blank">San Agustín</a> todos los derechos reservados.</span>
            
          </div>
        </div>
</footer>
    <!-- END FOOTER -->
    <!-- ================================================
    Scripts
    ================================================ -->
    <!-- jQuery Library -->
    {{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  --}}
   
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/vendor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('/jstables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/logicaConsulta.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  </body>
</html>