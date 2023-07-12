@extends('layouts.main')

@section('content')


    <!-- Content wrapper -->
    <div class="content-wrapper mt-2">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="mb-2 rounded-pill p-3 fw-bold">
                <div class="row">
                    <div class="col-lg-8 col-sm-9">
                        <div class="p-2">
                            <a href="" class="text-primary">
                                <i class="bx bx-home-circle"></i> Home
                            </a>
                            /
                            <span class="text-warning mx-2">
                                Data Laporan
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
            
            <div class="">
                <div class="card px-4">
                    <br>
                    <strong class="text-center mb-4 mt-2 fs-5">DATA LAPORAN <hr></strong>
                    
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 mb-2">
                            <div class="p-2 shadow-sm bg-danger rounded card-item text-center text-white">
                                <strong>Burner System</strong>
                                <i class='bx bxs-hot'></i>
                                <div class="fs-3 fw-bold">{{$burner}}</div>
                                <small><a href="{{route('laporan.all_data_burner')}}" class="text-white fw-bold"><u>See Data</u> <i class='bx bx-chevrons-right'></i></a></small>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 mb-2">
                            <div class="p-2 shadow-sm bg-warning rounded card-item text-center text-white">
                                <strong>Light Fuel Oil</strong>
                                
                                <i class='bx bx-gas-pump'></i>
                                <div class="fs-3 fw-bold">{{$lfo}}</div>
                                <small><a href="{{route('laporan.all_data_lfo')}}" class="text-white fw-bold"><u>See Data</u> <i class='bx bx-chevrons-right'></i></a></small>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                            <div class="p-2 shadow-sm bg-success rounded card-item text-center text-white">
                                <strong>Emegency Diesel</strong>
                                <i class='bx bxs-battery-charging'></i>
                                <div class="fs-3 fw-bold">{{$edg}}</div>
                                <small><a href="{{route('laporan.all_data_edg')}}" class="text-white fw-bold"><u>See Data</u> <i class='bx bx-chevrons-right'></i></a></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        @include('includes.footer')
        <!-- / Footer -->
    <!-- / Layout page -->
@endsection

@push('add-script')
<script>
    $(document).ready(function(){
        $('#example').DataTable({
                scrollY: 100,
                scrollX: true,
            });
    });
</script>
@endpush

