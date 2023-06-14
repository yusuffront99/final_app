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
                            <!--  -->
                        </div>
                    </div>
                </div>
                <hr>
                <!--  -->
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
    <!-- Footer -->
    @include('includes.footer')
    <!-- / Footer -->
@endsection

@push('add-script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('frontends/assets/js/app.js') }}" defer></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($labels) !!},
                    datasets: [{
                        label: 'Data Set 1',
                        data: {!! json_encode($data) !!},
                        backgroundColor: 'rgba(0, 123, 255, 0.5)',
                        borderColor: 'rgba(0, 123, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {}
            });
        });
</script>
@endpush