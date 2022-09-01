<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
            <title>
               Parroquia San Agustín
            </title>
            <meta content="" name="keywords">
                <meta content="" name="description">
                    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
                        <meta content="" property="og:title">
                            <meta content="website" property="og:type">
                                <meta content="" property="og:url">
                                    <meta content="" property="og:site_name">
                                        <meta content="" property="og:description">
                                            <!-- Styles -->
                                            <link rel="icon" type="image/png" href="{{ asset('images/favicon/icosa2.png') }}">
                                            <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
                                            <link href="{{ asset('/cssh/font-awesome.min.css') }}" rel="stylesheet">
                                                <link href="{{ asset('/cssh/animate.css') }}" rel="stylesheet">
                                                    <link href="http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900|Montserrat:400,700" rel="stylesheet" type="text/css">
                                                    <link href="{{ asset('/cssh/bootstrap.min.css') }}" rel="stylesheet">
                                                        <link href="{{ asset('/cssh/main.css') }}" rel="stylesheet">
                                                            <script src="{{ asset('/jsh/modernizr-2.7.1.js') }}">
                                                            </script>
                                                        </link>
                                                    </link>
                                                </link>
                                            </link>
                                        </meta>
                                    </meta>
                                </meta>
                            </meta>
                        </meta>
                    </meta>
                </meta>
            </meta>
        </meta>
    </head>
