@extends('layouts.main')

@section('content')
@include('includes.navbar')
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="rounded-pill p-3 fw-bold">
            <div class="row">
                <div class="col-lg-8 col-sm-9">
                    <div class="p-2">
                        <a href="" class="text-primary">
                            <i class='bx bxs-dashboard'></i> Dashboard
                        </a>
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

      
        <div class="card bg-light p-2">
            <small class="p-2 fs-6 fw-bold text-primary">DATA INFORMASI & STATISTIK </small>
            <hr>
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-4 mb-2">
                            <div class="shadow-sm p-2 text-center border border-danger">
                                <small class="bg-danger py-1 px-3 text-white rounded-pill"><i class='bx bxs-hot' ></i> Burner System</small><br>
                                <strong class="my-4">Total Laporan</strong>
                                <div class="text-primary text-center my-2">
                                    <h2 class="text-danger"> {{$perbun}}%</h2>
                                    <small class="bg-danger py-1 px-4 text-white rounded-pill fw-bold">{{$pb}}</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mb-2">
                            <div class="shadow-sm p-2 text-center border border-primary">
                                <small class="bg-primary py-1 px-3 text-white rounded-pill"><i class='bx bxs-car-battery'></i> EDG System</small><br>
                                <strong class="my-4">Total Laporan</strong>
                                <div class="text-primary text-center my-2">
                                    <h2 class="text-primary"> {{$perbun}} %</h2>
                                    <small class="bg-primary py-1 px-4 text-white rounded-pill fw-bold">{{$pe}}</small>
                                </div>
                            </div>
                        </div>   

                        <div class="col-lg-4 mb-2">
                            <div class="shadow-sm p-2 text-center border border-warning">
                                <small class="bg-warning py-1 px-3 text-white rounded-pill text-white"><i class='bx bxl-steam' ></i> Sootblower System</small><br>
                                <strong class="my-4">Total Laporan</strong>
                                <div class="text-warning text-center my-2">
                                    <h2 class="text-warning"> {{$percob}} %</h2>
                                    <small class="bg-warning py-1 px-4 text-white rounded-pill fw-bold">{{$pcob}}</small>
                                </div>
                            </div>
                        </div>

                        <!-- ============= -->
                        
                        <div class="col-lg-4 mb-2">
                            <div class="shadow-sm p-2 text-center border border-success">
                                <small class="bg-success py-1 px-3 text-white rounded-pill text-white"><i class='bx bx-wind'></i> CO Turbine</small><br>
                                <strong class="my-4">Total Laporan</strong>
                                <div class="text-success text-center my-2">
                                    <h2 class="text-success"> {{$percot}} %</h2>
                                    <small class="bg-success py-1 px-4 text-white rounded-pill fw-bold">{{$pcot}}</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mb-2">
                            <div class="shadow-sm p-2 text-center border border-success">
                                <small class="bg-success py-1 px-3 text-white rounded-pill text-white"><i class='bx bx-wind'></i> CO Boiler</small><br>
                                <strong class="my-4">Total Laporan</strong>
                                <div class="text-success text-center my-2">
                                    <h2 class="text-success"> {{$percob}} %</h2>
                                    <small class="bg-success py-1 px-4 text-white rounded-pill fw-bold">{{$pcot}}</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mb-2">
                            <div class="shadow-sm p-2 text-center border border-success">
                                <small class="bg-success py-1 px-3 text-white rounded-pill text-white"><i class='bx bx-wind'></i> CO Common</small><br>
                                <strong class="my-4">Total Laporan</strong>
                                <div class="text-success text-center my-2">
                                    <h2 class="text-success"> {{$percoc}} %</h2>
                                    <small class="bg-success py-1 px-4 text-white rounded-pill fw-bold">{{$pcot}}</small>
                                </div>
                            </div>
                        </div>

                        <!-- =================== -->

                        <div class="col-lg-4 mb-2">
                            <div class="shadow-sm p-2 text-center" style="border: 1px solid plum">
                                <small style="background: plum" class="py-1 px-3 text-white rounded-pill text-white"><i class='bx bx-hive'></i> HSD Level</small><br>
                                <strong class="my-4">Total Laporan</strong>
                                <div style="color: plum" class="text-center my-2">
                                    <h2 style="color: plum"> {{$perhsd}} %</h2>
                                    <small class="py-1 px-4 text-white rounded-pill fw-bold" style="background: plum">{{$phsd}}</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <div class="shadow-sm p-2 text-center" style="border: 1px solid plum">
                                <small style="background: plum" class="py-1 px-3 text-white rounded-pill text-white"><i class='bx bx-hive'></i> Forwarding Pump</small><br>
                                <strong class="my-4">Total Laporan</strong>
                                <div style="color: plum" class="text-center my-2">
                                    <h2 style="color: plum"> {{$perfp}} %</h2>
                                    <small class="py-1 px-4 text-white rounded-pill fw-bold" style="background: plum">{{$pfp}}</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <div class="shadow-sm p-2 text-center" style="border: 1px solid plum">
                                <small style="background: plum" class="py-1 px-3 text-white rounded-pill text-white"><i class='bx bx-hive'></i> High Pressure Pump</small><br>
                                <strong class="my-4">Total Laporan</strong>
                                <div style="color: plum" class="text-center my-2">
                                    <h2 style="color: plum"> {{$perhp}} %</h2>
                                    <small class="py-1 px-4 text-white rounded-pill fw-bold" style="background: plum">{{$php}}</small>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <canvas id="myChart" height="100px"></canvas>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-6">
                <div class="shadow-sm p-3 mb-1 bg-white rounded">
                    <h5 class="fw-bold">Supervisor Operasi</h5>
                    <hr>
                    @foreach ($spv_op as $user)
                    <div class="d-flex flex-column mb-3">
                        <div class="px-2">
                            <div class="d-flex justify-content-start">
                                <div class="">
                                    @if ($user->profile_img == '-')
                                        <img src="{{asset('frontends/assets/img/avatars/profile.jpg')}}" alt class="w-px-40 h-auto rounded-circle" />
                                    @else
                                        <img src="{{asset('storage/' . $user->profile_img)}}" alt class="w-px-40 h-auto rounded-circle" />
                                    @endif
                                </div>
                                <div class="mx-2">
                                    <small class="p-1 px-2 bg-success rounded-pill text-white">{{$user->nama_lengkap}} <i class='bx bx-badge-check'></i></small>
                                    <br>
                                    <small class="fw-bold">{{$user->jabatan}} / {{$user->tim_divisi}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6 mb-2">
                <div class="shadow-sm p-3 mb-1 bg-dark text-white rounded">
                    <h5 class="fw-bold text-white">Supervisor Pemeliharaan</h5>
                    <hr>
                    @foreach ($spv_har as $user)
                    <div class="d-flex flex-column mb-3">
                        <div class="px-2">
                            <div class="d-flex justify-content-start">
                                <div class="">
                                    @if ($user->profile_img == '-')
                                        <img src="{{asset('frontends/assets/img/avatars/profile.jpg')}}" alt class="w-px-40 h-auto rounded-circle" />
                                    @else
                                        <img src="{{asset('storage/' . $user->profile_img)}}" alt class="w-px-40 h-auto rounded-circle" />
                                    @endif
                                </div>
                                <div class="mx-2">
                                    <small class="p-1 px-2 bg-success rounded-pill text-white">{{$user->nama_lengkap}} <i class='bx bx-badge-check'></i></small>
                                    <br>
                                    <small class="fw-bold">{{$user->jabatan}} / {{$user->tim_divisi}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @endforeach
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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var wr = <?php echo json_encode($wr)?>;
    var fr = <?php echo json_encode($fr)?>;
    var wmr = <?php echo json_encode($wmr)?>;
    var wor = <?php echo json_encode($wor)?>;
    var wrs = <?php echo json_encode($wrs)?>;
    var rr = <?php echo json_encode($rr)?>;

    var contents = [wr,fr,wmr,wor,wrs,rr];

    // const labels = Utils.months({count: 7});
    const data = {
    labels: ['Waiting Approval', 'forwarding', 'waiting material', 'working', 'resolved','rejected'],
    datasets: [
        {
        label: 'Total',
        data: contents,
     
        }
    ]
};
const config = {
  type: 'pie',
  data: data,
  options: {
    responsive: true,
    plugins: {
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'Statistik Laporan'
      }
    }
  },
};
</script>
<script>
    var myChart = new Chart(
    document.getElementById('myChart'),
    config);    
</script>
@endsection

