
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
                                Change Over Peralatan Common
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
                            <a href="{{route('maintenance.index')}}" class="btn btn-sm btn-primary rounded-pill"><i class='bx bx-left-arrow-circle'></i> Back</a>
                        </div>
                        <br>
                        @include('commons.validasi_success_update')

                        <table id="example" class="table table-striped my-3" style="width:100%">
                        <div class="m-auto">
                        <span class="badge bg-primary p-3 fw-bold rounded mb-4" style="width: 100%">EQUIPMENT REPAIR DATA - CHANGE OVER PERALATAN COMMON</span>
                        </div>
                       
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th class="op-1 text-center">Aksi</th>
                                <th class="op-1 text-center">Repair Code</th>
                                <th class="common-info">NIP</th>
                                <th class="common-info">Operator</th>
                                <th class="common-info">Supervisor</th>
                                <th class="tgl-col">Shift</th>
                                <th class="tgl-col">Nama Peralatan</th>
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
                                        <a href="javascript:void(0)" data-id="{{$dt->id}}" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-sm btn-success" id="create_detail" ><i class='bx bx-dollar-circle'></i> Buat Rincian</a>
                                    </td>
                                    <td><div class="badge bg-danger"><?php echo substr($dt->id, 0, 8)?></div></td>
                                    <td>{{$dt->users->nip}}</td>
                                    <td>{{$dt->users->nama_lengkap}}</td>
                                    <td>{{$dt->users->atasan}}</td>
                                    <td>{{$dt->operator_shift}}</td>
                                    <td><div class="badge bg-success rounded-pill">{{$dt->nama_peralatan}}</div></td>
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