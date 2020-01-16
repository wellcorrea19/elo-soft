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
                        <div>Resultado Faturamento Comparativo </div>
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
                                <a href="#" id="ano_atual" class="border-0 btn-pill btn-wide btn-transition  btn btn-outline-alternate" onclick="ano_atual();">Ano Atual</a>
                                <a href="#" id="ano_anterior" class="ml-1 btn-pill btn-wide border-0 btn-transition  btn btn-outline-alternate second-tab-toggle-alt"  onclick="ano_anterior();">Ano Anterior</a>
                                <a href="#" id="data_costum" class="ml-1 btn-pill btn-wide border-0 btn-transition  btn btn-outline-alternate second-tab-toggle-alt" >Escolher Ano</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="main-card mb-3 card">
                        <div class="card-header-tab card-header">
                            <div class="card-header-title m-auto">
                                <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"> </i>
                                Relatório Comparativo Fiscal
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="chart-bar-1"></canvas>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-12 col-lg-12">
                     <div class="main-card mb-3 card">
                        <div class="card-header-tab card-header">
                            <div class="card-header-title m-auto">
                                <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"> </i>
                                Relatório Comparativo Gerencial
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="chart-bar-2"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>

    <!-- Gráficos -->
    <script type="text/javascript">
        moment.locale('pt-br');
        var actualData, _actualData;

        function ano_atual() {
            actualData = moment().startOf("Year").format('YYYY');
            _actualData = moment().format('YYYY');
            load_api(actualData,_actualData);
            $("#ano_anterior").removeClass('active');
            $("#data_costum").removeClass('active');
            $("#ano_atual").addClass('active');
        }

        function ano_anterior() {
            actualData = moment().subtract(1, 'Year').startOf("Year").format('YYYY');
            _actualData = moment().subtract(1, 'Year').endOf("Year").format('YYYY');
            load_api(actualData,_actualData);
            $("#ano_atual").removeClass('active');
            $("#data_costum").removeClass('active');
            $("#ano_anterior").addClass('active');
        }

        function data_custom(startDate,lastDate) {
            $("#ano_atual").removeClass('active');
            $("#ano_anterior").removeClass('active');
            $("#data_costum").addClass('active');
            load_api(startDate,lastDate);
        }

        function load_api(startDate,lastDate) {
            compfiscal(startDate,lastDate);
            compgerencial(startDate,lastDate);
        }

        function compfiscal(ano){
            console.log(ano);
            $.get("/fat-comp/get/compfatfiscal?ano="+ano, function (res) {
                console.log(JSON.parse(res).comp_fatfiscal);
                data = JSON.parse(res).comp_fatfiscal;
                var ctx = document.getElementById('chart-bar-1').getContext('2d');
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

        function compgerencial(ano){
            $.get("/fat-comp/get/compfatgerencial?ano="+ano, function (res) {
                console.log(JSON.parse(res).comp_fatgerencial);
                data = JSON.parse(res).comp_fatgerencial;
                var ctx = document.getElementById('chart-bar-2').getContext('2d');
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

    </script>

    <!-- Script calendario -->
    <script type="text/javascript">
        ano_anterior();

        $(function() {
            $('#data_costum').daterangepicker(
                {
                    "locale": {
                        "format": "YYYY",
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


