
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
                            <div class="row">
                                <div class="mx-1">
                                    <a href="" class="btn btn-sm btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#exampleModal" id="create-maintenance"><i class='bx bx-plus'></i> Buat Rincian</a>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="m-1">
                        <div class="alert alert-warning fw-bold">
                        <h3 class="fw-bold badge bg-warning rounded"><i class='bx bxs-alarm-exclamation'></i> Perhatian </h3><br>
                        <div style="font-style: italic;">
                        1. Data Laporan yang muncul pada tabel adalah data yang BELUM ditambahkan rincian DETAIL BIAYA pemeliharaan, silakan <div class="badge bg-danger">BUAT RINCIAN <i class='bx bx-right-top-arrow-circle'></i></div><br>
                        2. Data List Laporan akan OTOMATIS HILANG dari tabel dalam kurun waktu 1 minggu <br>
                        3. Data Laporan yang baru selesai MAINTENANCE (RESOLVED) akan berindikasi warna HIIJAU pada baris tabel EQUIPMENT REPAIR DATA <br>
                        4. Data Laporan DETAIL BIAYA PEMELIHARAAN KERUSAKAN PERALATAN akan masuk ke Halaman, silakan klik <small><a class="badge bg-primary" href="{{route('maintenance.histories')}}"><i class='bx bx-link'></i> REPAIR HISTORY DATA</a></small>
                        </div>
                        </div>
                        </div>
                        @include('commons.validasi_success_update')


                        
                        <table id="example" class="table table-striped my-3" style="width:100%">
                        <div class="m-auto">
                        <span class="badge bg-primary p-3 fw-bold rounded mb-4" style="width: 100%">EQUIPMENT REPAIR DATA - BURNER SYSTEM</span>
                        </div>
                       
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th class="common-info">Repair Code</th>
                                <th class="common">NIP</th>
                                <th class="op-1">Operator I</th>
                                <th class="op-2">Operator II</th>
                                <th class="op-1">Supervisor</th>
                                <th class="tgl-col">Shift</th>
                                <th class="tgl-col">Updated Date</th>
                                <th class="jam-col">Updated Time</th>
                                <th class="unit-col">Unit</th>
                                <th class="common-info">Burner 1</th>
                                <th class="common-info">Burner 2</th>
                                <th class="common-info">Burner 3</th>
                                <th class="common-info">Burner 4</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($weekly_data as $dt)
                              @if ($today == Carbon\carbon::createFromFormat('Y-m-d H:i:s', $dt->updated_at)->format('d-m-Y'))
                              <tr class="border border-danger" style="background-color: #cfffcf;">
                                    <td>{{$no++;}}</td>
                                    <td><div class="badge bg-danger"><?php echo substr($dt->id, 0, 8)?></div></td>
                                    <td>{{$dt->nip}}</td>
                                    <td>{{$dt->users->nama_lengkap}}</td>
                                    <td>{{$dt->operator_kedua}}</td>
                                    <td>{{$dt->atasan}}</td>
                                    <td>{{$dt->operator_shift}}</td>
                                    <td>{{Carbon\carbon::createFromFormat('Y-m-d', $dt->tanggal_update)->format('d-m-Y')}}</td>
                                    <td>{{$dt->jam_update}}</td>
                                    <td>
                                        @if ($dt->unit == 'Unit 3')
                                            <span class="badge bg-success rounded">{{$dt->unit}}</span>
                                        @else
                                            <span class="badge bg-danger rounded">{{$dt->unit}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($dt->status_burner1 == 'Ready')
                                            <span class="badge bg-success rounded-pill">Ready</span>
                                        @else
                                            <span class="badge bg-danger rounded-pill">Not Ready</span>
                                        @endif
                                        <br>
                                        - <small>{{$dt->ket_burner1}}</small>
                                    </td>
                                    <td>
                                        @if ($dt->status_burner2 == 'Ready')
                                            <span class="badge bg-success rounded-pill">Ready</span>
                                        @else
                                            <span class="badge bg-danger rounded-pill">Not Ready</span>
                                        @endif
                                        <br>
                                        - <small>{{$dt->ket_burner2}}</small>
                                    </td>
                                    <td>
                                        @if ($dt->status_burner3 == 'Ready')
                                            <span class="badge bg-success rounded-pill">Ready</span>
                                        @else
                                            <span class="badge bg-danger rounded-pill">Not Ready</span>
                                        @endif
                                        <br>
                                        - <small>{{$dt->ket_burner3}}</small>
                                    </td>
                                    <td>
                                        @if ($dt->status_burner4 == 'Ready')
                                        <span class="badge bg-success rounded-pill">Ready</span>
                                        @else
                                            <span class="badge bg-danger rounded-pill">Not Ready</span>
                                        @endif
                                        <br>
                                        - <small>{{$dt->ket_burner4}}</small>
                                    </td>
                                    <td>
                                        @include('commons.report_status')
                                    </td>
                                </tr>
                              @else
                              <tr class="border border-danger" style="background-color: #fff1f3;">
                                    <td>{{$no++;}}</td>
                                    <td><div class="badge bg-danger"><?php echo substr($dt->id, 0, 8)?></div></td>
                                    <td>{{$dt->nip}}</td>
                                    <td>{{$dt->users->nama_lengkap}}</td>
                                    <td>{{$dt->operator_kedua}}</td>
                                    <td>{{$dt->atasan}}</td>
                                    <td>{{$dt->operator_shift}}</td>
                                    <td>{{Carbon\carbon::createFromFormat('Y-m-d', $dt->tanggal_update)->format('d-m-Y')}}</td>
                                    <td>{{$dt->jam_update}}</td>
                                    <td>
                                        @if ($dt->unit == 'Unit 3')
                                            <span class="badge bg-success rounded">{{$dt->unit}}</span>
                                        @else
                                            <span class="badge bg-danger rounded">{{$dt->unit}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($dt->status_burner1 == 'Ready')
                                            <span class="badge bg-success rounded-pill">Ready</span>
                                        @else
                                            <span class="badge bg-danger rounded-pill">Not Ready</span>
                                        @endif
                                        <br>
                                        - <small>{{$dt->ket_burner1}}</small>
                                    </td>
                                    <td>
                                        @if ($dt->status_burner2 == 'Ready')
                                            <span class="badge bg-success rounded-pill">Ready</span>
                                        @else
                                            <span class="badge bg-danger rounded-pill">Not Ready</span>
                                        @endif
                                        <br>
                                        - <small>{{$dt->ket_burner2}}</small>
                                    </td>
                                    <td>
                                        @if ($dt->status_burner3 == 'Ready')
                                            <span class="badge bg-success rounded-pill">Ready</span>
                                        @else
                                            <span class="badge bg-danger rounded-pill">Not Ready</span>
                                        @endif
                                        <br>
                                        - <small>{{$dt->ket_burner3}}</small>
                                    </td>
                                    <td>
                                        @if ($dt->status_burner4 == 'Ready')
                                        <span class="badge bg-success rounded-pill">Ready</span>
                                        @else
                                            <span class="badge bg-danger rounded-pill">Not Ready</span>
                                        @endif
                                        <br>
                                        - <small>{{$dt->ket_burner4}}</small>
                                    </td>
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

@include('commons.modals.burner_create_maintenace')

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