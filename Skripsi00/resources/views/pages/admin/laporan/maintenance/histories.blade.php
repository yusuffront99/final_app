
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
                                History
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
                    <div class="d-flex justify-content-between">
                            <div class="d-flex justify-content-between">
                               
                                <div class="mx-1">
                                    <a href="{{route('maintenance.histories')}}" class="btn btn-sm btn-dark"><i class='bx bx-refresh'></i> Refresh</a>
                                </div>
                                <div class="mx-1">
                                    <a href="{{route('maintenance.trash')}}" class="btn btn-sm btn-danger"><i class='bx bxs-trash-alt' ></i> Trash Check</a>
                                </div>
                            </div>
                            <div class="row">
                                <form action="{{route('print.admin.laporan_maintenance_history')}}" method="GET" target="_blank">
                                    <div class="input-group mb-3">
                                    <select name="select_category" id="select_category" class="form-select">
                                        <option value="">-Kategori--</option>
                                        <option value="BURNER SYSTEM">BURNER SYSTEM</option>
                                        <option value="SOOTBLOWER SYSTEM">SOOTBLOWER SYSTEM</option>
                                        <option value="EDG SYSTEM">EDG SYSTEM</option>
                                        <option value="CHANGE OVER TURBINE">CHANGE OVER TURBINE</option>
                                        <option value="CHANGE OVER BOILER">CHANGE OVER BOILER</option>
                                        <option value="CHANGE OVER COMMON">CHANGE OVER COMMON</option>
                                        <option value="FORWARDING PUMP">FORWARDING PUMP</option>
                                        <option value="HIGH PRESSURE PUMP">HIGH PRESSURE PUMP</option>
                                        <option value="HIGH SPEED DIESEL LEVEL">HIGH SPEED DIESEL LEVEL</option>
                                        <option value="Semua">Semua</option>
                                    </select>
                                    <select name="select_unit" id="select_unit" class="form-select">
                                        <option value="">-Unit--</option>
                                        <option value="Unit 3">Unit 3</option>
                                        <option value="Unit 4">Unit 4</option>
                                        <option value="Common">Common</option>
                                        <option value="Semua">Semua</option>
                                    </select>
                                        <input type="date" class="form-control" name="first_date" >
                                        <input type="date" class="form-control" name="last_date" >
                                        <button class="btn btn-success" type="submit">PRINT</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <br>
                        @include('commons.validasi_success_update')
                        
                    <table id="example" class="table table-striped my-3" style="width:100%">
                        <div class="m-auto">
                        <span class="badge bg-primary p-3 fw-bold rounded mb-4" style="width: 100%">MAINTENANCE HISTORY DATA</span>
                        </div>
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th class="common-button text-center">Aksi</th>
                                <th class="common-info">Repair Code</th>
                                <th class="common-info">Kategori</th>
                                <th class="common-info">Unit</th>
                                <th class="common">NIP</th>
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
                        
                        @if ($no % 2 == 0)
                        <tr style="background-color:#fff8eb; border-bottom: 2px solid white" class="border border-dark">
                            <td>{{$no++}}</td>
                            <td>
                                <div class="d-flex justify-content-evenly">
                                    <div class="mt-2">
                                        <a href="{{route('maintenance.edit', $ht->id)}}" class="btn btn-primary btn-sm"><i class="bx bxs-edit"></i></a>
                                    </div>
                                    <div class="mt-2">
                                        <form method="POST" action="{{route('maintenance.delete', $ht->id)}}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-danger btn-sm text-white mb-2 show_confirm"><i class='bx bxs-trash-alt' ></i></button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                            <td><div class="badge bg-success">{{$ht->repair_code}}</div></td>
                            <td><div class="badge bg-warning">{{$ht->category}}</div></td>
                            <td><div class="badge bg-dark">{{$ht->unit}}</div></td>
                            <td>{{$ht->users->nip}}</td>
                            <td>{{$ht->users->nama_lengkap}}</td>
                            <td>{{$ht->users->jabatan}} / {{$ht->users->divisi}}</td>
                            <td>{{$ht->users->atasan}}</td>
                            <td>{{$ht->users->tim_divisi}}</td>
                            <td>{{$ht->damage_date}}</td>
                            <td>{{$ht->repair_date}}</td>
                            <td>{!!$ht->description!!}</td>
                            <td>
                               @include('commons.repair_history')
                            </td>
                            <td><div class="badge bg-success">Rp. <?php echo number_format($ht->total_price, 0, ',', '.')?></div></td>
                        </tr>
                        @else
                        <tr style="background-color:dark; border-bottom: 2px solid white" class="border border-dark">
                            <td>{{$no++}}</td>
                            <td>
                                <div class="d-flex justify-content-evenly">
                                    <div class="mt-2">
                                        <a href="{{route('maintenance.edit', $ht->id)}}" class="btn btn-primary btn-sm"><i class="bx bxs-edit"></i></a>
                                    </div>
                                    <div class="mt-2">
                                        <form method="POST" action="{{route('maintenance.delete', $ht->id)}}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-danger btn-sm text-white mb-2 show_confirm"><i class='bx bxs-trash-alt' ></i></button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="badge bg-success">
                                    {{$ht->repair_code}}
                                </div>
                            </td>
                            <td><div class="badge bg-warning">{{$ht->category}}</div></td>
                            <td><div class="badge bg-dark">{{$ht->unit}}</div></td>
                            <td>{{$ht->users->nip}}</td>
                            <td>{{$ht->users->nama_lengkap}}</td>
                            <td>{{$ht->users->jabatan}} / {{$ht->users->divisi}}</td>
                            <td>{{$ht->users->atasan}}</td>
                            <td>{{$ht->users->tim_divisi}}</td>
                            <td>{{$ht->damage_date}}</td>
                            <td>{{$ht->repair_date}}</td>
                            <td>{!!$ht->description!!}</td>
                            <td>
                               @include('commons.repair_history')
                            </td>
                            <td><div class="badge bg-success">Rp. <?php echo number_format($ht->total_price, 0, ',', '.')?></div></td>
                        </tr>
                        @endif

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