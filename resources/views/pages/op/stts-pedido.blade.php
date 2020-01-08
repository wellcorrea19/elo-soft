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
                        <div>Operacional</div>
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
            <!-- <div class="row"> -->
                <!-- <div class="col-md-6 col-xl-6">
                    <div class="card mb-3 widget-content bg-midnight-bloom">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Total Receitas</div>
                                <div class="widget-subheading">Last year expenses</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><span>1896</span></div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="col-md-6 col-xl-6">
                    <div class="card mb-3 widget-content bg-arielle-smile">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Clientes</div>
                                <div class="widget-subheading">Lucro Total Clientes</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><span>$ 568</span></div>
                            </div>
                        </div>
                    </div>
                </div> -->
            <!-- </div> -->

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="main-card mb-3 card">
                        <div class="card-header-tab card-header" style="height: 15vh;">
                            <div class="m-auto">
                                    <a href="javascript:void(0);" class="border-0 btn-pill btn-wide btn-transition active btn btn-outline-alternate">Mes Atual</a>
                                    <a href="javascript:void(0);" class="ml-1 btn-pill btn-wide border-0 btn-transition  btn btn-outline-alternate second-tab-toggle-alt">Mes Anterior</a>
                                    <a href="javascript:void(0);" class="ml-1 btn-pill btn-wide border-0 btn-transition  btn btn-outline-alternate second-tab-toggle-alt" id="myBtn">Escolha Uma Data</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- The Modal -->
            <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <!-- <span class="close">&times;</span> -->
                    <br>
                    <input class="date form-control" type="text" placeholder="Data Inicial">
                    <br>
                    <input class="date form-control" type="text" placeholder="Data Final">
                    <a href="javascript:void(0);" class="ml-1 btn-pill btn-wide border-0 btn-transition  btn btn-outline-alternate second-tab-toggle-alt" style="margin: 15px auto 0 !important; width: 50%;">Aplicar</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="main-card mb-3 card">
                        <div class="card-header-tab card-header">
                            <div class="card-header-title m-auto">
                                <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"> </i>
                                Relatório Operacional Por Tipo de Carga Bruto
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="chart-doughnut-1"></canvas>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="mb-3 card">
                            <div class="card-header-tab card-header">
                                <div class="card-header-title m-auto">
                                    <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"> </i>
                                    Relatório Operacional Por Tipo De Frete Quantitativo
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-6">
                    <div class="mb-3 card">
                        <div class="card-header-tab card-header">
                            <div class="card-header-title m-auto">
                                <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"> </i>
                                Relatório Operacional Por Tipo de Carga Liquido
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
                                Relatório Operacional Por Modalidade Quantitativo
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="chart-doughnut-3"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h6 class="card-title">Ranking Clientes</h6>
                            <div class="scroll-area-sm">
                                <div class="scrollbar-container">
                                    <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <img width="42" class="rounded-circle" src="/imgs/avatars/9.jpg" alt="">
                                                    </div>
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">Ella-Rose Henry</div>
                                                        <div class="widget-subheading">Web Developer</div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="font-size-xlg text-muted">
                                                            <small class="opacity-5 pr-1">$</small>
                                                            <span>129</span>
                                                            <small class="text-danger pl-2">
                                                                <i class="fa fa-angle-down"></i>
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <img width="42" class="rounded-circle" src="/imgs/avatars/5.jpg" alt="">
                                                    </div>
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">Ruben Tillman</div>
                                                        <div class="widget-subheading">UI Designer</div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="font-size-xlg text-muted">
                                                            <small class="opacity-5 pr-1">$</small>
                                                            <span>54</span>
                                                            <small class="text-success pl-2">
                                                                <i class="fa fa-angle-up"></i>
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <img width="42" class="rounded-circle" src="/imgs/avatars/4.jpg" alt="">
                                                    </div>
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">Vinnie Wagstaff</div>
                                                        <div class="widget-subheading">Java Programmer</div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="font-size-xlg text-muted">
                                                            <small class="opacity-5 pr-1">$</small>
                                                            <span>429</span>
                                                            <small class="text-warning pl-2">
                                                                <i class="fa fa-dot-circle"></i>
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <img width="42" class="rounded-circle" src="/imgs/avatars/3.jpg" alt="">
                                                    </div>
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">Ella-Rose Henry</div>
                                                        <div class="widget-subheading">Web Developer</div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="font-size-xlg text-muted">
                                                            <small class="opacity-5 pr-1">$</small>
                                                            <span>129</span>
                                                            <small class="text-danger pl-2">
                                                                <i class="fa fa-angle-down"></i>
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <img width="42" class="rounded-circle" src="/imgs/avatars/2.jpg" alt="">
                                                    </div>
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">Ruben Tillman</div>
                                                        <div class="widget-subheading">UI Designer</div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="font-size-xlg text-muted">
                                                            <small class="opacity-5 pr-1">$</small>
                                                            <span>54</span>
                                                            <small class="text-success pl-2">
                                                                <i class="fa fa-angle-up"></i>
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>

<!--  -->
    <script>
        $.get('/operacional/get/pedidolucrobrutipocarga?datainicial=20/11/2019&datafinal=20/12/2019', function (res) {
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
    </script>

    <script>
        $.get('/operacional/get/pedidolucroliqtipocarga?datainicial=20/11/2019&datafinal=20/12/2019', function (res) {
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
    </script>

    <script>
        $.get('/operacional/get/pedidoqtdemodalidade?datainicial=20/11/2019&datafinal=20/12/2019', function (res) {
            console.log(JSON.parse(res).fatfiscal);
            data = JSON.parse(res).fatfiscal;
            var ctx = document.getElementById('chart-doughnut-3').getContext('2d');
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
    </script>

    <script>
        $.get('/operacional/get/pedidoqtdetipofrete?datainicial=20/11/2019&datafinal=20/12/2019', function (res) {
            console.log(JSON.parse(res).fatfiscal);
            data = JSON.parse(res).fatfiscal;
            var ctx = document.getElementById('chart-doughnut-4').getContext('2d');
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
    </script>

    <script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
    modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }
    </script>

    <!-- Script callendar -->
    <!-- <script src="/js/moment.min.js"></script> -->
    <!-- <script src="/js/bootstrap-datetimepicker.min.js"></script> -->
    <script type="text/javascript">
        $('.date').datepicker({
        format: 'dd-mm-yyyy'
        });
    </script>

@endsection


