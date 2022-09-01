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
   
    <title>SA | @yield('htmlheader_title', '') </title>
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
    <!-- Start Page Loading -->
    {{--  <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>  --}}
    <!-- End Page Loading -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    
    @include('layouts.topnavigation')

    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START MAIN -->
    <div id="main">
      <!-- START WRAPPER -->
      <div class="wrapper">
        
        @include('layouts.leftsidebar')

        <!-- //////////////////////////////////////////////////////////////////////////// -->
        
        <section class="content" id="content">
            <!-- Your Page Content Here -->
            @yield('content')
        </section><!-- /.content -->
       
       

      </div>
      <!-- END WRAPPER -->
    </div>
    <!-- END MAIN -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    @yield('footer')
   

    <!-- ================================================
    Scripts
    ================================================ -->
    <!-- jQuery Library -->
    {{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  --}}
   
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/vendor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/acciones.js') }}"></script>
    @yield('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  </body>
</html>