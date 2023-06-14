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
                                <strong>Statistic Report</strong>
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
                            <div class="fw-bold">Statistic Report</div>
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
                                        <table class="table">
                                            <tr>
                                                @foreach ($db as $db)
                                                <td width="10%">
                                                    @if ($db->users->profile_img == '-')
                                                        <img src="{{asset('frontends/assets/img/avatars/profile.jpg')}}" alt class="w-px-40 h-auto rounded-circle" />
                                                    @else
                                                        <img src="{{asset('storage/' . $db->users->profile_img)}}" alt class="w-px-40 h-auto rounded-circle" />
                                                    @endif
                                                </td>
                                                <td>
                                                    <small class="text-primary fw-bold">{{$db->users->nama_panggilan}}</small>
                                                    <br>
                                                    <small class="text-white">telah membuat laporan <strong class="text-danger">Burner</strong> {{$db->created_at->diffForHumans()}}</small>
                                                </td>
                                                @endforeach
                                            </tr>
                                            {{-- <tr>
                                                @foreach ($dl as $dl)
                                                <td width="10%">
                                                    @if ($dl->users->profile_img == '-')
                                                        <img src="{{asset('frontends/assets/img/avatars/profile.png')}}" alt class="w-px-40 h-auto rounded-circle" />
                                                    @else
                                                        <img src="{{asset('storage/' . $dl->users->profile_img)}}" alt class="w-px-40 h-auto rounded-circle" />
                                                    @endif
                                                </td>
                                                <td>
                                                    <small class="text-primary fw-bold">{{$dl->users->nama_panggilan}}</small>
                                                    <br>
                                                    <small class="text-white">telah membuat laporan <strong class="text-danger">LFO</strong> {{$dl->created_at->diffForHumans()}}</small>
                                                </td>
                                                @endforeach
                                            </tr> --}}
                                            <tr>
                                                @foreach ($de as $de)
                                                <td width="10%">
                                                    @if ($de->users->profile_img == '-')
                                                        <img src="{{asset('frontends/assets/img/avatars/profile.jpg')}}" alt class="w-px-40 h-auto rounded-circle" />
                                                    @else
                                                        <img src="{{asset('storage/' . $de->users->profile_img)}}" alt class="w-px-40 h-auto rounded-circle" />
                                                    @endif
                                                </td>
                                                <td>
                                                    <small class="text-primary fw-bold">{{$de->users->nama_panggilan}}</small>
                                                    <br>
                                                    <small class="text-white">telah membuat laporan <strong class="text-danger">EDG</strong> {{$de->created_at->diffForHumans()}}</small>
                                                </td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                @foreach ($dcot as $dcot)
                                                <td width="10%">
                                                    @if ($dcot->users->profile_img == '-')
                                                        <img src="{{asset('frontends/assets/img/avatars/profile.jpg')}}" alt class="w-px-40 h-auto rounded-circle" />
                                                    @else
                                                        <img src="{{asset('storage/' . $dcot->users->profile_img)}}" alt class="w-px-40 h-auto rounded-circle" />
                                                    @endif
                                                </td>
                                                <td>
                                                    <small class="text-primary fw-bold">{{$dcot->users->nama_panggilan}}</small>
                                                    <br>
                                                    <small class="text-white">telah membuat laporan <strong class="text-danger">Change Over Peralatan Turbine</strong> {{$dcot->created_at->diffForHumans()}}</small>
                                                </td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                @foreach ($dcob as $dcob)
                                                <td width="10%">
                                                    @if ($dcob->users->profile_img == '-')
                                                        <img src="{{asset('frontends/assets/img/avatars/profile.jpg')}}" alt class="w-px-40 h-auto rounded-circle" />
                                                    @else
                                                        <img src="{{asset('storage/' . $dcob->users->profile_img)}}" alt class="w-px-40 h-auto rounded-circle" />
                                                    @endif
                                                </td>
                                                <td>
                                                    <small class="text-primary fw-bold">{{$dcob->users->nama_panggilan}}</small>
                                                    <br>
                                                    <small class="text-white">telah membuat laporan <strong class="text-danger">Change Over Peralatan Boiler</strong> {{$dcob->created_at->diffForHumans()}}</small>
                                                </td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                @foreach ($dcoc as $dcoc)
                                                <td width="10%">
                                                    @if ($dcoc->users->profile_img == '-')
                                                        <img src="{{asset('frontends/assets/img/avatars/profile.jpg')}}" alt class="w-px-40 h-auto rounded-circle" />
                                                    @else
                                                        <img src="{{asset('storage/' . $dcoc->users->profile_img)}}" alt class="w-px-40 h-auto rounded-circle" />
                                                    @endif
                                                </td>
                                                <td>
                                                    <small class="text-primary fw-bold">{{$dcoc->users->nama_panggilan}}</small>
                                                    <br>
                                                    <small class="text-white">telah membuat laporan <strong class="text-danger">Change Over Peralatan Common</strong> {{$dcoc->created_at->diffForHumans()}}</small>
                                                </td>
                                                @endforeach
                                            </tr>
                                        </table>
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
    
    var burner = {{Js::from($burner)}}
    var edg = {{Js::from($edg)}}
    var cot = {{Js::from($cot)}}
    var cob = {{Js::from($cob)}}
    var coc = {{Js::from($coc)}}

    const data = {
    labels: [
        'BURNER',
        'EDG',
        'CO TURBINE',
        'CO BOILER',
        'CO COMMON'
    ],
        datasets: [{
            label: 'Total',
            data: [burner, edg, cot, cob, coc],
            backgroundColor: [
            'rgb(255, 99, 132)',
            // 'rgb(255, 205, 86)',
            'rgb(54, 162, 235)',
            'greenyellow',
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
    var tot_e = {{Js::from($tot_e)}}
    var tot_f = {{Js::from($tot_f)}}
    var tot_g = {{Js::from($tot_g)}}
    var tot_h = {{Js::from($tot_h)}}

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

