
@extends('layouts.main')

@section('content')
@include('includes.navbar')
    <!-- Content wrapper -->
    <div class="content-wrapper mt-2">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="rounded-pill p-3 fw-bold">
                <div class="row">
                    <div class="col-lg-8 col-sm-9">
                        <div class="p-2">
                            <a href="{{route('dashboard')}}" class="text-primary">
                                <i class='bx bxs-dashboard'></i> Dashboard
                            </a>
                            /
                            <span class="text-primary mx-2">
                                Data LFO System
                            </span>
                            /
                            <span class="text-warning mx-2">
                                High Speed Diesel Level
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
        
            <div class="my-3">
                <div class="card shadow-sm p-3 bg-light">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex justify-content-between">
                            <div class="mx-1">
                                <a href="{{route('admin.index.hsdlevel')}}" class="btn btn-sm btn-dark"><i class='bx bx-refresh'></i> Refresh</a>
                            </div>
                            <div class="mx-1">
                                <a href="{{route('admin.trash.hsdlevel')}}" class="btn btn-sm btn-danger"><i class='bx bxs-trash-alt' ></i> Trash Check</a>
                            </div>
                        </div>
                        <div class="row">
                            <form action="{{route('print.admin.laporan_hsdlevel')}}" method="GET" target="_blank">
                                <div class="input-group mb-3">
                                    <input type="date" class="form-control" name="first_date" required>
                                    <input type="date" class="form-control" name="last_date" required>
                                    <button class="btn btn-success" type="submit">PRINT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>
                    @include('commons.validasi_success_update')
                    <table class="table table-striped table-hovered" id="example">
                        <span class="badge bg-primary p-3 fw-bold rounded mb-4" style="width: 100%">DATA HIGH SPEED DIESEL LEVEL</span>
                        <thead class="table-primary">
                            <tr>
                                <th class="op-1 text-center">Aksi</th>
                                <th>No</th>
                                <th class="op-1">NIP</th>
                                <th class="op-1">Nama Operator</th>
                                <th class="atasan-col">Supervisor</th>
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
                            @foreach ($data as $dt)
                                <tr>
                                    <td>
                                        <div class="d-flex justify-content-evenly">
                                            <div class="mt-3">
                                                {{-- <a href="{{route('admin.download_burner', $dt->id)}}" class="bg-success p-2 text-white mb-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Download"><i class='bx bxs-download'></i></a> --}}
                                                <a href="{{route('admin.edit.hsdlevel', $dt->id)}}" class="bg-primary p-2 text-white mb-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit"><i class='bx bx-edit'></i></a>
                                                
                                            </div>
                                            <div class="">
                                                <form method="POST" action="{{ route('admin.delete.hsdlevel', $dt->id) }}">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit" class="bg-danger text-white mb-2 show_confirm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="trash"><i class='bx bxs-trash-alt' ></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{$no++;}}</td>
                                    <td>{{$dt->users->nip}}</td>
                                    <td>{{$dt->users->nama_lengkap}}</td>
                                    <td>{{$dt->users->atasan}}</td>
                                    <td>{{$dt->operator_shift}}</td>
                                    <td>{{Carbon\carbon::createFromFormat('Y-m-d H:i:s', $dt->created_at)->isoFormat('DD-MM-Y')}}</td>
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

            $('.show_confirm').click(function(event) {
                var form =  $(this).closest("form");
                var name = $(this).data("name");
                event.preventDefault();
                swal({
                    title: `Are you sure you want to delete?`,
                    text: "The data will be put in the trash",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
            });

            setTimeout(() => {
            $('.notif-updated').hide();
        }, 1000);
    });
</script>
@endpush