
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
                            <a href="{{route('home')}}" class="text-primary">
                                <i class="bx bx-home-circle"></i> Home
                            </a>
                            /
                            <a href="{{route('lmasuk.har.edg')}}" class="text-primary">
                                EDG System
                            </a>
                            /
                            <span class="text-warning mx-2">
                                All Validation
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
                    <table id="example" class="table table-striped my-3" style="width:100%">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <a href="{{route('lmasuk.har.edg')}}" class="btn btn-sm btn-dark"><i class='bx bx-left-arrow-circle'></i> Back</a>
                            </div>
                        </div>
                        <span class="badge bg-primary p-3 fw-bold rounded mb-4" style="width: 100%">EMERGENCY DIESEL GENERATOR SYSTEM VALIDATIONS</span>
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <td>Aksi</td>
                                <th>NIP</th>
                                <th class="op-1">Operator I</th>
                                <th class="op-2">Operator II</th>
                                <th class="atasan-col">Supervisor</th>
                                <th class="tgl-col">Shift</th>
                                <th class="tgl-col">Tanggal Update</th>
                                <th class="tgl-col">Jam Operasi</th>
                                <th class="common-information text-center">Info I</th>                                
                                <th class="common-information text-center">Info II</th>                                
                                <th class="common-information">Catatan</th>                                                              
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data as $dt)
                                <tr>
                                    <td>{{$no++;}}</td>
                                    <td>
                                        <a href="{{route('har.edg_validation', $dt->id)}}" class="bg-danger p-2 text-white"><i class='bx bx-edit'></i></a>
                                    </td>
                                    <td>{{$dt->nip}}</td>
                                    <td>{{$dt->users->nama_lengkap}}</td>
                                    <td>{{$dt->operator_kedua}}</td>
                                    <td>{{$dt->atasan}}</td>
                                    <td>{{$dt->operator_shift}}</td>
                                    <td>{{Carbon\carbon::createFromFormat('Y-m-d', $dt->tanggal_update)->format('d-m-Y')}}</td>
                                    <td>
                                        <ul>
                                            <li>Jam Start : <span class="text-success fw-bold">{{$dt->jam_start}}</span></li>
                                            <li>Jam Stop : <span class="text-danger fw-bold">{{$dt->jam_stop}}</span></li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            <li>Level BBM Awal : {{$dt->lev_bbm_awal}}</li>
                                            <li>Tegangan Battery : {{$dt->teg_battery}}</li>
                                            <li>Level Oli : {{$dt->lev_oli}}</li>
                                            <li>Putaran : {{$dt->putaran}}</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            <li>Level BBM Akhir : {{$dt->lev_bbm_akhir}}</li>
                                            <li>Tegangan Output : {{$dt->teg_out}}</li>
                                            <li>Pressure Oli : {{$dt->press_oli}}</li>
                                            <li>Frekuensi : {{$dt->frekuensi}}</li>
                                            <li>Temperature Coolant : {{$dt->temp_coolant}}</li>
                                        </ul>
                                    </td>
                                    <td>{{$dt->catatan}}</td>
                                    <td>
                                        @include('commons.report_status')
                                    </td>
                                </tr>
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

@push('add-script')
<script>
    $(document).ready(function(){
        $('#example').DataTable({
                scrollY: 200,
                scrollX: true,
            });
    });
</script>
@endpush