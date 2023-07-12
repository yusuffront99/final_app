
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
                                Task Schedule
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
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modalTaskSchedule1" id="add-leader" class="btn btn-sm btn-success"><i class='bx bx-plus'></i> New Add</a>
                            </div>
                        </div>
                    </div>
                    <br>
                    @include('commons.validasi_success_update')
                    <table class="table table-striped table-hovered" id="example">
                        <span class="badge bg-primary p-3 fw-bold rounded mb-4" style="width: 100%">TASK SCHEDULE</span>
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th class="op-1 text-center">Aksi</th>
                                <th class="op-1">Schedule Title</th>
                                <th class="common-information">Start Date</th>
                                <th class="op-1">End Date</th>
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
                                            <a href="{{route('task_schedule.edit', $dt->id)}}" class="bg-primary p-2 text-white mb-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="update"><i class='bx bx-edit'></i></a>
                                            
                                        </div>
                                        <div class="">
                                            <form method="POST" action="{{ route('task_schedule.destroy', $dt->id) }}">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit" class="bg-danger text-white mb-2 show_confirm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="trash"><i class='bx bxs-trash-alt' ></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                <td>{{$dt->title}}</td>
                                <td>{{$dt->start}}</td>
                                <td>{{$dt->end}}</td>
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

<!-- Modal CREATE -->
<div class="modal fade" id="modalTaskSchedule1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Creating...</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <h5 class="text-center">Form Task Schedule</h5>
        <hr>
        <form action="" id="form-add-schedule">
            <div class="form-group mb-1">
            <label for="">Title</label>
                <select name="title" id="title" class="form-select">
                    <option value="" disabled selected>-- Select Title --</option>
                    <option value="Burner">Burner</option>
                    <option value="Sootblower">Sootblower</option>
                    <option value="EDG">EDG</option>
                    <option value="CO Boiler">CO Boiler</option>
                    <option value="CO Turbine">CO Turbine</option>
                    <option value="CO Common">CO Common</option>
                </select>
            </div>
            <div class="form-group mb-1">
                <label for="">Start Date</label>
                <input type="date" name="start" id="start" class="form-control">
            </div>
            <div class="form-group mb-1">
                <label for="">End Date</label>
                <input type="date" name="end" id="end" class="form-control">
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="save">Save</button>
    </div>
    </div>
</div>
</div>

@push('add-script')
<script>
     $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#example').DataTable({
                scrollY: 300,
                scrollX: true,
            });

            $('#save').click(function (e) {
                e.preventDefault();
                $(this).html('Sending..');

                $.ajax({
                    url: "{{route('task_schedule.store')}}",
                    method: 'POST',
                    data: $('#form-add-schedule').serialize(),
                    dataType: 'JSON',
                    success: function(data){
                        if(data.success){
                            swal({
                                title: "Successully!",
                                text: "Laporan Berhasil Disimpan",
                                icon: "success",
                                button: "simpan",
                            });
                            $('#form-add-schedule').trigger("reset");
                            $('#modalTaskLeader1').modal('hide');
                            $("span").remove('#error')
                            window.location = "{{route('task_schedule.index')}}"
                        }else{
                            console.log('gagal');
                        }
                    },
                    error: function(err){
                        $.each(err.responseJSON.errors,function(field_name,error){
                            $(document).find('[name='+field_name+']').after('<small class="text-strong text-danger" id="error">Mohon Isi</small>')
                            })
                            setTimeout(() => {
                                $('small#error').remove();
                            }, 5000);
                    }
                });
            });
            setTimeout(() => {
            $('.notif-updated').hide();
        }, 1000);
    });
</script>
@endpush

