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
                        <div>Resultado Faturamento Comparativo</div>
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
                                <a href="#" id="ano_anterior"
                                   class="ml-1 btn-pill btn-wide border-0 btn-transition  btn btn-outline-alternate second-tab-toggle-alt"
                                   onclick="ano_anterior();">Ano Anterior</a>
                                <a href="#" id="ano_atual"
                                   class="border-0 btn-pill btn-wide btn-transition  btn btn-outline-alternate"
                                   onclick="ano_atual();">Ano Atual</a>
                                <a href="#" id="data_costum"
                                   class="ml-1 btn-pill btn-wide border-0 btn-transition  btn btn-outline-alternate second-tab-toggle-alt">Escolher
                                    Ano</a>
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
                        <h6 class="card-title" style="margin: 20px;">Comparativo entre menses</h6>
                        <div class="scroll-area-sm">
                            <div class="scrollbar-container">
                                <ul id="rank-1" class="rm-list-borders rm-list-borders-scroll list-group list-group-flush"></ul>
                            </div>
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
                        <h6 class="card-title" style="margin: 20px;">Comparativo entre meses</h6>
                        <ul id="rank-2"
                            class="rm-list-borders rm-list-borders-scroll list-group list-group-flush"></ul>
                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps__rail-y" style="top: 0px; height: 200px; right: 0px;">
                            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 173px;"></div>
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

        function gera_cor(){
            var hexadecimais = '0123456789ABCDEF';
            var cor = '#';

            // Pega um número aleatório no array acima
            for (var i = 0; i < 6; i++ ) {
                //E concatena à variável cor
                cor += hexadecimais[Math.floor(Math.random() * 16)];
            }
            return cor;
        }

        Chart.defaults.global.tooltips.callbacks.label = function(tooltipItem, data) {
            var dataset = data.datasets[tooltipItem.datasetIndex];
            var datasetLabel = dataset.label || '';
            return datasetLabel + ": R$" + parseFloat(dataset.data[tooltipItem.index]).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
        };

        function ano_atual() {
            actualData = moment().startOf("Year").format('YYYY');
            _actualData = moment().format('YYYY');
            load_api(actualData, _actualData);
            $("#ano_anterior").removeClass('active');
            $("#data_costum").removeClass('active');
            $("#ano_atual").addClass('active');
        }

        function ano_anterior() {
            actualData = moment().subtract(1, 'Year').startOf("Year").format('YYYY');
            _actualData = moment().subtract(1, 'Year').endOf("Year").format('YYYY');
            load_api(actualData, _actualData);
            $("#ano_atual").removeClass('active');
            $("#data_costum").removeClass('active');
            $("#ano_anterior").addClass('active');
        }

        function data_custom(startDate, lastDate) {
            $("#ano_atual").removeClass('active');
            $("#ano_anterior").removeClass('active');
            $("#data_costum").addClass('active');
            load_api(startDate, lastDate);
        }

        function load_api(startDate, lastDate) {
            compfiscal(startDate, lastDate);
            compgerencial(startDate, lastDate);
        }

        function compfiscal(ano) {
            console.log(ano);
            $.get("/fat-comp/get/compfatfiscal?ano=" + ano, function (res) {
                data = JSON.parse(res).comp_fatfiscal;
                let label = new Array();
                let valor = new Array();
                let color = new Array();
                for (i in data) {
                    label.push(data[i].LABEL);
                    valor.push(data[i].VALOR);
                    color.push(gera_cor());
                    var HTMLNovo = '<li class="list-group-item">' +
                        '<div class="widget-content p-0">' +
                        '<div class="widget-content-wrapper">' +
                        '<div class="widget-content-left mr-3"></div>' +
                        '<div class="widget-content-left">' +
                        '<div class="widget-heading">' + data[i].LABEL + '</div>' +
                        '</div>' +
                        '<div class="widget-content-right">' +
                        '<div class="font-size-xlg text-muted">' +
                        '<small class="opacity-5 pr-1">R$</small>' +
                        '<span>' +  parseFloat(data[i].VALOR).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + '</span>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</li>';
                    $('#rank-1').append(HTMLNovo);
                }
                var ctx = document.getElementById('chart-bar-1').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: label,
                        datasets: [{
                            label: 'Gráfico de Dados',
                            data: valor,
                            backgroundColor: color,
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    callback: function (value, index, values) {
                                        if (parseInt(value) >= 1000) {
                                            return 'R$' +  parseFloat(value).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
                                        } else {
                                            return 'R$' + value;
                                        }
                                    }
                                }
                            }]
                        }
                    }
                });
            });
        }

        function compgerencial(ano) {
            $.get("/fat-comp/get/compfatgerencial?ano=" + ano, function (res) {
                data = JSON.parse(res).comp_fatgerencial;
                let label = new Array();
                let valor = new Array();
                let color = new Array();
                for (i in data) {
                    label.push(data[i].LABEL);
                    valor.push(data[i].VALOR);
                    color.push(gera_cor());
                    var HTMLNovo = '<li class="list-group-item">' +
                        '<div class="widget-content p-0">' +
                        '<div class="widget-content-wrapper">' +
                        '<div class="widget-content-left mr-3"></div>' +
                        '<div class="widget-content-left">' +
                        '<div class="widget-heading">' + data[i].LABEL + '</div>' +
                        '</div>' +
                        '<div class="widget-content-right">' +
                        '<div class="font-size-xlg text-muted">' +
                        '<small class="opacity-5 pr-1">R$</small>' +
                        '<span>' + parseFloat(data[i].VALOR).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + '</span>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</li>';
                    $('#rank-2').append(HTMLNovo);
                }
                var ctx = document.getElementById('chart-bar-2').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: label,
                        datasets: [{
                            label: 'Gráfico de Dados',
                            data: valor,
                            backgroundColor: color,
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    callback: function (value, index, values) {
                                        if (parseInt(value) >= 1000) {
                                            return 'R$' +  parseFloat(value).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
                                        } else {
                                            return 'R$' + value;
                                        }
                                    }
                                }
                            }]
                        }
                    }
                });
            });
        }

    </script>

    <!-- Script calendario -->
    <script type="text/javascript">
        ano_atual();

        $(function () {
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
                }, function (start, end, label) {
                    data_custom(start.format('DD/MM/YYYY'), end.format('DD/MM/YYYY'));
                });
        });
    </script>

@endsection


