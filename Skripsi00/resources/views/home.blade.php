@extends('layouts.main')

@section('content')
@include('includes.navbar')
    <!-- Content wrapper -->
    <div class="content-wrapper mt-2">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="mb-2 rounded-pill p-3 fw-bold">
                <div class="row">
                    <div class="col-lg-9 col-sm-9">
                        <a href="" class="text-primary p-2">
                            <i class="bx bx-home-circle"></i> Home
                        </a>
                    </div>
                    
                    <div class="col-lg-3 col-sm-3 text-center">
                        <div class="badge bg-danger text-white">
                            Today : 
                            <span id="timer"></span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ======== --}}
            <div class="card bg-light p-4">
                <div class="say-hello">
                    <div class="fw-bold">&#128512; Welcome <strong class="fs-3 text-primary fw-bold">Mr {{Auth::user()->nama_panggilan}}</strong></div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-8 mb-5">
                        <div class="card">
                            <img src="{{asset('frontends/assets/img/backgrounds/bg-home.jpg')}}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="d-flex flex-column">
                            <div class="text-center">
                                <strong class="badge bg-success">Statistic Data - Resolved <i class='bx bx-check-circle'></i></strong>
                            </div>
                            <div class="text-center">
                                <canvas id="myChart"></canvas>
                                <br>
                                <strong>{{$mon}}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-lg-5 col-md-5">
                    <div class="card bg-white shadow-sm p-4">
                        <div class="text-dark">
                            <div class="fw-bold badge bg-warning">Data Reports (Total <i class='bx bx-stopwatch'></i>)</div>
                            <div class="my-3">
                                <canvas id="myChartBar"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="card bg-dark shadow-sm p-4">
                        <div class="text-white">
                            <div class="fw-bold">Recent Activity</div>
                            <div class="my-3 activity-scroll">
                                <div class="row">
                                    <div class="col-lg-12">
                                       @include('commons.recent_activity');
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->
        <!-- Footer -->
        @include('includes.footer')
        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    
    var burner = <?php echo json_encode($burner)?>;
    var sbl = <?php echo json_encode($sbl)?>;
    var edg = <?php echo json_encode($edg)?>;
    var hp = <?php echo json_encode($hp)?>;
    var fp = <?php echo json_encode($fp)?>;
    var hsd = <?php echo json_encode($hsd)?>;
    var coc = <?php echo json_encode($coc)?>;
    var cob = <?php echo json_encode($cob)?>;
    var cot = <?php echo json_encode($cot)?>;

    const data = {
    labels: [
        'BURNER',
        'SOOTBLOWER',
        'HP PUMP',
        'FP PUMP',
        'HSD',
        'EDG',
        'CO TURBINE',
        'CO BOILER',
        'CO COMMON'
    ],
        datasets: [{
            label: 'Total',
            data: [burner, sbl, hp, fp,  hsd, edg, cot, cob, coc],
            backgroundColor: [
            'rgb(255, 99, 132)',
            '#ADADC7',
            'rgb(54, 162, 235)',
            'greenyellow',
            '#F9A602',
            'danger',
            '#48AAAD',
            '#AF69EE',
            'purple',
            'salmoon'
            ]
        }]
    };
    const config = {
        type: 'doughnut',
        data: data,
        options: {}
    };
</script>  

<script>
     // ===== CHART BAR
    var tot_e = <?php echo json_encode($tot_e)?>;
    var tot_f = <?php echo json_encode($tot_f)?>;
    var tot_g = <?php echo json_encode($tot_g)?>;
    var tot_h = <?php echo json_encode($tot_h)?>;
 
    const labels = ['SHIFT E','SHIFT F','SHIFT G','SHIFT H'];
    // const labels = Utils.months({count: 7});
    const data1 = {
    labels: labels,
    datasets: [{
        label: 'Total Report',
        data: [tot_e, tot_f, tot_g, tot_h],
        backgroundColor: [
            '#FFDF6A',
            '#11ABDF',
            '#D876D8',
            '#6EE29F'
        ],
        borderColor: [
            '#FFDF6A',
            '#11ABDF',
            '#D876D8',
            '#6EE29F',
        ],
        color: [
            'red',
            'white',
            'white',
            'white',
        ],
        borderWidth: 1
    }]
};
const config1 = {
    type: 'bar',
    data: data1,
    options: {
        scales: {
        y: {
            beginAtZero: true
        }
        }
    },
};
</script>


<script>
    const myChart = new Chart(
    document.getElementById('myChart'),
    config);    
</script>

<script>
    const myChartBar = new Chart(
    document.getElementById('myChartBar'),
    config1
);
</script>


@endsection

