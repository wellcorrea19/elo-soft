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
                <!-- Gráfico 2 -->
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
                        <ul id="rank-1" class="rm-list-borders rm-list-borders-scroll list-group list-group-flush"></ul>
                    </div>
                </div>
                <!-- Gráfico 2 -->
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
                        <ul id="rank-2" class="rm-list-borders rm-list-borders-scroll list-group list-group-flush"></ul>
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
        var chart1, chart2;
        
        Chart.defaults.global.tooltips.callbacks.label = function(tooltipItem, data) {
            var dataset = data.datasets[tooltipItem.datasetIndex];
            var datasetLabel = dataset.label || '';
            return datasetLabel + ": R$" + parseFloat(dataset.data[tooltipItem.index]).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
        };

        function compfiscal(ano) {
            if(chart1 !== undefined){chart1.destroy();}
            $.get("/fat-comp/get/compfatfiscal?ano=" + ano, function (res) {
                data = JSON.parse(res).comp_fatfiscal;
                let label = new Array();
                let valor = new Array();
                let color = new Array();
                $('#rank-1').html('');
                $('#chart-bar-1').html('');
                for (i in data) {
                    label.push(data[i].LABEL);
                    valor.push(data[i].VALOR);
                    color.push(gera_cor());
                    rank('#rank-1',data[i]);
                }
                let ctx = document.getElementById('chart-bar-1').getContext('2d');
                let options =  {
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
                        }],
                            xAxes: [{
                            display: false
                        }],
                    }
                };
                chart1 = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: label,
                        datasets: [{
                            label: 'Gráfico de Dados',
                            data: valor,
                            backgroundColor: color,
                        }]
                    },
                    options: options
                });
            });
        }

        function compgerencial(ano) {
            if(chart2 !== undefined){chart2.destroy();}
            $.get("/fat-comp/get/compfatgerencial?ano=" + ano, function (res) {
                data = JSON.parse(res).comp_fatgerencial;
                let label = new Array();
                let valor = new Array();
                let color = new Array();
                $('#rank-2').html('');
                $('#chart-bar-2').html('');
                for (i in data) {
                    label.push(data[i].LABEL);
                    valor.push(data[i].VALOR);
                    color.push(gera_cor());
                    rank('#rank-2',data[i]);
                }
                let ctx = document.getElementById('chart-bar-2').getContext('2d');
                let options =  {
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
                        }],
                        xAxes: [{
                            display: false
                        }],
                    }
                };
                chart2 = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: label,
                        datasets: [{
                            label: 'Gráfico de Dados',
                            data: valor,
                            backgroundColor: color,
                        }]
                    },
                    options: options
                });
            });
        }

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

        function gera_cor(){
            var hexadecimais = '0123456789ABCDEF';
            var cor = '#';
            for (var i = 0; i < 6; i++ ) {
                cor += hexadecimais[Math.floor(Math.random() * 16)];
            }
            return cor;
        }

        function rank(id,data) {
            var HTMLNovo =
                '<li class="list-group-item">' +
                    '<div class="widget-content p-0">' +
                        '<div class="widget-content-wrapper">' +
                            '<div class="widget-content-left mr-3"></div>' +
                            '<div class="widget-content-left">' +
                                '<div class="widget-heading">' + data.LABEL + '</div>' +
                            '</div>' +
                            '<div class="widget-content-right">' +
                                '<div class="font-size-xlg text-muted">' +
                                    '<small class="opacity-5 pr-1">R$</small>' +
                                    '<span>' +  parseFloat(data.VALOR).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + '</span>' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                    '</div>' +
                '</li>';
            $(id).append(HTMLNovo);
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
                    data_custom(start.format('YYYY'), end.format('YYYY'));
                });
        });
    </script>

@endsection


