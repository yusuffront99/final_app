@extends('layouts.main')

@section('content')
@include('includes.navbar')
    <!-- Content wrapper -->
    <div class="content-wrapper mt-2">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="mb-2 rounded-pill p-3 fw-bold">
                <div class="row">
                    <div class="col-lg-8 col-sm-9">
                        <div class="p-2">
                            <a href="{{route('home')}}" class="text-primary">
                                <i class="bx bx-home-circle"></i> Home
                            </a>
                            /
                            <span class="text-warning mx-2">
                                Burner System
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
            
            <div class="my-2">
                <div class="card p-3">
                    
                    {{-- ROW NOTIFS --}}
                    @include('commons.row_notifs_op')
                    {{-- ROW NOTIFS --}}

                    @include('commons.validasi_success_update')

                    <div class="row">
                            <div class="row py-3 rounded m-auto">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card bg-secondary text-white p-3">
                                        <div class="d-flex justify-content-between">
                                            @if ($data->count() > 0)
                                                <small><i class='bx bxs-bell-ring text-warning fs-3' data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Waiting Report"></i>
                                                <strong id="bell-waiting">{{$data->count()}}</strong>
                                                </small>
                                                @else
                                                <small><i class='bx bxs-bell-ring text-white fs-3'></i>
                                                <strong id="bell-waiting">{{$data->count()}}</strong>
                                                </small>
                                                @endif
                                            
                                            <small><i class='bx bxs-calendar'></i> {{$mon}}</small>
                                        </div>
                                        <br>

                                        
                                        
                                        <table class="scroll table-striped">
                                            @forelse ($data as $dt)
                                            <thead class="text-center">
                                                <tr>
                                                    <th id="th-col" width="15%">Action</th>
                                                    <th id="th-col">Keterangan</th>
                                                    <th id="th-col" width="15%">Status</th>
                                                </tr>
                                            </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center">
                                                            @if ($dt->status_equipments->status_name == 'Waiting')
                                                                <a href="{{route('op.burner_validation', $dt->id)}}" class="text-primary"><i class="bx bx-edit fs-3"></i></a>
                                                            @elseif ($dt->status == 'Rejected')
                                                                <h1 class="text-danger text-center" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Status Rejected"><i class='bx bx-x-circle fs-3'></i></h1>
                                                            @else
                                                                -
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <small class="bg-warning rounded-pill px-2 py-1">{{Carbon\carbon::createFromFormat('Y-m-d', $dt->tanggal_update)->format('d-m-Y')}}</small>
                                                            <small class="bg-primary rounded-pill px-2 py-1">{{$dt->operator_shift}}</small>
                                                            
                                                            <div class="mt-4">
                                                                <div class="row">
                                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                                        <div class="px-2">
                                                                            <strong class="text-success">Burner 1</strong>
                                                                            
                                                                            <p>
                                                                            @if ($dt->status_burner1 == 'Ready')
                                                                                Status : <span class="badge bg-success rounded-pill">{{$dt->status_burner1}}</span>
                                                                            @else
                                                                                Status : <span class="badge bg-danger rounded-pill">{{$dt->status_burner1}}</span>
                                                                            @endif
                                                                            <br>
                                                                            Informasi :
                                                                            - {{$dt->ket_burner1}}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                                        <div class="px-2">
                                                                            <strong class="text-success">Burner 2</strong>
                                                                            
                                                                            <p>
                                                                                @if ($dt->status_burner2 == 'Ready')
                                                                                    Status : <span class="badge bg-success rounded-pill">{{$dt->status_burner2}}</span>
                                                                                @else
                                                                                    Status : <span class="badge bg-danger rounded-pill">{{$dt->status_burner2}}</span>
                                                                                @endif
                                                                                <br>
                                                                                Informasi :
                                                                                - {{$dt->ket_burner2}}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                                        <div class="px-2">
                                                                            <strong class="text-success">Burner 3</strong>
                                                                            
                                                                            <p>
                                                                                @if ($dt->status_burner3 == 'Ready')
                                                                                    Status : <span class="badge bg-success rounded-pill">{{$dt->status_burner3}}</span>
                                                                                @else
                                                                                    Status : <span class="badge bg-danger rounded-pill">{{$dt->status_burner3}}</span>
                                                                                @endif
                                                                                <br>
                                                                                Informasi :
                                                                                - {{$dt->ket_burner3}}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                                        <div class="px-2">
                                                                            <strong class="text-success">Burner 4</strong>
                                                                            
                                                                            <p>
                                                                                @if ($dt->status_burner4 == 'Ready')
                                                                                    Status : <span class="badge bg-success rounded-pill">{{$dt->status_burner4}}</span>
                                                                                @else
                                                                                    Status : <span class="badge bg-danger rounded-pill">{{$dt->status_burner4}}</span>
                                                                                @endif
                                                                                <br>
                                                                                Informasi :
                                                                                - {{$dt->ket_burner4}}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            @include('commons.report_status')
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            @empty
                                                <tbody>
                                                    <tr>
                                                        <div class="text-center">
                                                            Tidak Ada Laporan Masuk
                                                        </div>
                                                    </tr>
                                                </tbody>
                                            @endforelse
                                        </table>
                                        <a href="{{route('op.all_burner_validation')}}" class="btn btn-primary text-white btn-sm rounded-pill btn-view mt-3">see all <i class='bx bxs-right-arrow-circle'></i></a>
                                    </div>
                                </div>
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

            setTimeout(() => {
            $('.notif-updated').hide();
        }, 1000);
    });
</script>
@endpush

