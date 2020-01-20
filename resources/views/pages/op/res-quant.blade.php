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
                        <div>Resultado Quantitativo</div>
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
                                <a href="#" id="mes_anterior" class="ml-1 btn-pill btn-wide border-0 btn-transition  btn btn-outline-alternate second-tab-toggle-alt"  onclick="mes_anterior();">Mes Anterior</a>
                                <a href="#" id="mes_atual" class="border-0 btn-pill btn-wide btn-transition  btn btn-outline-alternate" onclick="mes_atual();">Mes Atual</a>
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
                                Relatório Operacional Por Modalidade
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
                                Relatório Operacional Por Tipo De Carga
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="chart-doughnut-3"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-12">
                    <div class="main-card mb-3 card">
                        <div class="card-header-tab card-header">
                            <div class="card-header-title m-auto">
                                <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"> </i>
                                Relatório Operacional Por Tipo De Frete
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="chart-doughnut-2"></canvas>
                        </div>
                    </div>
                    <div class="mb-3 card">
                        <div class="card-header-tab card-header">
                            <div class="card-header-title m-auto">
                                <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"> </i>
                                Relatório Operacional Por Rotas
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="chart-doughnut-4"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Gráficos -->
    <script type="text/javascript">
        moment.locale('pt-br');
        var actualData, _actualData;
        var chart1, chart2, chart3, chart4;

        function modalidade(datainicial,datafinal){
            if(chart1 !== undefined){chart1.destroy();}
            $.get("/operacional/get/pedidoqtdemodalidade?datainicial="+datainicial+"&datafinal="+datafinal , function (res) {
                data = JSON.parse(res).pedido_qtde_modalidade;
                let label = new Array();
                let valor = new Array();
                let color = new Array();
                $('#chart-doughnut-1').html('');
                for ( i in data){
                    label.push(data[i].LABEL);
                    valor.push(data[i].VALOR);
                    color.push(gera_cor());
                }
                let ctx = document.getElementById('chart-doughnut-1').getContext('2d');
                chart1 = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: label,
                        datasets: [{
                            label: 'Gráfico de Dados',
                            data: valor,
                            backgroundColor: color,
                        }]
                    },
                });
            });
        }

        function qtdefrete(datainicial,datafinal){
            if(chart2!== undefined){chart2.destroy();}
            $.get("/operacional/get/pedidoqtdetfrete?datainicial="+datainicial+"&datafinal="+datafinal, function (res) {
                data = JSON.parse(res).pedido_qtde_tipofrete;
                let label = new Array();
                let valor = new Array();
                let color = new Array();
                $('#chart-doughnut-2').html('');
                for ( i in data){
                    label.push(data[i].LABEL);
                    valor.push(data[i].VALOR);
                    color.push(gera_cor());
                }
                let ctx = document.getElementById('chart-doughnut-2').getContext('2d');
                chart2 = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: label,
                        datasets: [{
                            label: 'Gráfico de Dados',
                            data: valor,
                            backgroundColor: color,
                        }]
                    },
                });
            });
        }

        function qtdecarga(datainicial,datafinal){
            if(chart3 !== undefined){chart3.destroy();}
            $.get("/operacional/get/pedidoqtdetcarga?datainicial="+datainicial+"&datafinal="+datafinal, function (res) {
                data = JSON.parse(res).pedido_qtde_tipocarga;
                let label = new Array();
                let valor = new Array();
                let color = new Array();
                $('#chart-doughnut-3').html('');
                for ( i in data){
                    label.push(data[i].LABEL);
                    valor.push(data[i].VALOR);
                    color.push(gera_cor());
                }
                let ctx = document.getElementById('chart-doughnut-3').getContext('2d');
                chart3 = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: label,
                        datasets: [{
                            label: 'Gráfico de Dados',
                            data: valor,
                            backgroundColor: color,
                        }]
                    },
                });
            });
        }

        function qtderota(datainicial,datafinal){
            if(chart4 !== undefined){chart4.destroy();}
            $.get("/operacional/get/pedidoqtderota?datainicial="+datainicial+"&datafinal="+datafinal, function (res) {
                data = JSON.parse(res).pedido_qtde_rota;
                let label = new Array();
                let valor = new Array();
                let color = new Array();
                $('#chart-doughnut-4').html('');
                for ( i in data){
                    label.push(data[i].LABEL);
                    valor.push(data[i].VALOR);
                    color.push(gera_cor());
                }
                let ctx = document.getElementById('chart-doughnut-4').getContext('2d');
                chart4 = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: label,
                        datasets: [{
                            label: 'Gráfico de Dados',
                            data: valor,
                            backgroundColor: color,
                        }]
                    },
                });
            });
        }

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
            modalidade(startDate,lastDate);
            qtdefrete(startDate,lastDate);
            qtdecarga(startDate,lastDate);
            qtderota(startDate,lastDate);
        }

    </script>

    <!-- Script calendario -->
    <script type="text/javascript">
        mes_atual();

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


