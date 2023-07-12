
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
                                Data Maintenance
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
                    <div class="row">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex justify-content-between">
                                <div class="mx-1">
                                    <a href="{{route('inventory.create')}}" class="btn btn-sm btn-success"><i class='bx bx-plus'></i> New Add</a>
                                </div>
                                <div class="mx-1">
                                    <a href="{{route('admin.trash.burner')}}" class="btn btn-sm btn-danger"><i class='bx bxs-trash-alt' ></i> Trash Check</a>
                                </div>
                            </div>
                            <div class="row">
                                <form action="{{route('print.admin.laporan_burner')}}" method="GET" target="_blank">
                                    <div class="input-group mb-3">
                                    <select name="select_unit" id="select_unit" class="form-select">
                                        <option value="">-Select Unit--</option>
                                        <option value="Unit 3">Unit 3</option>
                                        <option value="Unit 4">Unit 4</option>
                                    </select>
                                        <input type="date" class="form-control" name="first_date" required>
                                        <input type="date" class="form-control" name="last_date" required>
                                        <button class="btn btn-success" type="submit">PRINT</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <br>
                        @include('commons.validasi_success_update')
                        
                        <table id="example" class="table table-striped my-3" style="width:100%">
                        <span class="badge bg-primary p-3 fw-bold rounded mb-4" style="width: 100%">DATA MAINTENANCE</span>
                        <thead class="table-primary">
                            <tr>
                                <th class="op-1 text-center">Aksi</th>
                                <th>No</th>
                                <th>Equipment Code</th>
                                <th>NIP</th>
                                <th class="op-1">Name</th>
                                <th class="atasan-col">Supervisor</th>
                                <th class="tgl-col">Shift</th>
                                <th class="tgl-col">Report Date</th>
                                <th class="jam-col">Report Time</th>
                                <th class="common-info">Equipment Name</th>
                                <th class="common-info">Treatment</th>
                                <th class="common-info">Item Amout (Qt)</th>
                                <th class="common-info">Item Price (IDR)</th>
                                <th class="common-info">Price Total (IDR)</th>
                                <th class="common-info">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp

                            @foreach ($data as $dt)
                            @if ($dt->total_price == '0')
                            <tr style="background-color: pink;" class="border border-danger fw-bold">
                                <td>
                                    <div class="d-flex justify-content-evenly">
                                        <div class="mt-3">
                                            <a href="{{route('admin.edit.burner', $dt->id)}}" class="bg-primary p-2 text-white mb-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Validation"><i class='bx bx-edit'></i></a>
                                        </div>
                                        <div class="">
                                            <form method="POST" action="{{ route('admin.delete.burner', $dt->id) }}">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit" class="bg-danger text-white mb-2 show_confirm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="trash"><i class='bx bxs-trash-alt' ></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                <td>{{$no++}}</td>
                                <td><?php echo substr($dt->burner_system_id,0,8)?></td>
                                <td>{{$dt->users->nip}}</td>
                                <td>{{$dt->users->nama_lengkap}}</td>
                                <td>{{$dt->burner_systems->atasan}}</td>
                                <td>{{$dt->burner_systems->operator_shift}}</td>
                                <td>{{$dt->burner_systems->tanggal_update}}</td>
                                <td>{{$dt->burner_systems->jam_update}}</td>
                                <td>{{$dt->inventories->item_name}}</td>
                                <td>{{$dt->description}}</td>
                                <td>{{$dt->item_amount}}</td>
                                <td>{{$dt->item_price}}</td>
                                <td>{{$dt->total_price}}</td>
                                <td>{{$dt->status_equipment->status_name}}</td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                    <div class="d-flex justify-content-evenly">
                                        <div class="mt-3">
                                            <a href="{{route('admin.edit.burner', $dt->id)}}" class="bg-primary p-2 text-white mb-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Validation"><i class='bx bx-edit'></i></a>
                                        </div>
                                        <div class="">
                                            <form method="POST" action="{{ route('admin.delete.burner', $dt->id) }}">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit" class="bg-danger text-white mb-2 show_confirm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="trash"><i class='bx bxs-trash-alt' ></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                <td>{{$no++}}</td>
                                <td><?php echo substr($dt->burner_system_id,0,8)?></td>
                                <td>{{$dt->users->nip}}</td>
                                <td>{{$dt->users->nama_lengkap}}</td>
                                <td>{{$dt->burner_systems->atasan}}</td>
                                <td>{{$dt->burner_systems->operator_shift}}</td>
                                <td>{{$dt->burner_systems->tanggal_update}}</td>
                                <td>{{$dt->burner_systems->jam_update}}</td>
                                <td>{{$dt->stocks->item_name}}</td>
                                <td>{{$dt->description}}</td>
                                <td>{{$dt->item_amount}}</td>
                                <td>{{$dt->item_price}}</td>
                                <td>{{$dt->total_price}}</td>
                                <td>{{$dt->status_equipment->status_name}}</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
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