
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
                                Equipment About
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
                    <div class="d-flex justify-content-between mb-2">
                        <div class="d-flex justify-content-between">
                            <div class="mx-1">
                                <a href="{{route('equipment_about.create')}}" class="btn btn-sm btn-success"><i class='bx bx-plus'></i> New Add</a>
                            </div>
                        </div>
                    </div>
                    <br>
                    @include('commons.validasi_success_update')
                    <table class="table table-striped table-hovered" id="example">
                        <span class="badge bg-primary p-3 fw-bold rounded mb-4" style="width: 100%">DATA ABOUT EQUIPMENT</span>
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th class="op-1 text-center">Aksi</th>
                                <th class="op-1">Equipment Name</th>
                                <th class="op-1">Position</th>
                                <th class="common-information">Description</th>
                                <th class="common-information">Specification</th>
                                <th class="col-email">Image Equipment</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                           @foreach ($data as $dt)
                           
                            <tr>
                                <td>
                                    {{$no++}}
                                </td>
                                <td>
                                    <div class="d-flex justify-content-evenly">
                                        <div class="mt-3">
                                            <a href="{{route('equipment_about.edit', $dt->id)}}" class="bg-primary p-2 text-white mb-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="update"><i class='bx bx-edit'></i></a>
                                            
                                        </div>
                                        <div class="">
                                            <form method="POST" action="{{ route('equipment_about.destroy', $dt->id) }}">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit" class="bg-danger text-white mb-2 show_confirm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="trash"><i class='bx bxs-trash-alt' ></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                <td>{{$dt->name_equipment}}</td>
                                <td>{{$dt->position}} (Area Floor)</td>
                                <td>{{$dt->description}}</td>
                                <td>{!!$dt->specification!!}</td>
                                <td><img src="{{asset('storage/'. $dt->img_equipment)}}" alt="" width="100px" height="100px"></td>
                            </tr>
                        </tbody>
                           @endforeach
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