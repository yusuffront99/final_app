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
                            <a href="{{route('admin.index.coboiler')}}" class="text-primary mx-2">
                                Data CO Boiler
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
                    
                    <form action="{{route('admin.update.coboiler', $data_id->id)}}" method="POST" class="mx-auto" id="form-coboiler-system">
                        @csrf
                        @method('put')
                        <div class="row shadow-sm p-3 bg-light rounded">
                            <div class="mb-2">
                                <a href="{{route('admin.index.coboiler')}}" class="btn btn-sm btn-primary rounded-pill"><i class='bx bx-left-arrow-circle'></i> Back</a>
                            </div>
                            <h6 class="text-white bg-dark p-3 text-center rounded-pill">Form Change Over Boiler</h6>
                            <hr>
                            <div class="col-lg-6 col-md-6 text-dark fw-bold">
                                <input type="hidden" name="id" value="{{$data_id->id}}">
                                <input type="hidden" name="catatan_spv" value="-">
                                <div class="form-group mb-2 mx-3">
                                    <label for="nip">NIP</label>
                                    <input type="text" class="form-control" value="{{$data_id->users->nip}}">
                                </div>
                                <div class="form-group mb-2 mx-3">
                                    <label for="user_id">Nama Operator I</label>
                                    <select name="user_id" id="user_id" class="form-select">
                                        <option value="{{$data_id->users->id}}">{{$data_id->users->nama_lengkap}}</option>
                                    </select>
                                </div>
                                <div class="form-group mb-2 mx-3">
                                    <label for="">Operator Shift</label>
                                    <select name="operator_shift" id="operator_shift" class="form-select @error('operator_shift') is-invalid @enderror" name="operator_shift" required autocomplete="operator_shift">
                                        <option value="{{$data_id->operator_shift}}">{{$data_id->operator_shift}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 text-dark fw-bold">
                                
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
                            </div>
                            <hr class="text-danger">
                            <div class="text-center text-danger fw-bold mb-4">
                                Form Change Over Boiler
                            </div>
                            <div class="col-lg-6 col-md-6 fw-bold">
                                <div class="form-group mb-2 mx-3">
                                    <label for="nama_peralatan">Nama Peralatan</label>
                                    <input value="{{$data_id->nama_peralatan}}" type="text" name="nama_peralatan" id="nama_peralatan" class="form-control">
                                </div>
                                <div class="form-group mb-2 mx-3">
                                    <label for="">Peralatan Operasi</label>
                                    <div class="row my-1">
                                        <div class="col">
                                            <h6 class="text-center">Pertama</h6>
                                            <input value="{{$data_id->operasi_awal}}" type="text" name="operasi_awal" id="operasi_awal" class="form-control" required>
                                        </div>
                                        <div class="col">
                                            <h6 class="text-center">Rencana</h6>
                                            <input value="{{$data_id->rencana_operasi}}" type="text" name="rencana_operasi" id="rencana_operasi" class="form-control" required>
                                        </div>
                                        <div class="col">
                                            <h6 class="text-center">Terakhir</h6>
                                            <input value="{{$data_id->operasi_akhir}}" type="text" name="operasi_akhir" id="operasi_akhir" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-2 mx-3">
                                    <label for="">Status Kegiatan</label>
                                    <select name="status_kegiatan" id="status_kegiatan" class="form-select">
                                        <option value="" selected hidden>-- Status Kegiatan --</option>
                                        <option value="Terlaksana" {{$data_id->status_kegiatan == 'Terlaksana' ? 'Selected' : ''}}>Terlaksana</option>
                                        <option value="Tidak Terlaksana" {{$data_id->status_kegiatan == 'Tidak Terlaksana' ? 'Selected' : ''}}>Tidak Terlaksana</option>
                                    </select>
                                </div>
                            </div>
                            {{-- =============== --}}
                            <div class="col-lg-6 col-md-6 text-dark fw-bold">
                                <div class="form-group mb-2 mx-3">
                                    <label for="">Status peralatan</label>
                                    <select name="status_peralatan" id="status_peralatan" class="form-select">
                                        <option value="" selected hidden>-- Status peralatan --</option>
                                        <option value="Normal" {{$data_id->status_peralatan == 'Normal' ? 'Selected' : ''}}>Normal</option>
                                        <option value="Abnormal" {{$data_id->status_peralatan == 'Abnormal' ? 'Selected' : ''}}>Abnormal</option>
                                    </select>
                                </div>
                                <div class="form-group mb-2 mx-3">
                                    <label for="">Keterangan</label>
                                    <textarea name="keterangan" id="" cols="3" rows="2" class="form-control">{{$data_id->keterangan}}</textarea>
                                </div>
                                <div class="form-group mb-2 mx-3">
                                    <label for="" class="text-danger fw-bold">Equipment Status</label>
                                    <select name="status_equipment_id" id="status_equipment_id" class="form-select text-danger">
                                        @foreach ($status as $st)
                                            <option value="{{$st->id}}" {{$data_id->status_equipment_id == $st->id ? 'selected' : ''}}>{{$st->status_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" name="catatan" value="-">
                            </div>
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
