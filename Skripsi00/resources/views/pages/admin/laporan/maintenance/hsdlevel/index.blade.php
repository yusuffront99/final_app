
@extends('layouts.main')

@section('content')
@include('includes.navbar')
    <!-- Content wrapper -->
    <div class="content-wrapper mt-2">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="mb-4 rounded-pill p-3 fw-bold">
                <div class="row">
                <div class="col-lg-8 col-sm-9">
                        <div class="p-2">
                            <a href="{{route('dashboard')}}" class="text-primary">
                                <i class='bx bxs-dashboard'></i> Dashboard
                            </a>
                            /
                            <a href="{{route('maintenance.index')}}" class="text-primary">
                                Maintenance
                            </a>
                            /
                            <span class="text-warning mx-2">
                                Sootblower System
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
            <hr>
            <div class="text-center">
                
            </div>
            <div class="my-3">
                <div class="card shadow-sm p-3 bg-light">
                    <div class="row">
                        <div class="d-flex justify-content-between mb-2">
                            <div class="d-flex justify-content-between">
                                <div class="mx-1">
                                    <a href="{{route('maintenance.index')}}" class="btn btn-sm btn-primary rounded-pill"><i class='bx bx-left-arrow-circle'></i> Back</a>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="m-1">
                        <div class="alert alert-warning fw-bold">
                        <h3 class="fw-bold badge bg-warning rounded"><i class='bx bxs-alarm-exclamation'></i> Perhatian </h3><br>
                        <div style="font-style: italic;">
                        1. Data Laporan yang muncul pada tabel adalah data yang BELUM ditambahkan rincian DETAIL BIAYA pemeliharaan, silakan <small class="badge bg-danger">BUAT RINCIAN <i class='bx bxs-down-arrow-circle'></i></small><br>
                        2. Data Laporan pada Tabel akan <small class="badge bg-warning fw-bold">OTOMATIS HILANG</small> dalam kurun waktu 1 minggu <br>
                        3. Data Laporan yang baru selesai diperbaiki (RESOLVED) akan berwarna <small class="badge bg-success fw-bold">HIIJAU</small> pada baris tabel EQUIPMENT REPAIR DATA <br>
                        4. Data <small class="badge bg-warning fw-bold">BIAYA PEMELIHARAAN KERUSAKAN PERALATAN</small> akan masuk ke Halaman, silakan klik <small><a class="badge bg-primary fw-bold" href="{{route('maintenance.histories')}}"><i class='bx bx-link'></i> REPAIR HISTORY DATA</a></small>
                        </div>
                        </div>
                        </div>
                        @include('commons.validasi_success_update')

                        <table id="example" class="table table-striped my-3" style="width:100%">
                        <div class="m-auto">
                        <span class="badge bg-primary p-3 fw-bold rounded mb-4" style="width: 100%">EQUIPMENT REPAIR DATA - HIGH SPEED DIESEL GENERATOR</span>
                        </div>
                       
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th class="op-1 text-center">Aksi</th>
                                <th class="op-1 text-center">Repair Code</th>
                                <th class="op-1">Nama Operator</th>
                                <th class="common-info">Supervisor</th>
                                <th class="tgl-col">Shift</th>
                                <th class="tgl-col">Tanggal Update</th>
                                <th class="tgl-col">Kondisi Peralatan</th>
                                <th class="common-info text-center">Storage Level</th>
                                <th class="common-info text-center">Daily Level</th>
                                <th class="common-info text-center">Info HSD Level</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($weekly_data as $dt)
                               @if (Carbon\carbon::createFromFormat('Y-m-d H:i:s', $dt->updated_at)->format('d-m-Y') == $today)
                               <tr style="background-color: #E2F6CA;">
                                    <td>{{$no++;}}</td>
                                    <td>                            
                                        <a href="javascript:void(0)" data-id="{{$dt->id}}" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-sm btn-success" id="create_detail" ><i class='bx bx-dollar-circle'></i> Buat Rincian</a>
                                    </td>
                                    <td><div class="badge bg-danger"><?php echo substr($dt->id, 0, 8)?></div></td>
                                    <td>{{$dt->users->nama_lengkap}}</td>
                                    <td>{{$dt->users->atasan}}</td>
                                    <td>{{$dt->operator_shift}}</td>
                                    <td>{{$dt->created_at}}</td>
                                    <td class="text-center">
                                        @if ($dt->status == 'Normal')
                                            <div class="badge bg-success">{{$dt->status}}</div>
                                        @else
                                            <div class="badge bg-danger">{{$dt->status}}</div>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                    @if ($dt->storage_level >= 3.50)
                                        <div class="text-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Level Normal">{{$dt->storage_level}} <i class='bx bxs-up-arrow-circle'></i></div>
                                    @else
                                        <div class="text-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Level Low">{{$dt->storage_level}} / m<sup>3</sup> <i class='bx bxs-down-arrow-circle'></i></div>
                                    @endif
                                    </td>
                                    <td class="text-center">
                                    @if ($dt->daily_level >= 2.00)
                                        <div class="text-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Level Normal">{{$dt->daily_level}} / m<sup>3</sup> <i class='bx bxs-up-arrow-circle'></i></div>
                                    @else
                                        <div class="text-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Level Low">{{$dt->daily_level}} / m<sup>3</sup> <i class='bx bxs-down-arrow-circle'></i></div>
                                    @endif
                                    </td>
                                    <td>{!!$dt->info_hsd!!}</td>
                                    <td>
                                        @include('commons.report_status')
                                    </td>
                                </tr>
                               @else
                               <tr>
                                    <td>{{$no++;}}</td>
                                    <td>                            
                                        <a href="javascript:void(0)" data-id="{{$dt->id}}" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-sm btn-success" id="create_detail" ><i class='bx bx-dollar-circle'></i> Buat Rincian</a>
                                    </td>
                                    </td>
                                    <td>{{$dt->users->nama_lengkap}}</td>
                                    <td>{{$dt->users->atasan}}</td>
                                    <td>{{$dt->operator_shift}}</td>
                                    <td>{{$dt->created_at}}</td>
                                    <td class="text-center">
                                        @if ($dt->status == 'Normal')
                                            <div class="badge bg-success">{{$dt->status}}</div>
                                        @else
                                            <div class="badge bg-danger">{{$dt->status}}</div>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                    @if ($dt->storage_level >= 3.50)
                                        <div class="text-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Level Normal">{{$dt->storage_level}} <i class='bx bxs-up-arrow-circle'></i></div>
                                    @else
                                        <div class="text-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Level Low">{{$dt->storage_level}} / m<sup>3</sup> <i class='bx bxs-down-arrow-circle'></i></div>
                                    @endif
                                    </td>
                                    <td class="text-center">
                                    @if ($dt->daily_level >= 2.00)
                                        <div class="text-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Level Normal">{{$dt->daily_level}} / m<sup>3</sup> <i class='bx bxs-up-arrow-circle'></i></div>
                                    @else
                                        <div class="text-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Level Low">{{$dt->daily_level}} / m<sup>3</sup> <i class='bx bxs-down-arrow-circle'></i></div>
                                    @endif
                                    </td>
                                    <td>{!!$dt->info_hsd!!}</td>
                                    <td>
                                        @include('commons.report_status')
                                    </td>
                                </tr>
                               @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="text"></div>
        <!-- / Content -->

        <!-- Footer -->
        @include('includes.footer')
        <!-- / Footer -->
    <!-- / Layout page -->
@endsection

@include('commons.modals.hsdlevel_create_maintenace')
<!-- Button trigger modal -->

@push('add-script')
<script>
    $(document).ready(function(){
        $('#example').DataTable({
                scrollY: 300,
                scrollX: true,
            });
    });
</script>
@endpush