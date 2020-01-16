<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="pt-br">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- /meta -->
    <title>MMSoftwares</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('Icon-font-7/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}">
    <!-- /Fonts -->
    <!-- css -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/app.min.css') }}">
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <!-- /css -->
    <!-- js -->
    <script src="{{ asset('js/manifest.min.js') }}"></script>
    <script src="{{ asset('js/vendor.min.js') }}"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/js/main.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <!-- /js -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/pt-br.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


</head>
<body class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">

<!-- Header start -->
<div class="app-header header-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="app-header__content">
        <div class="app-header-right">
            <div class="header-btn-lg pr-0">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <!-- <div class="widget-content-left">
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                    <img width="42" class="rounded-circle" src="/imgs/avatars/1.jpg" alt="">
                                    <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                </a>
                                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                    <button type="button" tabindex="0" class="dropdown-item">User Account</button>
                                    <button type="button" tabindex="0" class="dropdown-item">Settings</button>
                                    <h6 tabindex="-1" class="dropdown-header">Header</h6>
                                    <button type="button" tabindex="0" class="dropdown-item">Actions</button>
                                    <div tabindex="-1" class="dropdown-divider"></div>
                                    <button type="button" tabindex="0" class="dropdown-item">Dividers</button>
                                    <button type="button" tabindex="0" class="dropdown-item" href="log">Logout</button>
                                </div>
                            </div>
                        </div> -->
                        <div class="widget-content-left  ml-3 header-user-info">
                            <div class="widget-heading">
                                {{Auth::user()->email}}
                            </div>
                            <!-- <div class="widget-subheading">
                                Designer GrÃ¡fico
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header end -->

<!-- main start -->
<div class="app-main">

    <!-- Sidebar start -->
    <div class="app-sidebar sidebar-shadow">
        <div class="scrollbar-sidebar">
            <div class="app-sidebar__inner">
                <ul class="vertical-nav-menu">
                    <li class="app-sidebar__heading">Dashboard</li>
                    <li>
                        <a href="/" @if (Route::is('dashboard')) class="mm-active"  @endif>
                            <i class="metismenu-icon pe-7s-home"></i>
                            Home
                        </a>
                    </li>
                    <li class="app-sidebar__heading">Power BI</li>
                    <li>
                        <a href="{{route('faturamento')}}" @if (Route::is('faturamento')) class="mm-active"  @endif>
                            <i class="metismenu-icon pe-7s-graph"></i>
                            Faturamento
                        </a>
                    </li>
                    <li>
                        <a href="{{route('fat-comp')}}" @if (Route::is('fat-comp')) class="mm-active"  @endif>
                            <i class="metismenu-icon pe-7s-graph1"></i>
                            Faturamento Comparativo
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="metismenu-icon pe-7s-graph3"></i>
                            Operacional
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li>
                                <a href="{{route('resultquant')}}"  @if (Route::is('resultquant')) class="mm-active" @endif>
                                    <i class="metismenu-icon"></i>
                                    Resultado Quantitativo
                                </a>
                            </li>
                            <li>
                                <a href="{{route('resultlucbru')}}"  @if (Route::is('resultlucbru')) class="mm-active" @endif>
                                    <i class="metismenu-icon"></i>
                                    Resultado Lucro Bruto
                                </a>
                            </li>
                            <li>
                                <a href="{{route('resultlucliq')}}"  @if (Route::is('resultlucliq')) class="mm-active" @endif>
                                    <i class="metismenu-icon"></i>
                                    Resultado Lucro Liquido
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('user')}}" @if (Route::is('user')) class="mm-active"  @endif>
                            <i class="metismenu-icon pe-7s-add-user"></i>
                            Cadastros
                        </a>
                    </li>
                    <li class="app-sidebar__heading">Configurações</li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            <i class="metismenu-icon pe-7s-power"></i>
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sidebar end -->

    <!-- content start -->
@yield('content')
<!-- content end -->
</div>
<!-- main end -->

<!--footer start-->
<footer class="site-footer">
    <div class="text-center">
        <p>
            &copy; Copyrights <strong>MMSoftwares</strong>. Todos os direitos reservados.
        </p>
        <a href="/#" class="go-top">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>
</footer>
<!--footer end-->
</div>
</body>
</html>
