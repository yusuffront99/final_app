
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
                                Data EDG System
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
                    <table id="example" class="table table-striped my-3" style="width:100%">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex justify-content-between">
                                <div class="mx-1">
                                    <a href="{{route('admin.index.edg')}}" class="btn btn-sm btn-dark"><i class='bx bx-refresh'></i> Refresh</a>
                                </div>
                                <div class="mx-1">
                                    <a href="{{route('admin.trash.edg')}}" class="btn btn-sm btn-danger"><i class='bx bxs-trash-alt' ></i> Trash Check</a>
                                </div>
                            </div>
                            <div class="row">
                                {{-- <div class="col-lg-6">
                                    <input type="date" name="first_date" id="first_date" class="form-control" required>
                                </div>
                                <div class="col-lg-6">
                                    <input type="date" name="last_date" id="last_date" class="form-control" required>
                                </div>
                                <br>
                                <div class="col-lg-12 d-grid gap-3 my-1">
                                    <a href="" onclick="this.href='/dashboard/data_laporan/edg/print/'+document.getElementById('first_date').value + '/' + document.getElementById('last_date').value" target="_blank" class="btn btn-sm btn-success">print</a>
                                </div> --}}
                                <form action="{{route('print.admin.laporan_edg')}}" method="GET" target="_blank">
                                    <div class="input-group mb-3">
                                        <input type="date" class="form-control" name="first_date" required>
                                        <input type="date" class="form-control" name="last_date" required>
                                        <button class="btn btn-success" type="submit">PRINT</button>
                                    </div>
                                </form>

                                {{--   --}}
                            </div>
                        </div>
                        <br>
                        @include('commons.validasi_success_update')
                        <br>
                        <span class="badge bg-primary p-3 fw-bold rounded mb-4" style="width: 100%">DATA EMERGENCY DIESEL GENERATOR SYSTEM</span>
                        <thead class="table-primary">
                            <tr>
                                <th class="op-1 text-center">Aksi</th>
                                <th>No</th>
                                <th>NIP</th>
                                <th class="op-1">Operator I</th>
                                <th class="op-2">Operator II</th>
                                <th class="atasan-col">Supervisor</th>
                                <th class="tgl-col">Shift</th>
                                <th class="tgl-col">Kondisi Peralatan</th>
                                <th class="tgl-col">Tanggal Update</th>
                                <th class="tgl-col">Jam Operasi</th>
                                <th class="common-information text-center">Info I</th>                                
                                <th class="common-information text-center">Info II</th>                                
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
                                    <td>
                                        <div class="d-flex justify-content-evenly">
                                            <div class="mt-3">
                                                {{-- <a href="{{route('admin.download_burner', $dt->id)}}" class="bg-success p-2 text-white mb-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Download"><i class='bx bxs-download'></i></a> --}}
                                                <a href="{{route('admin.edit.edg', $dt->id)}}" class="bg-primary p-2 text-white mb-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit"><i class='bx bx-edit'></i></a>
                                                
                                            </div>
                                            <div class="">
                                                <form method="POST" action="{{ route('admin.delete.edg', $dt->id) }}">
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
                                    <td>{{$dt->operator_kedua}}</td>
                                    <td>{{$dt->atasan}}</td>
                                    <td>{{$dt->operator_shift}}</td>
                                    <td>@include('commons.alerts.condition_alert_edg')</td>
                                    <td>{{Carbon\carbon::createFromFormat('Y-m-d', $dt->tanggal_update)->format('d-m-Y')}}</td>
                                    <td>
                                        <ul>
                                            <li>Jam Start : <span class="text-success fw-bold">{{$dt->jam_start}}</span></li>
                                            <li>Jam Stop : <span class="text-danger fw-bold">{{$dt->jam_stop}}</span></li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            <li>Level BBM Awal : {{$dt->lev_bbm_awal}}</li>
                                            <li>Tegangan Battery : {{$dt->teg_battery}}</li>
                                            <li>Level Oli : {{$dt->lev_oli}}</li>
                                            <li>Putaran : {{$dt->putaran}}</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            <li>Level BBM Akhir : {{$dt->lev_bbm_akhir}}</li>
                                            <li>Tegangan Output : {{$dt->teg_out}}</li>
                                            <li>Pressure Oli : {{$dt->press_oli}}</li>
                                            <li>Frekuensi : {{$dt->frekuensi}}</li>
                                            <li>Temperature Coolant : {{$dt->temp_coolant}}</li>
                                        </ul>
                                    </td>
                                    <td>{{$dt->keterangan}}</td>
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