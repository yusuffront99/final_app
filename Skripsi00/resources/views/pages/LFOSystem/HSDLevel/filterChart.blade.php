@extends('layouts.main')

@section('content')
@include('includes.navbar')
<!-- Content wrapper -->
<div class="content-wrapper mt-2">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="mb-1 rounded-pill p-3 fw-bold">
            <div class="row">
                <div class="col-lg-8 col-sm-9">
                    <div class="p-2">
                        <a href="{{route('home')}}" class="text-primary">
                            <i class="bx bx-home-circle"></i> Home
                        </a>
                        /
                        <span class="text-primary mx-2">
                            LFO System
                        </span>
                        /
                        <span class="text-warning mx-2">
                            HSD Level / Line Chart
                        </span>
                    </div>
                </div>
                                
                <div class="col-lg-3 col-sm-3 text-center">
                    <div class="badge bg-danger text-white">
                        Today : 
                        <span id="timer"></span>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="card bg-dark p-3">
                <div class="p-2">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex justify-content-around">
                            <div class="mb-2">
                                <a href="{{route('hsd_level.index')}}" class="btn btn-sm btn-primary rounded-pill"><i class='bx bx-left-arrow-circle'></i> Back</a>
                            </div>
                        </div>
                        <div class="">
                            <div class="">
                                <a href="" class="btn btn-sm btn-primary">{{Carbon\carbon::createFromFormat('Y-m-d', $dateNow)->isoFormat('D MMMM Y')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="my-2">
                    <div class="my-2">
                        <form action="{{route('hsd_level.chart')}}" method="GET">
                            <select name="monFilter" id="">
                                <option value="today">Today</option>
                                <option value="last_month">Last Month</option>
                            </select>
                            <button type="submit">click</button>
                        </form>
                    </div>
                    <div id="chart-hsd"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    @include('includes.footer')
    <!-- / Footer -->
@endsection

@push('add-script')
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
    let storages ={{Js::from($storages)}};
    let dailies = {{Js::from($dailies)}};
    let date = {{Js::from($date)}};

    Highcharts.chart('chart-hsd', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Daily HSD Level'
    },
    subtitle: {
        text: 'Daily Updated - Line Chart Level'
    },
    xAxis: {
        categories: date
    },
    yAxis: {
        title: {
            text: 'Level (m<sup>3</sup>)'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: true
        }
    },
    series: [{
        name: 'Storage Level',
        data: storages,
    }, {
        name: 'Daily Level',
        data: dailies
    }]
});
</script>
@endpush