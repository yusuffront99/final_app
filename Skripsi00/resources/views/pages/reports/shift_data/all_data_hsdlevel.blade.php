
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
                            <a href="{{route('lmasuk.op.hppump')}}" class="text-primary">
                                LFO System
                            </a>
                            /
                            <span class="text-warning mx-2">
                                All Data HP Pump
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
                        <div>
                            <a href="{{route('lmasuk.op.hppump')}}" class="btn btn-sm btn-dark"><i class='bx bx-left-arrow-circle'></i> Back</a>
                        </div>

                        <span class="badge bg-primary p-3 fw-bold rounded my-3" style="width: 100%">HIGH SPEED DIESEL - {{Auth::user()->tim_divisi}}</span>
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th class="op-1">Operator I</th>
                                <th class="atasan-col">Supervisor</th>
                                <th class="tgl-col">Shift</th>
                                <th class="tgl-col">Waktu Update</th>
                                <th class="tgl-col">Storage Tank Level</th>
                                <th class="tgl-col">Daily Tank Level</th>
                                <th class="tgl-col">Condition</th>
                                <th class="common-info text-center">Keterangan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp

                            @foreach ($data as $dt)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$dt->users->nip}}</td>
                                <td>{{$dt->users->nama_lengkap}}</td>
                                <td>{{$dt->users->atasan}}</td>
                                <td>{{$dt->users->tim_divisi}}</td>
                                <td>{{$dt->created_at}}</td>
                                <td>{{$dt->storage_level}}</td>
                                <td>{{$dt->daily_level}}</td>
                                <td>@include('commons.alerts.condition_alert_hsd')</td>
                                <td>{!!$dt->info_hsd!!}</td>
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