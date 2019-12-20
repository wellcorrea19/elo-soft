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
                                    <input type="text" class="search-input" placeholder="Type to search">
                                    <button class="search-icon"><span></span></button>
                                </div>
                                <button class="close"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">Doughnut</h5>
                            <canvas id="chart-doughnut"></canvas>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        $.get('/getfaturamento?datainicial=20/11/2019&datafinal=20/12/2019', function (res) {
            console.log(JSON.parse(res).fatfiscal);
            data = JSON.parse(res).fatfiscal;
            var ctx = document.getElementById('chart-doughnut').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: [data[0].LABEL, data[1].LABEL],
                    datasets: [{
                        label: '# of Votes',
                        data: [data[0].VALOR, data[1].VALOR],
                        backgroundColor: [
                            'rgba(0, 127, 0, 0.2)',
                            'rgba(111, 111, 111, 0.2)',

                        ],
                        borderColor: [

                            'rgba(0, 127, 0, 1)',
                            'rgba(111, 111, 111, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        });



    </script>
@endsection


