<html lang="en">
    <head>
        <title>
            Login 
        </title>
        <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1" name="viewport">
                <!--===============================================================================================-->
                <link rel="icon" type="image/png" href="{{ asset('images/favicon/icosa2.png') }}">
                <!--===============================================================================================-->
                <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
                    <!--===============================================================================================-->
                    <link href="fontsl/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
                        <!--===============================================================================================-->
                        <link href="fontsl/Linearicons-Free-v1.0.0/icon-font.min.css" rel="stylesheet" type="text/css">
                            <!--===============================================================================================-->
                            <link href="vendor/animate/animate.css" rel="stylesheet" type="text/css">
                                <!--===============================================================================================-->
                                <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" type="text/css">
                                    <!--===============================================================================================-->
                                    <link href="vendor/animsition/css/animsition.min.css" rel="stylesheet" type="text/css">
                                        <!--===============================================================================================-->
                                        <link href="vendor/select2/select2.min.css" rel="stylesheet" type="text/css">
                                            <!--===============================================================================================-->
                                            <link href="vendor/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css">
                                                <!--===============================================================================================-->
                                                <link href="cssl/util.css" rel="stylesheet" type="text/css">
                                                    <link href="cssl/main.css" rel="stylesheet" type="text/css">
                                                        <!--===============================================================================================-->

                                                        <link href="{{ asset('/cssh/bootstrap.min.css') }}" rel="stylesheet">
                                                        <link href="{{ asset('/cssh/main.css') }}" rel="stylesheet">

                                                    </link>
                                                </link>
                                            </link>
                                        </link>
                                    </link>
                                </link>
                            </link>
                        </link>
                    </link>
                </link>
            </meta>
        </meta>
    </head>
    <body>
        <div class="limiter">
            <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a class="scroll" href="{{ url('/') }}">
                                Regresar
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="wrap-login100 p-t-30 p-b-50">
                    
                    <span class="login100-form-title p-b-41">
                        Inicio de sesión
                    </span>
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>
                         Error!!!
                        </strong>
                        <br>
                         Correo o contraseña incorrectos
                         
                    </div>
                    @endif
                    <form action="{{ url('/login') }}" class="login100-form validate-form p-b-33 p-t-5" method="post">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                            <div class="wrap-input100 validate-input">
                                <input class="input100" name="email" placeholder="correo" type="email">
                                    <span class="focus-input100" data-placeholder="">
                                    </span>
                                </input>
                            </div>
                            <div class="wrap-input100 validate-input">
                                <input class="input100" name="password" placeholder="contraseña" type="password">
                                    <span class="focus-input100" data-placeholder="">
                                    </span>
                                </input>
                            </div>
                            <div class="container-login100-form-btn m-t-32">
                                <button class="login100-form-btn" type="submit">
                                    Ingresar
                                </button>
                            </div>
                        </input>
                    </form>
                    <br>
                        <br>
                            
                        </br>
                    </br>
                </div>
            </div>
        </div>
        {{--
        <div id="dropDownSelect1">
        </div>
        --}}
        
        <!--===============================================================================================-->
        <script src="vendor/jquery/jquery-3.2.1.min.js">
        </script>
        <!--===============================================================================================-->
        <script src="vendor/animsition/js/animsition.min.js">
        </script>
        <!--===============================================================================================-->
        <script src="vendor/bootstrap/js/popper.js">
        </script>
        <script src="vendor/bootstrap/js/bootstrap.min.js">
        </script>
        <!--===============================================================================================-->
        <script src="vendor/select2/select2.min.js">
        </script>
        <!--===============================================================================================-->
        <script src="vendor/daterangepicker/moment.min.js">
        </script>
        <script src="vendor/daterangepicker/daterangepicker.js">
        </script>
        <!--===============================================================================================-->
        <script src="vendor/countdowntime/countdowntime.js">
        </script>
        <!--===============================================================================================-->
        <script src="js/main.js">
        </script>
    </body>
</html>