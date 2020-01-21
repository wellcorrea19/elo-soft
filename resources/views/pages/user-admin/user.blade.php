@extends('layouts.master')

@section('content')
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-add-user icon-gradient bg-mean-fruit">
                            </i>
                        </div>
                        <div>Cadastros</div>
                    </div>
                    <div class="page-title-actions">
                        <div class="app-header-left">
                            <div class="search-wrapper">
                                <div class="input-holder">
                                    <input type="text" class="search-input" placeholder="O que você procura?">
                                    <button class="search-icon"><span></span></button>
                                </div>
                                <button class="close"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('pages/flash-message/flash-message')
            <div style="text-align: center;">
                <button class="mt-1 btn btn-success" data-toggle="modal" data-target="#modalEmpresa">Cadastrar Empresa
                </button>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-card mb-12 card">
                        <div class="card-body table-responsive">
                            <ul class="vertical-nav-menu" id="css-table">
                                @foreach ($companys as $company)
                                    <li style="border-bottom: 0.1px solid rgb(218, 218, 218)">
                                    <a href="#" style="padding: 0 1.5rem 0 25px;">
                                        {{$company->name}}
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <div>
                                            <button onclick="loadInf({!! $loop->index !!})" class=" btn-geral btn btn-primary" data-toggle="modal" data-target="#modalInfoEmpresa">
                                                <i class="fas fa-archive" style="position: absolute; top: 7px; left: 6px;"></i>
                                            </button>
                                            <button class="btn-geral btn btn-success" data-toggle="modal" data-target="#modalUsuario">
                                                    <i class="fas fa-plus" style="position: absolute; top: 7px; left: 7px;"></i>
                                            </button>
                                            <button class="btn-geral btn btn-danger">
                                                <i class="fas fa-ban" style="position: absolute; top: 7px; left: 6px;"></i>
                                            </button>
                                        </div>
                                        <li class="_users">
                                            <a style="padding: 0;">
                                                Usuarios
                                                <div style="position: absolute; left: 80%; top: 0px;">
                                                    <input type="checkbox" checked data-toggle="toggle" data-size="xs"
                                                           data-onstyle="success" style="margin-left: 50px;">
                                                    <button class="btn-delet btn btn-danger">
                                                        <span
                                                            style="position: absolute; bottom: -2px; left: 8px;">x</span>
                                                    </button>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL INFORMAÇÕES EMPRESA -->
    <div class="modal fade" id="modalInfoEmpresa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true" style="padding-left: 0px;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-body mx-3">
                    </div>
                    <div class="md-form mb-5">
                        <i class="fas fa-building prefix grey-text"></i>
                        <label data-error="wrong" data-success="right" for="orangeForm-cnpj">CNPJ</label>
                        <input type="text" id="orangeForm-cnpj" class="form-control ">
                    </div>

                    <div class="md-form mb-5">
                        <i class="fas fa-building prefix grey-text"></i>
                        <label data-error="wrong" data-success="right" for="orangeForm-name">Nome</label>
                        <input type="text" id="orangeForm-name" class="form-control ">

                    </div>

                    <div class="md-form mb-5">
                        <i class="fas fa-envelope prefix grey-text"></i>
                        <label data-error="wrong" data-success="right" for="orangeForm-email">Email</label>
                        <input type="email" id="orangeForm-email" class="form-control ">

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="md-form mb-4">
                                <i class="fas fa-cloud-upload-alt prefix grey-text"></i>

                                <label data-error="wrong" data-success="right" for="orangeForm-host">Host</label>
                                <input type="text" id="orangeForm-host" class="form-control ">

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="md-form mb-4">
                                <i class="fas fa-lock prefix grey-text"></i>
                                <label data-error="wrong" data-success="right" for="orangeForm-limit">Limite de
                                    Usuarios</label>
                                <input type="number" id="orangeForm-limit" class="form-control ">
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-success">Atualizar</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- MODAL CADASTRO EMPRESA -->
    <div class="modal fade" id="modalEmpresa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true" style="padding-left: 0px;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" id="storeCompany" action="{{route('storeCompany')}}">
                    <div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-body mx-3"></div>
                            {!! csrf_field() !!}
                            <div class="md-form mb-5">
                                <i class="fas fa-building prefix grey-text"></i>
                                <label data-error="wrong" data-success="right" for="orangeForm-name">CNPJ</label>
                                <input type="text" name="cnpj" id="orangeForm-name" class="form-control ">
                            </div>

                            <div class="md-form mb-5">
                                <i class="fas fa-user prefix grey-text"></i>
                                <label data-error="wrong" data-success="right" for="orangeForm-name">Nome</label>
                                <input type="text" name="name" id="orangeForm-name" class="form-control ">
                            </div>

                            <div class="md-form mb-5">
                                <i class="fas fa-envelope prefix grey-text"></i>
                                <label data-error="wrong" data-success="right" for="orangeForm-email">Email</label>
                                <input type="email" name="email" id="orangeForm-email" class="form-control ">
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="md-form mb-4">
                                        <i class="fas fa-cloud-upload-alt prefix grey-text"></i>
                                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Host</label>
                                        <input type="text" name="host" id="orangeForm-pass" class="form-control ">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="md-form mb-4">
                                        <i class="fas fa-lock prefix grey-text"></i>
                                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Limite de
                                            Usuarios</label>
                                        <input type="number" name="users_limit" id="orangeForm-pass" class="form-control ">
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-success">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL CADASTRO USUARIO -->
    <div class="modal fade" id="modalUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true" style="padding-left: 0px;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <form method="POST" id="storeUser" action="{{route('storeUser')}}">
                    {!! csrf_field() !!}
                    <div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-body mx-3"></div>
                            <div class="md-form mb-5">
                                <i class="fas fa-user prefix grey-text"></i>
                                <label data-error="wrong" data-success="right" for="orangeForm-name">Nome</label>
                                <input type="text" name="name" id="orangeForm-name" class="form-control ">
                            </div>
                            <div class="md-form mb-5">
                                <i class="fas fa-envelope prefix grey-text"></i>
                                <label data-error="wrong" data-success="right" for="orangeForm-email">Email</label>
                                <input type="email" name="email" id="orangeForm-email" class="form-control ">
                            </div>

                            <div class="md-form mb-4">
                                <i class="fas fa-lock prefix grey-text"></i>
                                <label data-error="wrong" data-success="right" for="orangeForm-pass">Senha</label>
                                <input type="password" name="password" id="orangeForm-pass" class="form-control ">
                            </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-success">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- STYLE BOTÕES -->
    <style>
        .mb-5 {
            margin-bottom: 1rem !important;
        }

        .btn-delet {
            width: 25px;
            height: 22px;
        }

        .btn-geral {
            margin: 5px 0 25px 0;
            height: 30px;
            width: 30px;
        }
    </style>

    <!-- SCRIPT LISTAR EMPRESAS -->
    <script>
        var companys;

        $.get("/user/get/companys", function (res) {
            companys = JSON.parse(res).company;
        });

        function loadInf(id) {
            $('#modalInfoEmpresa #orangeForm-cnpj').val(companys[id].cnpj);
            $('#modalInfoEmpresa #orangeForm-name').val(companys[id].name);
            $('#modalInfoEmpresa #orangeForm-email').val(companys[id].email);
            $('#modalInfoEmpresa #orangeForm-host').val(companys[id].host);
            $('#modalInfoEmpresa #orangeForm-limit').val(companys[id].users_limit);
        }
    </script>

    <!-- BOTÃO EXCLUIR USUARIO -->
    <script>
        $( "button" ).click(function() {
            $( "li" ).remove( "._users" );
        });
    </script>

@endsection


