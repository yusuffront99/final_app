@extends('layouts.main')

@section('content')
@include('includes.navbar')
<div class="container">
    <div class="content-wrapper mt-2">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="mb-4 rounded-pill fw-bold">
                <div class="row">
                    <div class="col-lg-8 col-sm-9">
                        <div class="p-2">
                            <a href="" class="text-primary">
                                <i class="bx bx-home-circle"></i> Home
                            </a>
                            /
                            <a href="{{route('admin.index.user')}}" class="text-primary mx-2">
                                Data User
                            </a>
                            /
                            <span class="text-warning mx-2">
                                Validation
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-3 text-center">
                        <div class="badge bg-danger text-white">
                            Today : 
                            <span id="timer"></span>
                        </div>
                    </div>
                </div>
            </div>
            
            <hr>
            <div class="mx-auto">
                <div class="rounded text-dark">
                    <div class="row shadow-sm bg-light rounded p-3">
                        <div class="mb-2">
                            <a href="{{route('admin.index.user')}}" class="btn btn-sm btn-primary rounded-pill"><i class='bx bx-left-arrow-circle'></i> Back</a>
                        </div>
                        <h6 class="text-white bg-dark p-3 text-center rounded p-3">Form User</h6>
                        <hr>
                        <div class="my-1">
                            <form action="{{route('admin.update.user', $data_id->id)}}" method="POST">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <input type="hidden" name="{{$data_id->id}}">
                                        <div class="form-group">
                                            <label for="">NIP</label>
                                            <input type="text" name="nip" id="nip" class="form-control mb-2" value="{{$data_id->nip}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nama Lengkap</label>
                                            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control mb-2" value="{{$data_id->nama_lengkap}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nama Panggilan</label>
                                            <input type="text" name="nama_panggilan" id="nama_panggilan" class="form-control mb-2" value="{{$data_id->nama_panggilan}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" name="email" id="email" class="form-control mb-2" value="{{$data_id->email}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="">Divisi</label>
                                            <select name="divisi" id="divisi" class="form-select">
                                                <option value="Operasi" {{$data_id->divisi == 'Operasi' ? 'selected' : ''}}>Operasi</option>
                                                <option value="Pemeliharaan" {{$data_id->divisi == 'Pemeliharaan' ? 'selected' : ''}}>Pemeliharaan</option>
                                                <option value="Rendal Op" {{$data_id->divisi == 'Rendal Op' ? 'selected' : ''}}>Rendal Op</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tim Divisi</label>
                                            <select name="tim_divisi" id="tim_divisi" class="form-select">
                                                <option value="Shift E" {{$data_id->tim_divisi == 'Shift E' ? 'selected' : ''}}>Shift E</option>
                                                <option value="Shift F" {{$data_id->tim_divisi == 'Shift F' ? 'selected' : ''}}>Shift F</option>
                                                <option value="Shift G" {{$data_id->tim_divisi == 'Shift G' ? 'selected' : ''}}>Shift G</option>
                                                <option value="Shift H" {{$data_id->tim_divisi == 'Shift H' ? 'selected' : ''}}>Shift H</option>
                                                <option value="">----</option>
                                                <option value="Tim Har" {{$data_id->tim_divisi == 'Tim Har' ? 'selected' : ''}}>Tim Har</option>
                                                <option value="Tim BOT" {{$data_id->tim_divisi == 'Tim BOT' ? 'selected' : ''}}>Tim BOT</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Jabatan</label>
                                            <select name="jabatan" id="jabatan" class="form-select">
                                                <option value="Operator Boiler" {{$data_id->jabatan == 'Operator Boiler' ? 'selected' : ''}}>Operator Boiler</option>
                                                <option value="Operator Turbine" {{$data_id->jabatan == 'Operator Turbine' ? 'selected' : ''}}>Operator Turbine</option>
                                                <option value="Supervisor Operasi" {{$data_id->jabatan == 'Supervisor Operasi' ? 'selected' : ''}}>Supervisor Operasi</option>
                                                <option value="Supervisor Pemeliharaan" {{$data_id->jabatan == 'Supervisor Pemeliharaan' ? 'selected' : ''}}>Supervisor Pemeliharaan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Atasan</label>
                                            <select name="atasan" id="atasan" class="form-select">
                                                @foreach ($leaders as $ld)
                                                    <option value="{{$ld->nama_lengkap}}" {{$data_id->atasan == $ld->nama_lengkap ? 'selected' : ''}}>{{$ld->nama_lengkap}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{-- <div class="form-group">
                                            <label for="">Nama Panggilan</label>
                                            <input type="text" name="nama_panggilan" id="nama_panggilan" class="form-control mb-2" value="{{$data_id->}}">
                                        </div> --}}
                                    </div>
                                    <div class="d-grid gap-2 py-2">
                                        <button type="submit" class="btn btn-success text-center" id="btn-save">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')
@endsection

{{-- @push('add-script')
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('#btn-save').click((e)=>{

                e.preventDefault();

                $.ajax({
                    url: "{{route('burner_system.update')}}",
                    method: 'POST',
                    data: $('#form-burner-system').serialize(),
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
                            $("span").remove('#error')
                            window.location = "{{route('burner_system.index')}}"
                        }else{
                            console.log('gagal');
                        }
                    },
                    error: function(err){
                        $.each(err.responseJSON.errors,function(field_name,error){
                        $(document).find('[name='+field_name+']').after('<span class="text-strong text-danger" id="error">' +error+ '</span>')
                        })
                    }
                });
            });
        });
    </script>   
@endpush --}}