</html>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="aleft">   
                <a class="logo " href="{{ url('/') }}">
                    <img alt="" src="{{ asset('images/logo/3.png') }}" />
                    <span class="logo-text" >Parroquia San Agustín</span>
                </a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="" href="{{ url('consultas') }}" style=" margin-top: 15px">
                            Consultas
                        </a>
                    </li>
                     @if (Auth::guest())
                       <li>
                        <a href="{{ url('/login') }}" style=" margin-top: 15px">
                            Iniciar sesión
                        </a>
                    </li>
                    @else
                        <li><a href="/home" style=" margin-top: 15px">{{ Auth::user()->name }}</a></li>
                    @endif

                </ul>
            </div>
            <!--/.navbar-collapse -->
        </div>
    </div>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <a class="logo " href="{{ url('/') }}">
                        <img alt="" src="{{ asset('images/logo/3blanco.png') }}" />
                        <span class="logo-text hide-on-med-and-down">Parroquia San Agustín</span>
                    </a>
                </div>
                <div class="col-xs-6 text-right navbar-nav navbar-right" style=" margin-top: 28px" >
                        <a href="{{ url('consultas') }}" style=" margin-top: 15px">
                            Consultas
                        </a>

                     @if (Auth::guest())

                        <a href="{{ route('login') }}" style=" margin-top: 15px">
                            &nbsp;&nbsp;&nbsp;Iniciar sesión
                        </a>

                    @else
                        <a href="/home" style=" margin-top: 15px">&nbsp;&nbsp;&nbsp;{{ Auth::user()->name }}</a>
                    @endif
                </div>
            </div>
            <div class="row header-info">
                <div class="col-sm-10 col-sm-offset-1 text-center">
                    {{-- <h1 class="wow fadeIn">
                        Parroquia San Agustín de Calceta
                    </h1> --}}
                    <br/>
                    <p class="lead wow fadeIn" data-wow-delay="0.5s">
                        Con el amor al prójimo, el pobre es rico; sin el amor al prójimo, el rico es pobre. 
                        <br>
                        “San Agustín”
                        </br>
                    </p>
                    <br/>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                            <div class="row">
                                <div class="col-xs-6 text-right wow fadeInUp" data-wow-delay="1s">
                                    <a class="btn btn-secondary btn-lg scroll" href="#main-info">
                                        Leer Mas
                                    </a>
                                </div>
                                <div class="col-xs-6 text-left wow fadeInUp" data-wow-delay="1.4s">
                                    <a class="btn btn-primary btn-lg scroll" href="#pricing">
                                        Ver Eventos
                                    </a>
                                </div>
                            </div>
                            <!--End Button Row-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="mouse-icon hidden-xs">
        <div class="scroll"></div>
    </div>

    <section class="pad-xl" id="main-info">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text-center  wow fadeIn" data-wow-delay="0.6s">
                    <h2 style="color: #9826AC; font-size: 35px;">
                        GRUPOS Y MOVIMIENTOS APOSTÓLICOS
                    </h2>
                    <p class="lead" style="color: #9826AC">
                        Información sobre los grupos y movimientos apostólicos
                    </p>
                </div>
            </div>
            <!-- <div class="iphone wow fadeInUp" data-wow-delay="1s">
                <img src="{{ asset('/img2/2.PNG)') }}">
                </img>
            </div> -->
        </div>
        <div class="container">
            @foreach($grupos as $gru)
            <div class="row">
                <div class="col-sm-12 wow fadeIn" data-wow-delay="0.4s">
                    <hr class="line yellow">
                        <h3>
                         {{$gru->nombre}}
                        </h3>
                        <p style="color: #432D47">
                            {{$gru->descripcion}}
                        </p>
                    </hr>
                </div>   
            </div>
            @endforeach
        </div>
    </section>
    <!--Pricing-->
    <section class="pad-lg" id="pricing" style="background-color: lightgray">
        <div class="container">
            <div class="row margin-40">
                <div class="col-sm-8 col-sm-offset-2 text-center">
                    <h2 class="black">
                        Eventos
                    </h2>
                   
                </div>
            </div>
            <div class="row margin-40">
                 @foreach($eventos as $eventos)
                 
                <div class="col-sm-4  wow fadeInUp" data-wow-delay="1s">
                    <br/>
                    <ul class="list-unstyled pricing-table text-center">
                        <li class="headline ">
                            <h5 class="white">
                                {{$eventos->nombre_e}}
                            </h5>
                        </li>
                        <li class="price">
                            <div class="amount">
                                
                                <small>
                                    {{$eventos->fecha}}
                                </small>
                            </div>
                        </li>
                        <li class="features last  btn-wide">
                            <a >
                                Descripción del evento
                            </a>
                        </li>
                        <li class="info">
                            {{$eventos->descripcion_e}}
                        </li>
                       
                    </ul>
                </div>
                @endforeach                
            </div>
        </div>
    </section>

    <section id="invite" class="pad-lg light-gray-bg" style="background-color: #7E418F">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-sm-offset-2 text-center">
              <h2 class="white">Logotipo de la parroquia</h2>
              <p class="lead" style="color: #ffff">
                Creado por Jorge Arturo García 
              </p>
              <div class="row">
                <img class="col s12 m3" src="{{ asset('/img/sa5.jpg') }}" width="100%" height: auto;>
              </div><!--End Form row-->
            </div>
          </div>
        </div>
      </section>
      <section id="invite" class="pad-lg light-gray-bg" style="background-color: #ffff">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-sm-offset-2 text-center">
              <h2 class="black">La psicología del color</h2>
              <p class="black">Los colores utilizados causan efectos en la percepción y la conducta humana.</p>
            </div>
            <div class="container">
            <div class="row">
			    <div class="col-sm-3 wow fadeIn" data-wow-delay="0.4s">
				    <hr class="line purple">
				    <h3>Violota</h3>
				    <p>Espiritualidad, intuición, intelectualidad, sabiduría, realeza, nobleza,
                        sensibilidad, pasión, amor.</p>
			    </div>
			    <div class="col-sm-3 wow fadeIn" data-wow-delay="0.8s">
				    <hr class="line blanco">
				    <h3>Blanco</h3>
				    <p>Bondad, pureza e inocencia, ya que este color simboliza paz.</p>
			    </div>
			    <div class="col-sm-3 wow fadeIn" data-wow-delay="1.2s">
				    <hr  class="line oro">
				    <h3>Amarillo</h3>
				    <p>Vitalidad, la luz y la creatividad. El amarillo se describe a menudo
                        como un color optimista, que afirma la vida, que nos recuerda la luz
                        del sol y que estimula nuestra mente.</p>
                </div>
                <div class="col-sm-3 wow fadeIn" data-wow-delay="1.2s">
				    <hr  class="line yellow">
				    <h3>Oro</h3>
				    <p>Significa valor.</p>
			    </div>
            </div>
        </div>
          </div>
        </div>
      </section>

      <section id="invite" class="pad-lg light-gray-bg" style="background-color: #7E418F">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-sm-offset-2 text-center">
              <h2 class="white">Minimalismo del logo</h2>
              <p class="white">Son elementos mínimos y básicos para reducir su esencia haciendo más
                perceptible y facil de recordar para los felígreses.</p>
            
              <div class="row">
                <img class="col s12 m3" src="{{ asset('/img/estructuralogo2.JPG') }}" width="100%" height: auto;>
              </div><!--End Form row-->
            
            </div>
          </div>
        </div>
      </section>

    <section class="pad-sm" id="press">
         @foreach($info as $info)
        <div class="container">
            <div class="row margin-30 news-container">
                <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 wow fadeInLeft" data-wow-delay="0.8s">
                    <a href="#" target="_blank">
                       
                        <img alt="Tech Crunch" class="news-img pull-left" src="{{ asset('/img2/place.png') }}" >
                            <p class="black">
                                <br>
                                Oficia central
                                <br/>
                               
                                <small>
                                    <em>
                                        {{$info->direccion}}
                                    </em>
                                    
                                </small>
                               
                            </p>
                        </img>
                    </a>
                </div>
            </div>
            <div class="row margin-30 news-container">
                <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 wow fadeInLeft" data-wow-delay="1.2s">
                    <a href="#" target="_blank" >
                        <img alt="Forbes" class="news-img pull-left" src="{{ asset('/img2/reloj.png') }}">
                            <p class="black">
                                <br>
                                Horario de atención
                                <br/>
                                <small>
                                    <em>
                                        {{$info->horario}}
                                    </em>
                                </small>
                            </p>
                        </img>
                    </a>
                </div>
            </div>
        </div>
        @endforeach 
    </section>
    <footer>
        
        <div class="container">
           
            <div class="row">
                
                <div class="col-sm-8 margin-20">
                    
                     <ul class="list-inline social">
                    @foreach($info2 as $info)
                        <li>
                           Conéctate con nosotros en:
                        </li>
                        <br>
                        <li>
                           
                            <a href="{{$info->urlfacebook}}" target="_blank">
                                <i class="fa fa-facebook">
                                </i>
                            </a>
                           
                        </li>
                        <li>
                            <a href="{{$info->urltwitter}}" target="_blank">
                                <i class="fa fa-twitter">
                                </i>
                            </a>
                        </li>
                        <li>
                            <a href="{{$info->urlinstagram}}" target="_blank">
                                <i class="fa fa-instagram">
                                </i>
                            </a>
                        </li>
                        <li>
                            <a href="mailto:{{$info->email}}">
                                <i class="fa fa-envelope">
                                   </i>
                                   {{$info->email}} 
                            </a>
                        </li>
                        </br>
                        
                        @endforeach 
                    </ul> 
                   
                </div>
                
                <div class="col-sm-4 text-right">
                    <p>
                        <small>
                            Copyright © 2020 Parroquia San Agustín.
                            <br>
                                Creado por
                                <a href="http://computacion.espam.edu.ec/" target="_blank">
                                    Carrera de Computación 8.º semestre
                                </a>
                            </br>
                        </small>
                    </p>
                </div>
            </div>
            
        </div>
        
    </footer>
    <!-- Javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
        
    </script>
    <script>
        window.jQuery || document.write('<script src="jsh/jquery-1.11.0.min.js"><\/script>')
    </script>
    <script src="{{ asset('/jsh/wow.min.js') }}">
    </script>
    <script src="{{ asset('/jsh/bootstrap.min.js') }}">
    </script>
    <script src="{{ asset('/jsh/main.js') }}">
    </script>
</body>
