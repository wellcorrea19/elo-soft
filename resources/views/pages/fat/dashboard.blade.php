@extends('layouts.master')

@section('content')
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-graph icon-gradient bg-mean-fruit">
                            </i>
                        </div>
                        <div>Faturamentos</div>
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
            
            <!-- Selecionar datas -->
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="main-card mb-3 card">
                        <div class="card-header-tab card-header" style="height: 15vh;">
                            <div class="m-auto">
                                <a href="#" id="mes_atual" class="border-0 btn-pill btn-wide btn-transition  btn btn-outline-alternate" onclick="mes_atual();">Mes Atual</a>
                                <a href="#" id="mes_anterior" class="ml-1 btn-pill btn-wide border-0 btn-transition  btn btn-outline-alternate second-tab-toggle-alt"  onclick="mes_anterior();">Mes Anterior</a>
                                <a href="#" id="data_costum" class="ml-1 btn-pill btn-wide border-0 btn-transition  btn btn-outline-alternate second-tab-toggle-alt" >Escolha Uma Data</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->

            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="main-card mb-3 card">
                        <div class="card-header-tab card-header">
                            <div class="card-header-title m-auto">
                                <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"> </i>
                                Faturamento Fiscal
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="chart-doughnut-1"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-6">
                    <div class="mb-3 card">
                        <div class="card-header-tab card-header">
                            <div class="card-header-title m-auto">
                                <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"> </i>
                                Faturamento Gerencial
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="chart-doughnut-2"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-12">
                    <div class="mb-3 card">
                        <div class="card-header-tab card-header">
                            <div class="card-header-title m-auto">
                                <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"> </i>
                                Faturamento Gerencial Por Cliente
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="tab-eg-55">
                                <div class="widget-chart p-3">
                                    <div>
                                        <canvas id="chart-bar"></canvas>
                                    </div>
                                    <h6 class="card-title" style="margin: 20px;">Ranking Clientes</h6>
                                    <div class="scroll-area-sm">
                                        <div class="scrollbar-container">
                                            <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                            </div>
                                                            <div class="widget-content-left">
                                                                <div class="widget-heading">Ella-Rose Henry</div>
                                                                <!-- <div class="widget-subheading">Web Developer</div> -->
                                                            </div>
                                                            <div class="widget-content-right">
                                                                <div class="font-size-xlg text-muted">
                                                                    <small class="opacity-5 pr-1">$</small>
                                                                    <span>129</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                            </div>
                                                            <div class="widget-content-left">
                                                                <div class="widget-heading">Ruben Tillman</div>
                                                                <!-- <div class="widget-subheading">UI Designer</div> -->
                                                            </div>
                                                            <div class="widget-content-right">
                                                                <div class="font-size-xlg text-muted">
                                                                    <small class="opacity-5 pr-1">$</small>
                                                                    <span>54</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                            </div>
                                                            <div class="widget-content-left">
                                                                <div class="widget-heading">Vinnie Wagstaff</div>
                                                                <!-- <div class="widget-subheading">Java Programmer</div> -->
                                                            </div>
                                                            <div class="widget-content-right">
                                                                <div class="font-size-xlg text-muted">
                                                                    <small class="opacity-5 pr-1">$</small>
                                                                    <span>429</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                            </div>
                                                            <div class="widget-content-left">
                                                                <div class="widget-heading">Ella-Rose Henry</div>
                                                                <!-- <div class="widget-subheading">Web Developer</div> -->
                                                            </div>
                                                            <div class="widget-content-right">
                                                                <div class="font-size-xlg text-muted">
                                                                    <small class="opacity-5 pr-1">$</small>
                                                                    <span>129</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                            </div>
                                                            <div class="widget-content-left">
                                                                <div class="widget-heading">Ruben Tillman</div>
                                                                <!-- <div class="widget-subheading">UI Designer</div> -->
                                                            </div>
                                                            <div class="widget-content-right">
                                                                <div class="font-size-xlg text-muted">
                                                                    <small class="opacity-5 pr-1">$</small>
                                                                    <span>54</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="widget-chart-content text-center mt-5">
                                        <div class="widget-description mt-0 text-warning">
                                            <i class="fa fa-arrow-left"></i>
                                            <span class="pl-1">175.5%</span>
                                            <span class="text-muted opacity-8 pl-1">Nos últimos meses</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--  -->
    <script type="text/javascript">
        moment.locale('pt-br');
        var actualData, _actualData;

        function mes_atual() {
            actualData = moment().startOf("Month").format('DD/MM/YYYY');
            _actualData = moment().format('DD/MM/YYYY');
            load_api(actualData,_actualData);
            $("#mes_anterior").removeClass('active');
            $("#data_costum").removeClass('active');
            $("#mes_atual").addClass('active');
        }

        function mes_anterior() {
            actualData = moment().subtract(1, 'Month').startOf("Month").format('DD/MM/YYYY');
            _actualData = moment().subtract(1, 'Month').endOf("Month").format('DD/MM/YYYY');
            load_api(actualData,_actualData);
            $("#mes_atual").removeClass('active');
            $("#data_costum").removeClass('active');
            $("#mes_anterior").addClass('active');
        }

        function data_custom(startDate,lastDate) {
            $("#mes_atual").removeClass('active');
            $("#mes_anterior").removeClass('active');
            $("#data_costum").addClass('active');
            load_api(startDate,lastDate);
        }

        function load_api(startDate,lastDate) {
            faturamento(startDate,lastDate);
            gerencial(startDate,lastDate);
            gerencialcliente(startDate,lastDate);
        }

        function faturamento(datainicial,datafinal){
            console.log(datainicial);
            $.get("/faturamento/get/fiscal?datainicial="+datainicial+"&datafinal="+datafinal , function (res) {
                console.log(JSON.parse(res).fatfiscal);
                data = JSON.parse(res).fatfiscal;
                var ctx = document.getElementById('chart-doughnut-1').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: [data[0].LABEL, data[1].LABEL],
                        datasets: [{
                            label: 'Gráfico de Dados',
                            data: [data[0].VALOR, data[1].VALOR],
                            backgroundColor: [
                                'rgba(50, 202, 50)',
                                'rgba(167, 159, 159, 1)',
                            ],
                        }]
                    },
                });
            });
        }

        function gerencialcliente(datainicial,datafinal){
            $.get("/faturamento/get/gerencialcliente?datainicial="+datainicial+"&datafinal="+datafinal, function (res) {
                console.log(JSON.parse(res).fatgerencial_cliente);
                data = JSON.parse(res).fatgerencial_cliente;
                var ctx = document.getElementById('chart-bar').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: [data[0].LABEL, data[1].LABEL],
                        datasets: [{
                            label: 'Gráfico de Dados',
                            data: [data[0].VALOR, data[1].VALOR],
                            backgroundColor: [
                                'rgba(50, 202, 50)',
                                'rgba(167, 159, 159, 1)',
                            ],
                        }]
                    },
                });
            });
        }

        function gerencial(datainicial,datafinal){
            $.get("/faturamento/get/gerencial?datainicial="+datainicial+"&datafinal="+datafinal, function (res) {
                console.log(JSON.parse(res).fatgerencial);
                data = JSON.parse(res).fatgerencial;
                var ctx = document.getElementById('chart-doughnut-2').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: [data[0].LABEL, data[1].LABEL, data[2].LABEL],
                        datasets: [{
                            label: 'Gráfico de Dados',
                            data: [data[0].VALOR, data[1].VALOR, data[2].VALOR],
                            backgroundColor: [
                                'rgba(50, 202, 50)',
                                'rgba(167, 159, 159, 1)',
                            ],
                        }]
                    },
                });
            });
        }
    </script>

    <!-- Script calendario -->
    <script type="text/javascript">
        mes_anterior();

        $(function() {
            $('#data_costum').daterangepicker(
                {
                    "locale": {
                        "format": "DD/MM/YYYY",
                        "separator": " - ",
                        "applyLabel": "Aplicar",
                        "cancelLabel": "Cancelar",
                        "daysOfWeek": [
                            "Dom",
                            "Seg",
                            "Ter",
                            "Qua",
                            "Qui",
                            "Sex",
                            "Sab"
                        ],
                        "monthNames": [
                            "Janeiro",
                            "Fevereiro",
                            "Março",
                            "Abril",
                            "Maio",
                            "Junho",
                            "Julho",
                            "Agosto",
                            "Setembro",
                            "Outubro",
                            "Novembro",
                            "Dezembro"
                        ],
                        "firstDay": 1
                    }
                } , function(start, end, label) {
                data_custom(start.format('DD/MM/YYYY'),end.format('DD/MM/YYYY'));
            });
        });
    </script>

@endsection


