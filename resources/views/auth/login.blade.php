<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>MM SOFTWARES</title>

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fav Icon -->
    <link rel="shortcut icon" href="/imgs/fav-icon.png" type="image/x-icon">

    <!-- Bootstrap core CSS -->
    <link href="../css/styles.css" rel="stylesheet">
    <!--  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/style-responsive.css" rel="stylesheet">
    <script src="{{ url('js/manifest.min.js') }}"></script>
    <script src="{{ url('js/vendor.min.js') }}"></script>
    <script src="{{ url('/js/app.js') }}"></script>
    <!-- =======================================================
      Template Name: Dashio
      Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
      Author: TemplateMag.com
      License: https://templatemag.com/license/
    ======================================================= -->
</head>
<body>
<div id="login-page">
    <div class="container">
        <form class="form-login" action="{{ route('login') }}" method="post">
            @csrf
            <h2 class="form-login-heading">Efetue seu login!</h2>
            <div class="login-wrap">
                {{session('loginError')}}

                <input id="email" type="email" class="form-control @error('user') is-invalid @enderror" name="user" value="{{ Cookie::get('email') !== null ? Cookie::get('email') : old('user') }}" required autocomplete="email" autofocus placeholder="Email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <br>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ Cookie::get('auth') !== null ? Cookie::get('auth') : old('password') }}" required autocomplete="current-password" placeholder="Senha">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label class="checkbox" style="width: 100%; margin: 10px 0;">
                    <input type="checkbox"  name="remember" id="remember"  {{ old('remember') || Cookie::get('rememberme') ? 'checked' : '' }}> Lembrar-me
                    <span style=" position: relative; left: calc(50% - 60px)">
                        <a data-toggle="modal" href="#" data-target="#myModal"> Esqueceu a senha?</a>
                    </span>
                </label>
                <button class="btn btn-theme btn-block" href="/" type="submit"><i class="fa fa-lock"></i> Logar</button>
                <hr>
                <div class="registration">
                    Ainda não possui uma conta?<br/>
                    <a class="" href="#">
                        Cadastre-se
                    </a>
                </div>
            </div>
            <!-- Modal -->
            <div aria-hidden="true" aria-labelledby="myModal" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Esqueceu sua senha ?</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p>Digite seu endereço de email para alterar sua senha.</p>
                            <input type="text" name="email"  placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
                            <button class="btn btn-theme" type="button">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal -->
        </form>
    </div>
</div>
</div>
</body>
