@extends('layouts.AdminLTE.index')

@section('icon_page', 'dashboard')

@section('title', 'Tổng quan ')

{{--@section('menu_pagina')--}}

@section('content')
    <div class="row">
        <div class="col-md-4">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ $statistical['user'] ?? 0 }}</h3>

                    <p>Người dùng</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ $statistical['course'] ?? 0 }}</h3>

                    <p>Khóa học</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-md-4">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ $statistical['userCourse'] ?? 0 }}</h3>

                    <p>Số lượng người dùng tham gia khóa học</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->

    <div>
        <!-- Custom tabs (Charts with tabs)-->
        <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
{{--            <ul class="nav nav-tabs pull-right">--}}
{{--                <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>--}}
{{--                <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>--}}
{{--                <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>--}}
{{--            </ul>--}}
            <div class="tab-content no-padding">
                <!-- Morris chart - Sales -->
{{--                <div class="chart tab-pane active" id="revenue-chart"--}}
{{--                     style="position: relative; height: 300px;"></div>--}}
{{--                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>--}}

{{--                <canvas id="barChartCourse" height="300" width="500"></canvas>--}}


            </div>
            <canvas id="myChart2" height="300" width="500"></canvas>
        </div>
        <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.row -->
@endsection

@section('layout_js')
    <script type="text/javascript">
        let myChart = document.getElementById("myChart2").getContext("2d");

        let massPopChart = new Chart(myChart, {
            type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
            data: {
                labels: @json($chartCourse['labels']),
                datasets: [{
                    label: '# of Votes',
                    data: @json($chartCourse['data']),
                    backgroundColor: @json($chartCourse['backgroundColor']),
                    borderColor: @json($chartCourse['borderColor']),
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
