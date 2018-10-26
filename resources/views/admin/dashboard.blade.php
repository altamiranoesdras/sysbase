@extends('layouts.app')

@section('htmlheader_title')
    Dashboard
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                {{--<div class="col">--}}
                    {{--<a class="btn btn-outline-info float-right" href="{!! route('home') !!}">--}}
                        {{--<i class="fa fa-list"></i>--}}
                        {{--<span class="d-none d-sm-inline">Listado</span>--}}
                    {{--</a>--}}
                {{--</div><!-- /.col -->--}}
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            @include('flash::message')

            <!-- Info boxes -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{dvs()}} {{nfp($totalVentasHoyUser)}}</h3>

                            <p>Tus ventas de hoy</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <a href="{{route('ventas.index')}}" class="small-box-footer">
                            Mas info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>
                                @if($cajaUser)
                                    {{dvs()}} {{nfp($cajaUser->monto_cierre)}}
                                @else
                                    {{dvs()." ".nfp(0)}}
                                @endif
                            </h3>

                            <p>Tu Caja</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-archive"></i>
                        </div>
                        @if($cajaUser)
                            <a href="{{route('cajas.show',$cajaUser->id)}}" class="small-box-footer">
                                Mas info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        @else
                            <a href="{{route('cajas.create')}}" class="small-box-footer">
                                Abrir Caja <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        @endif
                    </div>
                </div>
                @if(Auth::user()->isAdmin() || Auth::user()->isAdminTienda())
                    <div class="col-lg-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{dvs()}} {{nfp($totalGastos)}}</h3>

                                <p>Gastos</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-money-bill-wave"></i>
                            </div>
                            <a href="{{route('gastos.index')}}" class="small-box-footer">
                                Mas info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-secondary">
                            <div class="inner">
                                <h3>{{dvs()}} {{nfp($totalDia)}}</h3>

                                <p>Resumen Financiero</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-chart-pie"></i>
                            </div>
                            <a href="{{route('rpt.resumen')}}" class="small-box-footer">
                                Mas info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                @endif
            </div>
            <!-- /.row -->


            @if(Auth::user()->isAdmin() || Auth::user()->isAdminTienda())
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="grafica-ventas-dia" ></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div id="grafica-ventas-mes"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div id="grafica-ventas-anio"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            @endif
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

@push('scripts')
<script src="{{asset('plugins/chartjs/Chart.min.js')}}"></script>
<script src="{{asset('js/highcharts.js')}}"></script>
<script>
    $(function () {

        var optionsDia={
            chart: {
                renderTo: 'grafica-ventas-dia',
                backgroundColor:'rgba(255, 255, 255, 0.1)'
            },
            title: {
                text: 'Ventas por hora hoy {{diaLetras(\Carbon\Carbon::now()->dayOfWeek)}}',
            },
            subtitle: {
                text: 'Ventas por hora hoy {{diaLetras(\Carbon\Carbon::now()->dayOfWeek)}}',
                style: {
                    display: 'none'
                }
            },
            xAxis: {
                categories: [],
                title: {
                    text: 'dias del mes'
                },
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: '',
                    style: {
                        display: 'none'
                    }
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y} </b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'monto',
                data: []
            }]
        }

        $.ajax({
            method: 'GET',
            url: '{{route('graficas.ventas.dia')}}',
            dataType: 'json',
            success: function (res) {
                ///res = JSON.parse(res);
//                console.log('respuesta ajax:',res);
                var i=0;
                var monto=0;
                for(i=res.horaini;i<=res.horafin;i++){
                    monto= parseFloat(res.datos[i]);
                    optionsDia.series[0].data.push(monto);
                    optionsDia.xAxis.categories.push(i+':00');

                }

                chart = new Highcharts.Chart(optionsDia);

            },
            error: function (res) {
//                console.log('respuesta ajax:',res);

            }
        })

        var optionsMes={
            chart: {
                renderTo: 'grafica-ventas-mes',
                type: 'column',
                backgroundColor:'rgba(255, 255, 255, 0.1)'
            },
            title: {
                text: 'Ventas diarias de {{mesActualLtr()}}',
            },
            subtitle: {
                text: '',
                style: {
                    display: 'none'
                }
            },
            xAxis: {
                categories: [],
                title: {
                    text: 'dias del mes'
                },
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: '',
                    style: {
                        display: 'none'
                    }
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y} </b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'monto',
                data: []
            }]
        }

        $.ajax({
            method: 'GET',
            url: '{{route('graficas.ventas.mes')}}',
            dataType: 'json',
            success: function (res) {
                ///res = JSON.parse(res);
//                console.log('respuesta ajax:',res);
                var i=0;
                var monto=0;
                for(i=1;i<=res.diasmes;i++){
                    monto = parseFloat(res.datos[i]);
                    optionsMes.series[0].data.push(monto);
                    optionsMes.xAxis.categories.push(i);

                }

                chart = new Highcharts.Chart(optionsMes);

            },
            error: function (res) {
//                console.log('respuesta ajax:',res);

            }
        })

        var optionsAnio={
            chart: {
                renderTo: 'grafica-ventas-anio',
                type: 'column',
                backgroundColor:'rgba(255, 255, 255, 0.1)'
            },
            title: {
                text: 'Ventas mensuales de {{\Carbon\Carbon::now('America/Guatemala')->format('Y')}}',
            },
            subtitle: {
                text: '',
                style: {
                    display: 'none'
                }
            },
            xAxis: {
                categories: [],
                title: {
                    text: 'dias del mes'
                },
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: '',
                    style: {
                        display: 'none'
                    }
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y} </b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'monto',
                data: []
            }]
        }

        $.ajax({
            method: 'GET',
            url: '{{route('graficas.ventas.anio')}}',
            dataType: 'json',
            success: function (res) {
                ///res = JSON.parse(res);
//                console.log('respuesta ajax:',res);

                var meses =['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'];
                var i=0;
                var monto=0;
                for(i=1;i<=12;i++){
                    monto = parseFloat(res.datos[i]);
                    optionsAnio.series[0].data.push(monto);
                    optionsAnio.xAxis.categories.push(meses[i-1]);

                }

                chart = new Highcharts.Chart(optionsAnio);

            },
            error: function (res) {
//                console.log('respuesta ajax:',res);

            }
        })

  });
</script>
@endpush