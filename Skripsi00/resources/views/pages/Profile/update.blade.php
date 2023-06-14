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
                            <a href="{{route('home')}}" class="text-primary">
                                <i class="bx bx-home-circle"></i> Home
                            </a>
                            /
                            <a href="" class="text-primary mx-2">
                                Profile
                            </a>
                            /
                            <span class="text-warning mx-2">
                                Update
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
                            <a href="{{route('profile.index')}}" class="btn btn-sm btn-primary rounded-pill"><i class='bx bx-left-arrow-circle'></i> Back</a>
                        </div>
                        <h6 class="text-white bg-dark p-3 text-center rounded p-3">Update Profile</h6>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <hr>
                        <div class="my-1">
                            <form action="{{route('profile.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <input type="hidden" name="{{$user->id}}">
                                        <div class="form-group">
                                            <label for="">NIP</label>
                                            <input type="text" name="nip" id="nip" class="form-control mb-2" value="{{$user->nip}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nama Lengkap</label>
                                            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control mb-2" value="{{$user->nama_lengkap}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nama Panggilan</label>
                                            <input type="text" name="nama_panggilan" id="nama_panggilan" class="form-control mb-2" value="{{$user->nama_panggilan}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" name="email" id="email" class="form-control mb-2" value="{{$user->email}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Divisi</label>
                                            <select name="divisi" id="divisi" class="form-select">
                                                <option value="Admin" selected hidden>-- Pilih Divisi --</option>
                                                <option value="Operasi" {{$user->divisi == 'Operasi' ? 'selected' : ''}}>Operasi</option>
                                                <option value="Pemeliharaan" {{$user->divisi == 'Pemeliharaan' ? 'selected' : ''}}>Pemeliharaan</option>
                                                <option value="Rendal Op" {{$user->divisi == 'Rendal Op' ? 'selected' : ''}}>Rendal Op</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tim Divisi</label>
                                            <select name="tim_divisi" id="tim_divisi" class="form-select">
                                                <option value="Admin" selected hidden>-- Pilih Divisi --</option>
                                                <option value="Shift E" {{$user->tim_divisi == 'Shift E' ? 'selected' : ''}}>Shift E</option>
                                                <option value="Shift F" {{$user->tim_divisi == 'Shift F' ? 'selected' : ''}}>Shift F</option>
                                                <option value="Shift G" {{$user->tim_divisi == 'Shift G' ? 'selected' : ''}}>Shift G</option>
                                                <option value="Shift H" {{$user->tim_divisi == 'Shift H' ? 'selected' : ''}}>Shift H</option>
                                                <option value="">----</option>
                                                <option value="Tim Har" {{$user->tim_divisi == 'Tim Har' ? 'selected' : ''}}>Tim Har</option>
                                                <option value="Tim BOT" {{$user->tim_divisi == 'Tim BOT' ? 'selected' : ''}}>Tim BOT</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="">Jabatan</label>
                                            <select name="jabatan" id="jabatan" class="form-select">
                                                <option value="-" selected hidden>-- Pilih Jabatan --</option>
                                                <option value="Operator Boiler" {{$user->jabatan == 'Operator Boiler' ? 'selected' : ''}}>Operator Boiler</option>
                                                <option value="Operator Turbine" {{$user->jabatan == 'Operator Turbine' ? 'selected' : ''}}>Operator Turbine</option>
                                                <option value="Supervisor Operasi" {{$user->jabatan == 'Supervisor Operasi' ? 'selected' : ''}}>Supervisor Operasi</option>
                                                <option value="Supervisor Pemeliharaan" {{$user->jabatan == 'Supervisor Pemeliharaan' ? 'selected' : ''}}>Supervisor Pemeliharaan</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Atasan</label>
                                            <select name="atasan" id="atasan" class="form-select">
                                                @foreach ($leaders as $ld)
                                                    @if (Auth::user()->atasan == "-")
                                                        <option value="-" selected hidden>-- Default --</option>
                                                    @else
                                                        <option value="{{$ld->nama_lengkap}}" {{$user->atasan == $ld->nama_lengkap ? 'selected' : ''}}>{{$ld->nama_lengkap}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    
                                        <div class="form-group mb-2">
                                            <label for="">Foto Profil</label>
                                            <input type="hidden" name="oldImage" value="{{$user->profile_img}}">
                                            <input type="file" name="profile_img" value="{{$user->profile_img}}" class="form-control" required>
                                        </div>
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
<!-- Button trigger modal -->

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
