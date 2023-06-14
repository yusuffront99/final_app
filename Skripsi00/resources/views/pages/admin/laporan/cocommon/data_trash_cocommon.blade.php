
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
                            <a href="{{route('home')}}" class="text-primary">
                                <i class="bx bx-home-circle"></i> Home
                            </a>
                            /
                            <a href="{{route('admin.index.cocommon')}}" class="text-primary">
                                Data CO Common
                            </a>
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
            
            <div class="my-3">
                <div class="card shadow-sm p-3 bg-light">
                    <div class="d-flex justify-content-between">
                        <div>
                            <a href="{{route('admin.index.cocommon')}}" class="btn btn-sm btn-primary"><i class='bx bx-left-arrow-circle'></i> Back</a>
                        </div>
                    </div>
                    <br>
                    @include('commons.validasi_success_update')
                    <table class="table table-striped table-hovered" id="example">
                        <span class="badge bg-danger p-3 fw-bold rounded mb-4" style="width: 100%">DATA CHANGE OVER PERALATAN COMMON - TRASH DATA</span>
                        <thead class="table-primary">
                            <tr>
                                <th class="op-1 text-center">Aksi</th>
                                <th>No</th>
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
                                <td>
                                    <div class="d-flex justify-content-evenly">
                                        <div class="mt-3">
                                            {{-- <a href="{{route('har.burner_updated', $dt->id)}}" class="bg-success p-2 text-white mb-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Download"><i class='bx bxs-download'></i></a> --}}
                                            <a href="{{route('admin.restore.cocommon', $dt->id)}}" class="bg-success p-2 text-white mb-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="restore"><i class='bx bx-refresh'></i></a>
                                            <a href="{{route('admin.delete_permanent.cocommon', $dt->id)}}" class="bg-danger p-2 text-white mb-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="delete"><i class='bx bxs-trash-alt' ></i></a>
                                        </div>
                                    </div>
                                </td>
                                <td>{{$no++;}}</td>
                                <td>{{$dt->nip}}</td>
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