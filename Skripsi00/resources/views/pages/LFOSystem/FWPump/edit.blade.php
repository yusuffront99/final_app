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
                            <span class="text-primary mx-2">
                                LFO System
                            </span>
                            /
                            <span class="text-primary mx-2">
                                Forwarding Pump
                            </span>
                            /
                            <span class="text-warning mx-2">
                                Edit
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
                    <form action="{{route('fw_pump.update', $data_id->id)}}" method="POST" class="mx-auto" id="form-forwarding-pump">
                        @csrf
                        @method('put')
                        <div class="row shadow-sm p-3 bg-light rounded">
                            <div class="mb-2">
                                <a href="{{route('fw_pump.index')}}" class="btn btn-sm btn-primary rounded-pill"><i class='bx bx-left-arrow-circle'></i> Back</a>
                            </div>
                            <h6 class="text-white bg-dark p-3 text-center rounded-pill">Form LFO System - Forwarding Pump</h6>
                            <hr>
                            <div class="col-lg-6 col-md-6 text-dark fw-bold">
                                <div class="form-group mb-2 mx-3">
                                    <label for="user_id">Nama Operator I</label>
                                    <select name="user_id" id="user_id" class="form-select">
                                        <option value="{{Auth::user()->id}}">{{Auth::user()->nama_lengkap}}</option>
                                    </select>
                                </div>
                                <div class="form-group mb-2 mx-3">
                                    <label for="operator_kedua">Nama Operator II</label>
                                    <select name="operator_kedua" id="operator_kedua" class="form-select">
                                        <option value="-">-</option>
                                        @foreach ($users as $user)
                                            <option value="{{$user->nama_lengkap}}" {{$data_id->operator_kedua == $user->nama_lengkap ? 'selected' : ''}}>{{$user->nama_lengkap}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-2 mx-3">
                                    <label for="">Nama Supervisor</label>
                                    <select name="atasan" id="atasan" class="form-select @error('atasan') is-invalid @enderror" name="atasan" required autocomplete="atasan">
                                        <option value="{{Auth::user()->atasan}}">{{Auth::user()->atasan}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 text-dark fw-bold">
                                <div class="form-group mb-2 mx-3">
                                    <label for="">Operator Shift</label>
                                    <select name="operator_shift" id="operator_shift" class="form-select @error('operator_shift') is-invalid @enderror" name="operator_shift" required autocomplete="operator_shift">
                                        <option value="{{Auth::user()->tim_divisi}}">{{Auth::user()->tim_divisi}}</option>
                                    </select>
                                </div>
                                <div class="form-group mb-2 mx-3">
                                    <label for="tanggal_update">Tanggal Update</label>
                                    <input type="date" name="tanggal_update" id="tanggal_update" class="form-control" value="{{$data_id->tanggal_update}}" required>
                                </div>
                                <div class="form-group mb-2 mx-3">
                                    <label for="jam_update">Jam Update</label>
                                    <input type="time" name="jam_update" id="jam_update" class="form-control" value="{{$data_id->jam_update}}" required>
                                </div>
                            </div>
                            <hr class="text-warning">
                            <div class="row">
                                <div class="col-lg-6 fw-bold form-fw">
                                    <div class="form-group mb-2 mx-3">
                                    <label for="status_FP">Status FP Pump</label>
                                        <div class="row m-auto my-2">
                                            <div class="col">
                                                <h6 class="text-center">A</h6>
                                                <select name="status_FP_A" id="status_FP_A" class="form-select">
                                                    <option value="Ready" {{$data_id->status_FP_A == 'Ready' ? 'selected' : ''}}>Ready</option>
                                                    <option value="Not Ready" {{$data_id->status_FP_A == 'Not Ready' ? 'selected' : ''}}>Not Ready</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <h6 class="text-center">B</h6>
                                                <select name="status_FP_B" id="status_FP_B" class="form-select">
                                                    <option value="Ready" {{$data_id->status_FP_B == 'Ready' ? 'selected' : ''}}>Ready</option>
                                                    <option value="Not Ready" {{$data_id->status_FP_B == 'Not Ready' ? 'selected' : ''}}>Not Ready</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-2 mx-3">
                                        <label for="arus_HP">Current FP Pump (A)</label>
                                        <div class="row m-auto my-1">
                                            <div class="col">
                                                <h6 class="text-center">A</h6>
                                                <input type="text" value="{{$data_id->arus_FP_A}}" {{$data_id->arus_FP_A == 'Ready' ? 'selected' : ''}} name="arus_FP_A" id="arus_HP_A" class="form-control">
                                            </div>
                                            <div class="col">
                                                <h6 class="text-center">B</h6>
                                                <input type="text" value="{{$data_id->arus_FP_B}}" name="arus_FP_B" id="arus_FP_B" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 text-dark fw-bold">
                                    {{-- <div class="form-group mb-2  mx-3">
                                        <label for="">Forwarding Update <sup class="text-danger">*Pastikan Forwarding Pump Sudah Diisi</sup></label>
                                        
                                        @foreach ($forwarding as $fw)
                                        @php
                                            $created = Carbon\carbon::createFromFormat('Y-m-d H:i:s', $fw->created_at)->isoFormat('D MMMM Y')
                                        @endphp
                                        
                                            @if ($created == $date)
                                                <select name="forwarding_id" id="forwarding_id" class="form-select">
                                                    <option value="{{$fw->id}}">{{$fw->update_ke}} / {{$created}}</option>
                                                </select>
                                            @else
                                                <select name="" id="" class="form-select text-danger fw-bold" style="font-size: 10px" required>
                                                    <option value="">Data FW Pump Belum Di Update</option>
                                                </select>
                                            @endif
                                        @endforeach
                                    </div> --}}
                                    <div class="form-group mb-2 mx-3">
                                        <label for="press_HP">Pressure FP Pump (MPA)</label>
                                        <div class="row m-auto my-1">
                                            <div class="col">
                                                <h6 class="text-center">A</h6>
                                                <input type="text" value="{{$data_id->press_FP_A}}" name="press_FP_A" id="press_FP_A" class="form-control">
                                            </div>
                                            <div class="col">
                                                <h6 class="text-center">B</h6>
                                                <input type="text" value="{{$data_id->press_FP_B}}" name="press_FP_B" id="press_FP_B" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2 mx-3">
                                        <label for="info_FP">Informasi FP Pump</label>
                                        <input id="info_FP" type="hidden" name="info_FP" value="{{$data_id->info_FP}}">
                                        <trix-editor input="info_FP"></trix-editor>
                                    </div>
                                    <input type="hidden" value="1" name="status_equipment_id" id="status_equipment_id">
                                    <input type="text" name="catatan_spv" id="catatan_spv" value="-" hidden>
                                </div>

                                <div class="d-grid gap-2 px-4 py-2">
                                    <button type="submit" class="btn btn-success text-center" id="btn-save">save</button>
                                </div>
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
{{-- 
@push('add-script')
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
                    url: "{{route('forwarding_common.store')}}",
                    method: 'POST',
                    data: $('#form-forwarding-pump').serialize(),
                    dataType: 'JSON',
                    success: function(data){
                        if(data.success){
                            swal({
                                title: "Successully!",
                                text: "Laporan Berhasil Disimpan",
                                icon: "success",
                                button: "simpan",
                            });
                            window.location = "{{route('lfo_system.index')}}"
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
