<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<link rel="icon" type="image/png" href="{{ asset('images/favicon/icosa2.png') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="complement/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="complement/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="complement/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="complement/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="complement/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="complement/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="complement/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="complement/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="complement/cssl2/util.css">
	<link rel="stylesheet" type="text/css" href="complement/cssl2/main.css">
	
    <link href="{{ asset('/cssh/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/cssh/main.css') }}" rel="stylesheet">

<!--===============================================================================================-->
</head>
<body>
	<div class="navbar-collapse collapse">
                    
                </div>
	<div class="limiter">
    <div class="container-login100" style="background-image: url('complement/images/bg-01.jpg');">
       
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>
             Error!!!
            </strong>
            <br>
             Correo o contraseña incorrectos
             
        </div>
        @endif
		<div class="container-login100">
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a class="scroll" href="{{ url('/') }}">
                            Regresar
                        </a>
                    </li>
    
                </ul>
            </div>
			<div class="wrap-login100">
                <form class="login100-form validate-form" action="{{ url('/login') }}" method="post">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
					<span class="login100-form-title p-b-26">
						Iniciar Sesión
					</span>
					<span class="login100-form-title p-b-48">
						
						<img src="complement/images/logo1.png" width="70%" height="70%">
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Ejemplo de correo: a@b.c">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Ingrese una contraseña">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit">
								Ingresar
							</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="complement/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="complement/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="complement/vendor/bootstrap/js/popper.js"></script>
	<script src="complement/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="complement/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="complement/vendor/daterangepicker/moment.min.js"></script>
	<script src="complement/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="complement/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="complement/jsl2/main.js"></script>

</body>
</html>