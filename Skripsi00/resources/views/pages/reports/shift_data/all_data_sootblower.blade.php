
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
                            <a href="{{route('sbl_system.index')}}" class="text-primary">
                                Sootblower System
                            </a>
                            /
                            <span class="text-warning mx-2">
                                All Data {{Auth::user()->tim_divisi}}
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
                            @if (Auth::user()->jabatan != 'Supervisor Operasi' )
                                <div>
                                    <a href="{{route('sbl_system.index')}}" class="btn btn-sm btn-dark"><i class='bx bx-left-arrow-circle'></i> Back</a>
                                </div>
                            @else
                                <div>
                                    <a href="{{route('lmasuk.op.sootblower')}}" class="btn btn-sm btn-dark"><i class='bx bx-left-arrow-circle'></i> Back</a>
                                </div>
                            @endif
                        </div>
                        <span class="badge bg-primary p-3 fw-bold rounded mb-4" style="width: 100%">DATA SOOTBLOWER SYSTEM - {{Auth::user()->tim_divisi}}</span>
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th class="op-1">Operator I</th>
                                <th class="op-2">Operator II</th>
                                <th class="atasan-col">Supervisor</th>
                                <th class="tgl-col">Shift</th>
                                <th class="tgl-col">Updated Date</th>
                                <th class="jam-col">Updated Time</th>
                                <th class="unit-col">Unit</th>
                                <th class="common-information">Status Peralatan</th>
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
                                    <td>{{$dt->users->nip}}</td>
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
                                        <ul>
                                            <li>Sootblower Type-L:</li>
                                            @include('commons.indication_sbl_type_L')
                                            
                                            <li>Sootblower Type-C :</li>
                                            @include('commons.indication_sbl_type_C')

                                            <li>Sootblower Type-G/YB :</li>
                                            @include('commons.indication_sbl_type_G')
                                        </ul>
                                    </td>
                                    <td>
                                    <strong class="text-danger">
                                    {!!$dt->keterangan!!}
                                    </strong>
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