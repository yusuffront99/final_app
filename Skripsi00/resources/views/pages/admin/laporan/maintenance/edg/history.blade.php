
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
                                Emergency Diesel Generator System
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
                            <div class="mx-1">
                                <a href="{{route('maintenance.index')}}" class="btn btn-sm btn-primary rounded-pill"><i class='bx bx-left-arrow-circle'></i> Back</a>
                            </div>
                        </div>
                        <br>

                        @include('commons.validasi_success_update')

                        <table id="example" class="table table-striped my-3" style="width:100%">
                        <div class="m-auto">
                        <span class="badge bg-primary p-3 fw-bold rounded mb-4" style="width: 100%">EQUIPMENT REPAIR DATA - EMERGENCY DIESEL GENERATOR SYSTEM</span>
                        </div>
                       
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th class="common">Repair Code</th>
                                <th class="common">NIP</th>
                                <th class="op-1">Operator I</th>
                                <th class="op-2">Operator II</th>
                                <th class="common-info">Supervisor</th>
                                <th class="common">Shift</th>
                                <th class="common-info">Tanggal Update</th>
                                <th class="common-info">Jam Operasi</th>
                                <th class="common-information text-center">Info I</th>                                
                                <th class="common-information text-center">Info II</th>                                
                                <th class="common-information">Keterangan</th>      
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
                                <td><div class="badge bg-danger"><?php echo substr($dt->id, 0, 8)?></div></td>
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
                                <td>{{$dt->keterangan}}</td>
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