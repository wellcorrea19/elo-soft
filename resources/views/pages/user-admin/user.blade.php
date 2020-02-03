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
                                <li class="_companys" style="border-bottom: 0.1px solid rgb(218, 218, 218)">
                                    <a href="#"   onclick="listUsers({{$company->id}})" style="padding: 0 1.5rem 0 25px;">
                                        {{$company->name}}
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul id="company{{$company->id}}">
                                        <div>
                                            <button onclick="loadInf({!! $loop->index !!})" class=" btn-geral btn btn-primary" data-toggle="modal" data-target="#modalInfoEmpresa">
                                                <i class="fas fa-archive" style="position: absolute; top: 7px; left: 6px;"></i>
                                            </button>
                                            <button onclick="loadNew({!! $company->id !!})" class="btn-geral btn btn-success" data-toggle="modal" data-target="#modalUsuario">
                                                    <i class="fas fa-plus" style="position: absolute; top: 7px; left: 7px;"></i>
                                            </button>
                                            <!-- <button onclick="disableCompany({!! $company->id !!})" class="btn-geral btn btn-danger btn-delete">
                                                <i class="fas fa-ban" style="position: absolute; top: 7px; left: 6px;"></i>
                                            </button> -->
                                        </div>
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
                <form  id="updateCompany">
                    <div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-body mx-3">
                        </div>
                        <div class="md-form mb-5">
                            <i class="fas fa-building prefix grey-text"></i>
                            <label data-error="wrong" data-success="right" for="orangeForm-cnpj">CNPJ</label>
                            <input type="text" id="orangeForm-cnpj" class="form-control " disabled>
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
                        <input type="hidden" id="orangeForm-id" class="form-control ">
                        <div class="modal-footer d-flex justify-content-center">
                            <button class="btn btn-success">Atualizar</button>
                        </div>

                    </div>
                </form>
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
                            <input type="hidden" name="company_id" id="orangeForm-company_id" class="form-control">
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
        var users;
        var companys;
        $.get("/user/get/companys", function (res) {
            companys = JSON.parse(res).company;
        });

        $('#updateCompany').submit(function(e){
            e.preventDefault();
            $.put("/user/put/company",
                {
                    "_token": "{{csrf_token()}}",
                    id:$('#updateCompany #orangeForm-id').val(),
                    cnpj:$('#updateCompany #orangeForm-cnpj').val(),
                    name:$('#updateCompany #orangeForm-name').val(),
                    email:$('#updateCompany #orangeForm-email').val(),
                    host:$('#updateCompany #orangeForm-host').val(),
                    users_limit: $('#updateCompany #orangeForm-limit').val()
                },
                function (res) {
                    location.reload();
                });
        });

        function loadInf(id) {
            $('#modalInfoEmpresa #orangeForm-id').val(companys[id].id);
            $('#modalInfoEmpresa #orangeForm-cnpj').val(companys[id].cnpj);
            $('#modalInfoEmpresa #orangeForm-name').val(companys[id].name);
            $('#modalInfoEmpresa #orangeForm-email').val(companys[id].email);
            $('#modalInfoEmpresa #orangeForm-host').val(companys[id].host);
            $('#modalInfoEmpresa #orangeForm-limit').val(companys[id].users_limit);
        }

        function loadNew(id) {
            $('#modalUsuario #orangeForm-company_id').val(id);
        }

        function updateUser(e) {
            let user =users.find(obj => obj.id == e);
            $.put("/user/put/user",
                {
                    "_token": "{{csrf_token()}}",
                    name:user.name,
                    email:user.email,
                    company_id:user.company_id,
                    id:e,
                    admin: user.admin,
                    active:!user.active
                },
            function (res) {
                let user = JSON.parse(res);
                listUsers(user.company_id);
            });
        }


        $.put = function(url, data, callback, type){

            if ( $.isFunction(data) ){
                type = type || callback,
                    callback = data,
                    data = {}
            }

            return $.ajax({
                url: url,
                type: 'PUT',
                success: callback,
                data: data,
                contentType: type
            });
        }

        function listUsers(id) {
            $.get("/user/get/users/"+id, function (res) {
                users = JSON.parse(res).users;
                $('#company'+id+ ' li').remove();
                for(i in users){
                    let data_toggle;
                    if(users[i].active===true){
                        data_toggle = 'checked';
                    }else{
                        data_toggle = '';
                    }

                    let html =
                        '<li class="_users">'+
                            '<a style="padding: 0; color: black; font-weight: bold;">'+
                                users[i].name+
                                '<div style="position: absolute; left: 90%; top: 0px;">'+
                                    '<input type="checkbox" id="_user'+users[i].id+'" data-onstyle="success"  data-toggle="toggle" data-size="xs" '+
                                    data_toggle + ' style="margin-left: 50px;">'+
                                '</div>'+
                            '</a>'+
                        '</li>';
                    $('#company'+id).append(html);
                }
                $('input[id*="_user"]').bootstrapToggle();
                $('input[id*="_user"]').change(function(e) {
                    updateUser($(e.target).attr('id').replace('_user',''));
                });
            });

        }


    </script>

    <!-- BOTÃO EXCLUIR USUARIO -->
{{--    <script>--}}
{{--        $( "button" ).click(function() {--}}
{{--            $( "li" ).remove( "._users" );--}}
{{--        });--}}
{{--        $(" .btn-delete ").click(function(){--}}
{{--            $( "li" ).remove("._companys");--}}
{{--        });--}}
{{--    </script>--}}

@endsection


