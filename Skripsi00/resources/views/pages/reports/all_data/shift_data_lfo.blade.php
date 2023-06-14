
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
                            <a href="{{route('lfo_system.index')}}" class="text-primary">
                                LFO System
                            </a>
                            /
                            <span class="text-warning mx-2">
                                All Shift Data {{Auth::user()->tim_divisi}}
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
                        <div class="row mb-3">
                            <div class="d-flex justify-content-between mb-3">
                                @if (Auth::user()->jabatan != 'Supervisor Operasi' )
                                    <div>
                                        <a href="{{route('lfo_system.index')}}" class="btn btn-sm btn-dark"><i class='bx bx-left-arrow-circle'></i> Back</a>
                                    </div>
                                    <div>
                                        <a href="{{route('lfo_system.print')}}" class="btn btn-sm btn-success" target="_blank"><i class='bx bx-printer'></i> All Print</a>
                                    </div>
                                @else
                                    <div>
                                        <a href="{{route('lmasuk.op.lfo')}}" class="btn btn-sm btn-dark"><i class='bx bx-left-arrow-circle'></i> Back</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <span class="badge bg-primary p-3 fw-bold rounded mb-4" style="width: 100%">ALL SHIFT DATA LFO SYSTEM - {{Auth::user()->tim_divisi}}</span>
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Aksi</th>
                                <th>NIP</th>
                                <th class="op-1">Operator I</th>
                                <th class="op-2">Operator II</th>
                                <th class="atasan-col">Supervisor</th>
                                <th class="tgl-col">Shift</th>
                                <th class="tgl-col">Tanggal Update</th>
                                <th class="jam-col">Jam Update</th>
                                <th class="unit-col">Unit</th>
                                <th class="tgl-col">DP High</th>
                                <th class="common-info text-center">HP Pump A</th>
                                <th class="common-info text-center">HP Pump B</th>
                                <th class="common-info text-center">FW Pump A</th>
                                <th class="common-info text-center">FW Pump B</th>
                                <th class="common-info text-center">Info HP Pump</th>
                                <th class="common-info text-center">Info FP Pump</th>
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
                                        <a href="{{route('one_print_lfo', $dt->id)}}" class="p-2 bg-primary text-white" target="_blank"><i class='bx bx-printer'></i></a>
                                    </td>
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
                                    <td>{{$dt->DP_High}}</td>
                                    <td>
                                        <ul>
                                            <li class="text-danger">Arus : {{$dt->arus_HP_A}} A</li>
                                            <li class="text-success">Pressure : {{$dt->press_HP_A}} MPA</li>
                                            <li class="text-warning">Status : {{$dt->status_HP_A}}</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            <li class="text-danger">Arus : {{$dt->arus_HP_B}} A</li>
                                            <li class="text-success">Pressure : {{$dt->press_HP_B}} MPA</li>
                                            <li class="text-warning">Status : {{$dt->status_HP_B}}</li>
                                        </ul>
                                    </td>


                                    <td>
                                        <ul>
                                            <li class="text-danger">Arus : {{$dt->forwardings->arus_FP_A}} A</li>
                                            <li class="text-success">Pressure : {{$dt->forwardings->press_FP_A}} MPA</li>
                                            <li class="text-warning">Status : {{$dt->forwardings->status_FP_A}}</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            <li class="text-danger">Arus : {{$dt->forwardings->arus_FP_B}} A</li>
                                            <li class="text-success">Pressure : {{$dt->forwardings->press_FP_B}} MPA</li>
                                            <li class="text-warning">Status : {{$dt->forwardings->status_FP_B}}</li>
                                        </ul>
                                    </td>
                                    <td>{!!$dt->info_HP!!}</td>
                                    <td>{!!$dt->forwardings->info_FP!!}</td>
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
                scrollY: 300,
                scrollX: true,
            });
    });
</script>
@endpush