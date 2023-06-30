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
                            <a href="{{route('admin.index.edg')}}" class="text-primary mx-2">
                            Data EDG System
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
                    <form action="{{route('admin.update.edg', $data_id->id)}}" method="POST" class="mx-auto" id="form-burner-system">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id" value="{{$data_id->id}}">
                        <input type="hidden" name="catatan_spv" value="-">
                        <div class="row shadow-sm p-3 bg-light rounded">
                            <div class="mb-2">
                                <a href="{{route('admin.index.edg')}}" class="btn btn-sm btn-primary rounded-pill"><i class='bx bx-left-arrow-circle'></i> Back</a>
                            </div>
                            <h6 class="text-white bg-dark p-3 text-center rounded-pill">Form Laporan EDG System</h6>
                            <hr>
                            <div class="col-lg-6 col-md-6 text-dark fw-bold">
                                <div class="form-group mb-2 mx-3">
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
                            </div>
                
                            <div class="col-lg-6 col-md-6 text-dark fw-bold">
                                <div class="form-group mb-2 mx-3">
                                    <label for="">Nama Supervisor</label>
                                    <select name="atasan" id="atasan" class="form-select @error('atasan') is-invalid @enderror" name="atasan" required autocomplete="atasan">
                                        @foreach ($leaders as $ld)
                                            <option value="{{$ld->nama_lengkap}}" {{$ld->nama_lengkap == $data_id->atasan ? 'selected' : ''}}>{{$ld->nama_lengkap}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-2 mx-3">
                                    <label for="">Operator Shift</label>
                                    <select name="operator_shift" id="operator_shift" class="form-select @error('operator_shift') is-invalid @enderror" name="operator_shift" required autocomplete="operator_shift">
                                        <option value="" selected hidden>-- Pilih Shift --</option>
                                        <option value="Shift E" {{$data_id->operator_shift == 'Shift E' ? 'selected' : ''}}>SHIFT E</option>
                                        <option value="Shift F" {{$data_id->operator_shift == 'Shift F' ? 'selected' : ''}}>SHIFT F</option>
                                        <option value="Shift G" {{$data_id->operator_shift == 'Shift G' ? 'selected' : ''}}>SHIFT G</option>
                                        <option value="Shift H" {{$data_id->operator_shift == 'Shift H' ? 'selected' : ''}}>SHIFT H</option>
                                    </select>
                                </div>
                                <div class="form-group mb-2 mx-3">
                                    <label for="tanggal_update">Tanggal Update</label>
                                    <input type="date" name="tanggal_update" id="tanggal_update" class="form-control" required autocomplete="tanggal_update" value="{{$data_id->tanggal_update}}">
                                </div>
                            </div>
                            <hr class="text-danger">
                            <div class="text-center text-danger fw-bold mb-4">
                                Form Emegency Diesel Generator
                            </div>
                            <div class="row mx-1">
                                <div class="col-lg-4 col-md-4 fw-bold mb-2">
                                    <div class="form-group mb-2">
                                        <label for="">Level BBM Awal (MM)</label>
                                        <input type="text" name="lev_bbm_awal" id="lev_bbm_awal" class="form-control" placeholder="000" required value="{{$data_id->lev_bbm_awal}}">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Level Oli </label>
                                        <select name="lev_oli" id="lev_oli" class="form-select">
                                            <option value="" selected hidden>-- Pilih Status --</option>
                                            <option value="Normal" {{$data_id->lev_oli == 'Normal' ? 'selected' : ''}}>Normal</option>
                                            <option value="Abnormal" {{$data_id->lev_oli == 'Abnormal' ? 'selected' : ''}}>Abnormal</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Tegangan Battery (V)</label>
                                        <input type="text" name="teg_battery" id="teg_battery" class="form-control" placeholder="00.00" required  value="{{$data_id->teg_battery}}">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Jam Start</label>
                                        <input type="time" name="jam_start" id="jam_start" class="form-control" required  value="{{$data_id->jam_start}}">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 fw-bold mb-2">
                                    <div class="form-group mb-2">
                                        <label for="">Tegangan Output (V)</label>
                                        <input type="text" name="teg_out" id="teg_out" class="form-control" placeholder="000 / 000" required  value="{{$data_id->teg_out}}">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Frekuensi (HZ)</label>
                                        <input type="text" name="frekuensi" id="frekuensi" class="form-control" placeholder="00.00" required  value="{{$data_id->frekuensi}}">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Putaran (RPM)</label>
                                        <input type="text" name="putaran" id="putaran" class="form-control" placeholder="0000" required  value="{{$data_id->putaran}}">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Temp Coolant (oC)</label>
                                        <input type="text" name="temp_coolant" id="temp_coolant" class="form-control" placeholder="00" required  value="{{$data_id->temp_coolant}}">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 fw-bold mb-2">
                                    <div class="form-group mb-2">
                                        <label for="">Pressure Oli (KPa)</label>
                                        <input type="text" name="press_oli" id="press_oli" class="form-control" placeholder="000" required  value="{{$data_id->press_oli}}">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Jam Stop</label>
                                        <input type="time" name="jam_stop" id="jam_stop" class="form-control" required value="{{$data_id->jam_stop}}">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Level BBM Akhir</label>
                                        <input type="text" name="lev_bbm_akhir" id="lev_bbm_akhir" class="form-control" placeholder="000" required  value="{{$data_id->lev_bbm_akhir}}">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Keterangan</label>
                                        <input type="text" name="keterangan" id="keterangan" class="form-control" required value="{{$data_id->keterangan}}">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="" class="text-danger fw-bold">Equipment Status</label>
                                        <select name="status_equipment_id" id="status_equipment_id" class="form-select text-danger">
                                            @foreach ($status as $st)
                                                <option value="{{$st->id}}" {{$data_id->status_equipment_id == $st->id ? 'selected' : ''}}>{{$st->status_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid gap-2 px-4 py-2 mx-1">
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
