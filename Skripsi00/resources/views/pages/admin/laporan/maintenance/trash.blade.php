
@extends('layouts.main')

@section('content')
@include('includes.navbar')
    <!-- Content wrapper -->
    <div class="content-wrapper">
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
                            <a href="{{route('maintenance.index')}}" class="text-primary">
                                Maintenance
                            </a>
                            /
                            <span class="text-warning mx-2">
                                Repair History Data
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
                        <div>
                            <a href="{{route('maintenance.histories')}}" class="btn btn-sm btn-primary"><i class='bx bx-left-arrow-circle'></i> Back</a>
                        </div>
                    </div>
                    <br>
                    @include('commons.validasi_success_update')
                    <table id="example" class="table table-striped my-3" style="width:100%">
                        <div class="">
                            <span class="badge bg-danger p-3 fw-bold rounded mb-4" style="width: 100%">REPAIR HISTORY - TRASH DATA</span>
                        </div>
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th class="common-button text-center">Aksi</th>
                                <th class="common">Repair Code</th>
                                <th class="common-info">Kategori</th>
                                <th>NIP</th>
                                <th class="common-info">Operator</th>
                                <th class="common-info">Jabatan / Divisi</th>
                                <th class="common-info">Supervisor</th>
                                <th class="common">Shift</th>
                                <th class="common-info">Tanggal Kerusakan</th>
                                <th class="common-info">Tanggal Perbaikan</th>
                                <th class="common-information">Informasi Penanganan</th>
                                <th class="common-information">Detail Perbaikan</th>
                                <th class="common-info">Total Biaya (IDR)</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $no = 1;
                        @endphp
                        
                        @foreach ($histories as $ht)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>
                                <div class="d-flex justify-content-evenly">
                                    <div class="mt-3">
                                        <a href="{{route('maintenance.restore', $ht->id)}}" class="bg-success p-2 text-white mb-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="restore"><i class='bx bx-refresh'></i></a>
                                        <a href="{{route('maintenance.delete_permanent', $ht->id)}}" class="bg-danger p-2 text-white mb-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="delete"><i class='bx bxs-trash-alt' ></i></a>
                                    </div>
                                </div>
                            </td>
                            <td><div class="badge bg-success">{{$ht->repair_code}}</div></td>
                            <td><div class="badge bg-warning">{{$ht->category}}</div></td>
                            <td>{{$ht->users->nip}}</td>
                            <td>{{$ht->users->nama_lengkap}}</td>
                            <td>{{$ht->users->jabatan}} / {{$ht->users->divisi}}</td>
                            <td>{{$ht->users->atasan}}</td>
                            <td>{{$ht->users->tim_divisi}}</td>
                            <td>{{$ht->damage_date}}</td>
                            <td>{{$ht->repair_date}}</td>
                            <td>{{$ht->description}}</td>
                            <td>
                               @include('commons.repair_history')
                            </td>
                            <td><div class="badge bg-success">Rp. <?php echo number_format($ht->total_price, 0, ',', '.')?></div></td>
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