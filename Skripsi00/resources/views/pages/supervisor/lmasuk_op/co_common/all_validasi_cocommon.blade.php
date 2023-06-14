
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
                            <a href="{{route('lmasuk.op.cocommon')}}" class="text-primary">
                                CO Common
                            </a>
                            /
                            <span class="text-warning mx-2">
                                All validation
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
                                <a href="{{route('lmasuk.op.cocommon')}}" class="btn btn-sm btn-dark"><i class='bx bx-left-arrow-circle'></i> Back</a>
                            </div>
                        </div>
                        <span class="badge bg-primary p-3 fw-bold rounded mb-4" style="width: 100%">CHANGE OVER PERALATAN COMMON VALIDATIONS - {{Auth::user()->tim_divisi}}</span>
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Aksi</th>
                                <th>NIP</th>
                                <th class="op-1">Operator</th>
                                <th class="op-1">Supervisor</th>
                                <th class="tgl-col">Shift</th>
                                <th class="tgl-col">Tanggal CO</th>
                                <th class="tgl-col">Jam CO</th>
                                <th class="tgl-col">Unit</th>
                                <th class="common-information text-center">Motor Peralatan</th>                                
                                <th class="common-information text-center">Informasi</th>                                                                                         
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
                                        <a href="{{route('op.cocommon_validation', $dt->id)}}" class="bg-danger p-2 text-white"><i class='bx bx-edit'></i></a>
                                    </td>
                                    <td>{{$dt->users->nip}}</td>
                                    <td>{{$dt->users->nama_lengkap}}</td>
                                    <td>{{$dt->users->atasan}}</td>
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
                                        <ul>
                                            <li>Operasi Awal : <div class="text-danger fw-bold">Motor {{$dt->operasi_awal}}</div></li>
                                            <li>Rencana Operasi : <div class="text-warning fw-bold">Motor {{$dt->rencana_operasi}}</li>
                                            <li>Operasi Akhir : <div class="text-success fw-bold">Motor {{$dt->operasi_akhir}}</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            <li>Pelaksanaan : <div class="text-success">{{$dt->status_kegiatan}}</div></li>
                                            <li>Evaluasi : <div class="text-primary"> {{$dt->status_peralatan}}</div> </li>
                                            <li>Keterangan : <div class="text-danger">{{$dt->keterangan}}</div></li>
                                        </ul>
                                    </td>
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