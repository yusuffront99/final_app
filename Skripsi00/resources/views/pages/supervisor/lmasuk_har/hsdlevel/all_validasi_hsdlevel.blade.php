
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
                            <a href="{{route('lmasuk.har.hsdlevel')}}" class="text-primary">
                            All Inboxes / HSD Level
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
                                <a href="{{route('lmasuk.har.hsdlevel')}}" class="btn btn-sm btn-dark"><i class='bx bx-left-arrow-circle'></i> Back</a>
                            </div>
                        </div>
                        <span class="badge bg-primary p-3 fw-bold rounded mb-4" style="width: 100%">LIGHT FUEL OIL SYSTEM - HIGH SPEED DIESEL LEVEL VALIDATIONS</span>
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Aksi</th>
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
                                    <td>{{$no++;}}</td>
                                    <td>
                                        <a href="{{route('har.hsdlevel_validation', $dt->id)}}" class="bg-danger p-2 text-white"><i class='bx bx-edit'></i></a>
                                    </td>
                                    <td>{{$dt->users->nama_lengkap}}</td>
                                    <td>{{$dt->users->atasan}}</td>
                                    <td>{{$dt->users->tim_divisi}}</td>
                                    <td>{{$dt->created_at}}</td>
                                    <td>
                                        @if ($dt->storage_level >= 3.50)
                                            <div class="text-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Level Normal">{{$dt->storage_level}} / m<sup>3</sup><i class='bx bxs-up-arrow-circle'></i></div>
                                        @else
                                            <div class="text-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Level Low">{{$dt->storage_level}} / m<sup>3</sup> <i class='bx bxs-down-arrow-circle'></i></div>
                                        @endif
                                        </td>
                                        <td>
                                        @if ($dt->daily_level >= 2.00)
                                        <div class="text-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Level Normal">{{$dt->daily_level}} / m<sup>3</sup> <i class='bx bxs-up-arrow-circle'></i></div>
                                        @else
                                        <div class="text-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Level Low">{{$dt->daily_level}} / m<sup>3</sup> <i class='bx bxs-down-arrow-circle'></i></div>
                                        @endif
                                        </td>
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
                scrollY: 250,
                scrollX: true,
            });
    });
</script>
@endpush