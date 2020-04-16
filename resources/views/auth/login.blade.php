<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Elo Softwares | </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div class="row" style="margin: 0;">
    <div class="col-xs-12 col-md-3">

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form class="form-login" action="{{ route('login') }}" method="post">
              @csrf
              <img src="imgs/logo-elo.jpg" style="height: 200px; width: 200px;">
              <h1>Efetue seu Login!</h1>
                {{session('loginError')}}

                <div>
                  <input type="text" class="form-control @error('user') is-invalid @enderror" name="user" value="{{ Cookie::get('email') !== null ? Cookie::get('email') : old('user') }}" required autocomplete="email" autofocus placeholder="Email" style="width: 70%; margin: 20px auto;">
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ Cookie::get('auth') !== null ? Cookie::get('auth') : old('password') }}" required autocomplete="current-password" placeholder="Senha" style="width: 70%; margin: 20px auto;">
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <a class="reset_pass" href="#">Esqueceu sua senha?</a>
                <div>
                  <a class="btn btn-default submit" type="submit" href="/">Entrar</a>
                </div>

                <div class="clearfix"></div>

                <div class="separator">
                  <p class="change_link">Ainda não tem uma conta?
                    <a href="#signup" class="to_register"> Crie uma! </a>
                  </p>

                  <div class="clearfix"></div>
                  <br />

                </div>
            </form>
          </section>
        </div>
      </div>
    </div>

    <div class="col-md-9" style="padding: 0;">
      <div class=" img-login"></div>
      
    </div>

    </div>
  </body>
</html>
