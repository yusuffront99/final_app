
@extends('layouts.main')

@section('content')
@include('includes.navbar')
    <!-- Content wrapper -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="mb-4 rounded-pill fw-bold">
            <div class="row">
                    <div class="col-lg-8 col-sm-9">
                        <div class="p-2">
                            <a href="{{route('dashboard')}}" class="text-primary">
                                <i class='bx bxs-dashboard'></i> Dashboard
                            </a>
                            /
                            <span class="text-warning mx-2">
                                New Register
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
        <div class="mx-auto">
            <div class="rounded text-dark">
                <div class="row shadow-sm bg-light rounded p-3">
                    <h6 class="text-white bg-dark p-3 text-center rounded p-3">New Personil</h6>
                    
                    <hr>
                    <div class="my-1">
                        <form action="{{route('process-registration')}}" id="form-new-register" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row mx-auto">
                                <div class="col-lg-6">
                                <div class="form-group mx-2 mb-1">
                                        <label for="" class="fw-bold">NIP</label>
                                        <input type="text" name="nip" id="nip" class="form-control" value="{{ old('nip') }}" required>
                                        <span class="error password-error"></span>
                                    </div>
                                    <div class="form-group mx-2 mb-1">
                                        <label for="" class="fw-bold">Nama Lengkap</label>
                                        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="{{ old('nama_lengkap') }}" required>
                                    </div>
                                    <div class="form-group mx-2 mb-1">
                                        <label for="" class="fw-bold">Nama Panggilan</label>
                                        <input type="text" name="nama_panggilan" id="nama_panggilan" class="form-control" value="{{ old('nama_panggilan') }}" required>
                                    </div>
                                    <div class="form-group mx-2 mb-1">
                                        <label for="" class="fw-bold">Email</label>
                                        <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}" required placeholder="email@">
                                        <span class="error email-error"></span>
                                    </div>
                                    <div class="form-group mx-2 mb-1">
                                        <label for="" class="fw-bold">Password</label>
                                        <input type="password" name="password" id="password" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                <div class="form-group mx-2 mb-1">
                                        <label for="" class="fw-bold">Bagian</label>
                                        <select name="divisi" id="divisi" class="form-select">
                                            <option value="Operasi">Operasi</option>
                                            <option value="Pemeliharaan">Pemeliharaan</option>
                                            <option value="Admin">Admin</option>
                                        </select>
                                    </div>
                                    <div class="form-group mx-2 mb-1">
                                        <label for="" class="fw-bold">Tim Divisi</label>
                                        <select name="tim_divisi" id="tim_divisi" class="form-select">
                                            <option value="Shift E">Shift E</option>
                                            <option value="Shift F">Shift F</option>
                                            <option value="Shift G">Shift G</option>
                                            <option value="Shift H">Shift H</option>
                                            <option value="">----</option>
                                            <option value="Tim Har">Tim Har</option>
                                            <option value="Tim BOT">Tim BOT</option>
                                            <option value="Admin">Admin</option>
                                        </select>
                                    </div>
                                    <div class="form-group mx-2 mb-1">
                                        <label for="" class="fw-bold">Jabatan</label>
                                        <select name="jabatan" id="jabatan" class="form-select">
                                            <option value="Operator Boiler">Operator Boiler</option>
                                            <option value="Operator Turbine">Operator Turbine</option>
                                            <option value="Supervisor Operasi">Supervisor Operasi</option>
                                            <option value="Supervisor Pemeliharaan">Supervisor Pemeliharaan</option>
                                            <option value="Admin">Admin</option>
                                        </select>
                                    </div>
                                    <div class="form-group mx-2 mb-1">
                                        <label for="" class="fw-bold">Atasan</label>
                                        <select name="atasan" id="atasan" class="form-select">
                                            <option value="-">-- Leaders --</option>
                                            @foreach ($leaders as $ld)
                                                <option value="{{$ld->nama_lengkap}}">{{$ld->nama_lengkap}} - {{$ld->jabatan}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group mx-2 mb-1">
                                        <label for="" class="fw-bold">Profile Image</label>
                                        <input type="text" name="" id="" disabled placeholder="-" class="form-control">
                                        <input type="hidden" name="profile_img" id="profile_img" class="form-control" value="-">
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid gap-2 px-4 py-2">
                                <button type="submit" class="btn btn-success text-center" id="btn-save">Save</button>
                            </div>
                        </form>
                    </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
                    url: "{{route('process-registration')}}",
                    method: 'POST',
                    data: $('#form-new-register').serialize(),
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
                          
                            window.location = "{{route('dashboard')}}"
                        }else{
                            console.log('gagal');
                        }
                    },
                    error: function(err){
                        $.each(err.responseJSON.errors,function(field_name,error){
                        $(document).find('[name='+field_name+']').after('<small class="text-strong text-danger" id="error">'+error+'</small>')
                        })
                        setTimeout(() => {
                            $('small#error').remove();
                        }, 5000);
                    }
                });
            });
        });
    </script>   
@endpush
