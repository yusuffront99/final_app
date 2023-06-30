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
                            <a href="{{route('admin.index.sootblower')}}" class="text-primary mx-2">
                                Data Sootblower System
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
                <div class="m-auto rounded text-dark">
                    
                    <form action="{{route('admin.update.sootblower', $data_id->id)}}" method="POST" class="mx-auto" id="form-sootblower-system">
                        @csrf
                        @method('put')
                        <div class="row shadow-sm p-3 bg-light rounded">
                            <div class="mb-2">
                                <a href="{{route('admin.index.sootblower')}}" class="btn btn-sm btn-primary"><i class='bx bx-left-arrow-circle'></i> Back</a>
                            </div>
                            <h6 class="text-white bg-dark p-3 text-center rounded-pill">Form Laporan Sootblower System</h6>
                            
                            <hr>
                            <div class="col-lg-6 col-md-6 text-dark fw-bold">
                                <div class="form-group mb-2 mx-3">
                                    <input type="hidden" name="id" value="{{$data_id->id}}">
                                    <input type="hidden" name="catatan_spv" value="{{$data_id->catatan_spv}}">

                                    <label for="nip">NIP</label>
                                    <select name="nip" id="nip" class="form-select">
                                        <option value="{{$data_id->users->nip}}">{{$data_id->users->nip}}</option>
                                    </select>
                                </div>
                                <div class="form-group mb-2 mx-3">
                                    <label for="user_id">Nama Operator I</label>
                                    <select name="user_id" id="user_id" class="form-select">
                                        <option value="{{$data_id->users->id}}">{{$data_id->users->nama_lengkap}}</option>
                                    </select>
                                </div>
                                <div class="form-group mb-2 mx-3">
                                    <label for="operator_kedua">Nama Operator II <sup style="color:salmon">(*Optional)</sup></label>
                                    <select name="operator_kedua" id="operator_kedua" class="form-select">
                                        <option value="-">-- Pilih Operator --</option>
                                        @foreach ($users as $user)
                                            <option value="{{$user->nama_lengkap}}">{{$user->nama_lengkap}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-2 mx-3">
                                    <label for="">Nama Supervisor</label>
                                    <select name="atasan" id="atasan" class="form-select @error('atasan') is-invalid @enderror" name="atasan" required autocomplete="atasan">
                                        <option value="{{$data_id->users->atasan}}">{{$data_id->users->atasan}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 text-dark fw-bold">
                                <div class="form-group mb-2 mx-3">
                                    <label for="">Operator Shift</label>
                                    <select name="operator_shift" id="operator_shift" class="form-select @error('operator_shift') is-invalid @enderror" name="operator_shift" required autocomplete="operator_shift">
                                        <option value="{{$data_id->users->tim_divisi}}">{{$data_id->users->tim_divisi}}</option>
                                    </select>
                                </div>
                                <div class="form-group mb-2 mx-3">
                                    <label for="">Unit Pembangkit</label>
                                    <select name="unit" id="unit" class="form-select @error('unit') is-invalid @enderror" name="unit" required autocomplete="unit">
                                        <option value="" selected hidden>-- Pilih Unit --</option>
                                        <option value="Unit 3" {{$data_id->unit == 'Unit 3' ? 'selected' : ''}}>Unit 3</option>
                                        <option value="Unit 4" {{$data_id->unit == 'Unit 4' ? 'selected' : ''}}>Unit 4</option>
                                    </select>
                                </div>
                                <div class="form-group mb-2 mx-3">
                                    <label for="tanggal_update">Tanggal Update</label>
                                    <input value="{{$data_id->tanggal_update}}" type="date" name="tanggal_update" id="tanggal_update" class="form-control" required autocomplete="tanggal_update">
                                </div>
                                <div class="form-group mb-2 mx-3">
                                    <label for="jam_update">Jam Update</label>
                                    <input value="{{$data_id->jam_update}}" type="time" name="jam_update" id="jam_update" class="form-control" required autocomplete="jam_update">
                                </div>
                                <div class="form-group mb-2 mx-3">
                                    <label for="" class="text-danger fw-bold">Equipment Status</label>
                                    <select name="status_equipment_id" id="status_equipment_id" class="form-select text-danger">
                                        @foreach ($status as $st)
                                            <option value="{{$st->id}}" {{$data_id->status_equipment_id == $st->id ? 'selected' : ''}}>{{$st->status_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr class="text-danger">
            
                                <div class="fw-bold">
                                <ul>
                                    <li>Sootblower Type-L : </li>
                                    @include('commons.validation_sbl_type_L')
                                    <li>Sootblower Type-C : </li>
                                    @include('commons.validation_sbl_type_C')
                                    <li>Sootblower Type-G/YB : </li>
                                    @include('commons.validation_sbl_type_G')
                                    <br><br>
                                    <li class="text-danger">
                                        <div class="text-warning">Catatan : </div>
                                        {!!$data_id->keterangan!!}
                                    </li>
                                </ul>
                                </div>
                                <hr>
                                <div class="card">
                                    <div class="m-2 badge bg-danger">
                                        Ceklist Sootblower
                                    </div>
                                    <hr>
                                    <div class="text-dark fw-bold">
                                    <ul>
                                        <li>Sootblower Type-L (Short)</li>
                                        @include('commons.har_ceklists_sbl_type_L')
                                        <br>
                                        <li>Sootblower Type-C (Long)</li>
                                        @include('commons.har_ceklists_sbl_type_C')
                                        <br>
                                        <li>Sootblower Type-G/YB (Rotate/Swing)</li>
                                        @include('commons.har_ceklists_sbl_type_G')
                                    </ul>
                                    </div>
                                </div>
                                <br>
                                
                                <div class="col-12">
                                    <div class="">
                                        <div class="form-control">
                                            <label for="keterangan" class="text-primary fw-bold">Keterangan Gangguan <small class="text-danger">*</small></label>
                                            <input id="keterangan" type="hidden" name="keterangan" value="{{$data_id->keterangan}}" required>
                                            <trix-editor input="keterangan"></trix-editor>
                                        </div>
                                    </div>
                                <br>
                                <br>
                                <hr class="line-dash">
                                <div class="my-2 text-center">
                            <div class="d-grid gap-2 px-4 py-2">
                                <button type="submit" class="btn btn-success text-center" id="btn-save">Save</button>
                            </div>
                        </div>
                    </form>
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
                    url: "{{route('sootblower_system.update')}}",
                    method: 'POST',
                    data: $('#form-sootblower-system').serialize(),
                    dataType: 'JSON',
                    success: function(data){
                        if(data.success){
                            swal({
                                title: "Successully!",
                                text: "Laporan Berhasil Disimpan",
                                icon: "success",
                                button: "simpan",
                            });
                            // $("#form-sootblower-system")[0].reset(),
                            $("span").remove('#error')
                            window.location = "{{route('sootblower_system.index')}}"
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
