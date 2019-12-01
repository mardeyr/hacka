@extends('adminlte::page')

@section('title', 'IoT')


@section('content')

@if(count($iot) > 0 )
<!-- /.col-md-6 -->
<div class="col-lg-12">
    <div class="card">
        <div class="card-header border-0">
            <div class="d-flex justify-content-between">
                <h3 class="card-title">Precipitação</h3>
            </div>
        </div>
        <div class="card-body">

            <!-- /.d-flex -->

            <div class="position-relative mb-4">
                <canvas id="chLine" height="100"></canvas>
            </div>


        </div>
    </div>
</div>
   
    @endif




    @stop

    @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    @stop

    @section('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script type="text/javascript" src="jscript/graph.js"></script>
    <script>
        var marcas = [
            @foreach($iot as $iots) {
                datas: "{{ $iots->data }}",
                chuva: "{{round(( ($iots->pluviometro * 0.28) - 36,4 ), 2) }}",
            },
            @endforeach
        ];
        console.log(marcas.length);
        var data = [];
        var t1 = [];
        for (i = 0; i < marcas.length; i++) {
            data.push(marcas[i].datas);
            t1.push(marcas[i].chuva);
        }
        // chart colors
        var colors = ['#37a193', '#ffbb00', '#007bff', '#000057', '#28a745', '#333333', '#c3e6cb', '#dc3545', '#6c757d', '#66ff89', '#7d66ff', '#ff6666', '#ffff5c', '#ff5ce9', '#faa62f', '#21ff2c'];

        /* large line chart */
        var chLine = document.getElementById("chLine");

        var chartData = {
            labels: data, //["S", "M", "T", "W", "T", "F", "S"],
            datasets: [

                {
                    label: 'Chuvas',
                    data: t1, // [589, 445, 483, 503, 689, 692, 634],
                    backgroundColor: colors[0],
                    borderColor: colors[0],
                    borderWidth: 1,
                    pointBorderWidth: 1,
                    pointBackgroundColor: colors[0],
                },

            ]
        };


        if (chLine) {
            new Chart(chLine, {
                type: 'bar',
                data: chartData,
                options: {

                    scales: {
                        yAxes: [{
                            ticks: {
                                reverse: false,
                                beginAtZero: false
                            }
                        }]
                    },
                    legend: {
                        fontSize: 40,
                        display: true,

                    }
                }
            });
        }
        //}
    </script>
    @stop