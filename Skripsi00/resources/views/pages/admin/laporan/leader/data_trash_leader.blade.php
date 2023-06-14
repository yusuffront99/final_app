
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
                            <span class="text-warning mx-2">
                                Data Pegawai
                            </span>
                            /
                            <span class="text-warning mx-2">
                                Trash Data
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
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <a href="{{route('admin.index.user')}}" class="btn btn-sm btn-primary"><i class='bx bx-left-arrow-circle'></i> Back</a>
                        </div>
                    </div>
                    <br>
                    @include('commons.validasi_success_update')
                    <table class="table table-striped table-hovered" id="example">
                        <span class="badge bg-danger p-3 fw-bold rounded mb-4" style="width: 100%">Data Pegawai - Trash Data</span>
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th class="op-1 text-center">Aksi</th>
                                <th class="op-1">Trash In</th>
                                <th class="op-1">NIP</th>
                                <th class="op-1">Nama Lengkap</th>
                                <th class="op-1">Nama Panggilan</th>
                                <th class="col-email">Email</th>
                                <th class="tgl-col">Divisi</th>
                                <th class="tgl-col">Tim Divisi</th>
                                <th class="tgl-col">Jabatan</th>
                                <th class="col-spv">Atasan</th>
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
                                        <div class="d-flex justify-content-evenly">
                                            <div class="mt-3">
                                                {{-- <a href="{{route('har.burner_updated', $dt->id)}}" class="bg-success p-2 text-white mb-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Download"><i class='bx bxs-download'></i></a> --}}
                                                <a href="{{route('admin.restore.user', $dt->id)}}" class="bg-success p-2 text-white mb-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="restore"><i class='bx bx-refresh'></i></a>
                                                <a href="{{route('admin.delete_permanent.user', $dt->id)}}" class="bg-danger p-2 text-white mb-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="delete"><i class='bx bxs-trash-alt' ></i></a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{$dt->deleted_at}}</td>
                                    <td>{{$dt->nip}}</td>
                                    <td>{{$dt->nama_lengkap}}</td>
                                    <td>{{$dt->nama_panggilan}}</td>
                                    <td>{{$dt->email}}</td>
                                    <td>{{$dt->divisi}}</td>
                                    <td>{{$dt->tim_divisi}}</td>
                                    <td>{{$dt->jabatan}}</td>
                                    <td>{{$dt->atasan}}</td>
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
                    text: "If you delete this, it will be gone forever.",
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