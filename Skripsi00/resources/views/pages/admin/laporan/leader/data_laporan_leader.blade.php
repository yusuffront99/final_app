
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
                                Data Leaders
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
                        <div class="">
                            <a class="btn btn-success" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modalLeader1" id="add-leader"><i class='bx bxs-plus-circle'></i> Add Leader</a>
                        </div>
                        {{-- <div class="row">
                            <form action="{{route('print.admin.laporan_user')}}" method="GET" target="_blank">
                                <div class="input-group mb-3">
                                    <input type="date" class="form-control" name="first_date" required>
                                    <input type="date" class="form-control" name="last_date" required>
                                    <button class="btn btn-success" type="submit">PRINT</button>
                                </div>
                            </form>
                        </div> --}}
                    </div>
                    <br>
                    @include('commons.validasi_success_update')
                    <table class="table table-striped table-hovered" id="example">
                        <span class="badge bg-primary p-3 fw-bold rounded mb-4" style="width: 100%">DATA LEADERS</span>
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th class="op-1 text-center">Aksi</th>
                                <th class="op-1">NIP</th>
                                <th class="op-1">Nama Lengkap</th>
                                <th class="tgl-col">Jabatan</th>
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
                                                <a href="javascript:void(0)" data-id="{{$dt->id}}" class="bg-primary p-2 text-white mb-2"  id="editLeader"><i class='bx bx-edit'></i></a>
                                                {{-- <a href="" class="bg-primary p-2 text-white mb-2 btn-edit"><i class='bx bx-edit'></i></a> --}}
                                            </div>
                                            <div class="">
                                                <form method="POST" action="{{ route('leader.destroy', $dt->id) }}">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit" class="bg-danger p-2 text-white mb-2 show_confirm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete"><i class='bx bxs-trash-alt' ></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{$dt->nip}}</td>
                                    <td>{{$dt->nama_lengkap}}</td>
                                    <td>{{$dt->jabatan}}</td>
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

<!-- Modal CREATE -->
<div class="modal fade" id="modalLeader1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Creating...</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <h5 class="text-center">Form Leader</h5>
        <hr>
        <form action="" id="form-add-leader">
            <div class="form-group mb-1">
                <label for="">NIP <sup class="fw-bold text-danger">@Masukkan NIP, lalu Enter</sup></label>
                <input type="hidden" name="id" id="id">
                <input type="text" name="nip" id="nip" class="form-control">
            </div>
            <div class="form-group mb-1">
                <label for="">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control">
            </div>
            <div class="form-group mb-1">
                <div class="form-group mb-1">
                    <label for="">Jabatan</label>
                    <input type="text" name="jabatan" id="jabatan" class="form-control">
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="leader-save">Save</button>
    </div>
    </div>
</div>
</div>
{{-- 
<!-- Modal EDIT -->
<div class="modal fade" id="modalLeader2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <h5 class="text-center">Form Leader</h5>
        <hr>
        <form action="" id="form-add-leader">
            <div class="form-group mb-1">
                <label for="">NIP</label>
                <input type="hidden" id="id" name="id">
                <input type="text" name="nip1" id="nip1" class="form-control">
            </div>
            <div class="form-group mb-1">
                <label for="">Nama Lengkap</label>
                <input type="text" name="nama_lengkap1" id="nama_lengkap1" class="form-control">
            </div>
            <div class="form-group mb-1">
                <div class="form-group mb-1">
                    <label for="">Jabatan</label>
                    <input type="text" name="jabatan1" id="jabatan1" class="form-control">
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="add-leader">Update</button>
    </div>
    </div>
</div>
</div> --}}



@push('add-script')
<script>
    $(document).ready(function(){
        $('#example').DataTable({
            scrollY: 300,
            scrollX: true,
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('#nip').keypress(function(){
            $.ajax({
                url: 'leader/' + $(this).val(),
                type: 'get',
                data: {},
                success:function(response){
                    if(response.success == true){
                        $('#nama_lengkap').val(response.data.nama_lengkap);
                        $('#jabatan').val(response.data.jabatan);
                    }
                }
            });
        })

        $('#add-leader').click(function(){
            $('#form-add-leader').trigger("reset");
        })

        $('#leader-save').click(function (e) {
            e.preventDefault();
            $(this).html('Sending..');
        
            $.ajax({
                url: "{{route('leader.store')}}",
                method: 'POST',
                data: $('#form-add-leader').serialize(),
                dataType: 'JSON',
                success: function(data){
                    if(data.success){
                        swal({
                            title: "Successully!",
                            text: "Laporan Berhasil Disimpan",
                            icon: "success",
                            button: "simpan",
                        });
                        // $("#form-burner-system")[0].reset(),
                        $('#form-add-leader').trigger("reset");
                        $('#modalLeader1').modal('hide');
                        $("span").remove('#error')
                        window.location = "{{route('leader.index')}}"
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
        })

        // --- UPDATE
        $('body').on('click', '#editLeader', function () {
            var id = $(this).data('id');
            $.get('leader/'+id+'/edit', function (data) {
                $('#modalLeader1').modal('show');
                $('#id').val(data.id);
                $('#nip').val(data.nip);
                $('#nama_lengkap').val(data.nama_lengkap);
                $('#jabatan').val(data.jabatan);
            })
        });
        

        $('.show_confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Are you sure you want to delete?`,
                text: "The data will be delete forever it",
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

        $('.container').on('click', '#deleteLeader', function(){
            var id = $(this).data('id');
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this",
                icon: "warning",
                showCancelButton: true,
                ConfirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                ConfirmButtonText: 'Yes, delete it!'
            }).then(function(e){
                if(e.isConfirmed === true){
                    $.ajax({
                        type: 'DELETE',
                        url: "{{route('leader.index')}}"+"/"+id,
                        success: function(data){
                            if(data.success === true){
                                Swal.fire(
                                    'Deleted',
                                    'Your file has been deleted',
                                    'success'
                                )
                            }
                            table.draw()
                        },
                        error: function(data){
                            console.log('Error : ', data);
                        }
                    });
                }
            });
        });

        setTimeout(() => {
        $('.notif-updated').hide();
    }, 1000);
    });
</script>
@endpush