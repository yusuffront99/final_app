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
                            <a href="{{route('cocommon.index')}}" class="text-primary mx-2">
                                CO Common
                            </a>
                            /
                            <span class="text-warning mx-2">
                                Create
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
                    <form action="" class="mx-auto" id="form-co-turbine">
                        @csrf
                        <div class="row shadow-sm p-3 bg-light rounded">
                            <div class="mb-2">
                                <a href="{{route('cocommon.index')}}" class="btn btn-sm btn-primary rounded-pill"><i class='bx bx-left-arrow-circle'></i> Back</a>
                            </div>
                            <h6 class="text-white bg-dark p-3 text-center rounded-pill">Form Change Over Peralatan Common</h6>
                            <hr>
                            <div class="col-lg-6 col-md-6 text-dark fw-bold">
                                <div class="form-group mb-2 mx-3">
                                    <label for="nip">NIP</label>
                                    <select name="nip" id="nip" class="form-select">
                                        <option value="{{Auth::user()->nip}}">{{Auth::user()->nip}}</option>
                                    </select>
                                </div>
                                <div class="form-group mb-2 mx-3">
                                    <label for="user_id">Nama Operator I</label>
                                    <select name="user_id" id="user_id" class="form-select">
                                        <option value="{{Auth::user()->id}}">{{Auth::user()->nama_lengkap}}</option>
                                    </select>
                                </div>
                                <div class="form-group mb-2 mx-3">
                                    <label for="">Operator Shift</label>
                                    <select name="operator_shift" id="operator_shift" class="form-select @error('operator_shift') is-invalid @enderror" name="operator_shift" required autocomplete="operator_shift">
                                        <option value="{{Auth::user()->tim_divisi}}">{{Auth::user()->tim_divisi}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 text-dark fw-bold">
                                
                                <div class="form-group mb-2 mx-3">
                                    <label for="">Unit Pembangkit</label>
                                    <select name="unit" id="unit" class="form-select @error('unit') is-invalid @enderror" name="unit" required autocomplete="unit">
                                        <option value="Common">Common</option>
                                    </select>
                                </div>
                                <div class="form-group mb-2 mx-3">
                                    <label for="tanggal_update">Tanggal Update</label>
                                    <input type="date" name="tanggal_update" id="tanggal_update" class="form-control" required autocomplete="tanggal_update">
                                </div>
                                <div class="form-group mb-2 mx-3">
                                    <label for="jam_update">Jam Update</label>
                                    <input type="time" name="jam_update" id="jam_update" class="form-control" required autocomplete="jam_update">
                                </div>
                            </div>
                            <hr class="text-danger">
                            <div class="text-center text-danger fw-bold mb-4">
                                Form Change Over Turbine
                            </div>
                            <div class="col-lg-6 col-md-6 fw-bold">
                                <div class="form-group mb-2 mx-3">
                                    <label for="nama_peralatan">Nama Peralatan</label>
                                    <select name="nama_peralatan" id="nama_peralatan" class="form-select">
                                        <option value="" selected hidden>-- Pilih Nama Peralatan</option>
                                        @foreach ($commons as $c)
                                            <option value="{{$c->name_equipment}}" class="bg-dark">{{$c->name_equipment}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-2 mx-3">
                                    <label for="">Peralatan Operasi</label>
                                    <div class="row my-1">
                                        <div class="col">
                                            <h6 class="text-center">Pertama</h6>
                                            <input type="text" name="operasi_awal" id="operasi_awal" class="form-control" placeholder="Ex: A" required>
                                        </div>
                                        <div class="col">
                                            <h6 class="text-center">Rencana</h6>
                                            <input type="text" name="rencana_operasi" id="rencana_operasi" class="form-control" placeholder="Ex: B" required>
                                        </div>
                                        <div class="col">
                                            <h6 class="text-center">Terakhir</h6>
                                            <input type="text" name="operasi_akhir" id="operasi_akhir" class="form-control" placeholder="Ex: B" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-2 mx-3">
                                    <label for="">Status Kegiatan</label>
                                    <select name="status_kegiatan" id="status_kegiatan" class="form-select">
                                        <option value="" selected hidden>-- Status Kegiatan --</option>
                                        <option value="Terlaksana">Terlaksana</option>
                                        <option value="Tidak Terlaksana">Tidak Terlaksana</option>
                                    </select>
                                </div>
                            </div>
                            {{-- =============== --}}
                            <div class="col-lg-6 col-md-6 text-dark fw-bold">
                                <div class="form-group mb-2 mx-3">
                                    <label for="">Status peralatan</label>
                                    <select name="status_peralatan" id="status_peralatan" class="form-select">
                                        <option value="" selected hidden>-- Status peralatan --</option>
                                        <option value="Normal">Normal</option>
                                        <option value="Abnormal">Abnormal</option>
                                    </select>
                                </div>
                                <div class="form-group mb-2 mx-3">
                                    <label for="">Keterangan</label>
                                    <textarea name="keterangan" id="keterangan" cols="3" rows="2" class="form-control"></textarea>
                                </div>
                                <input type="hidden" name="status_equipment_id" value="1">
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
                    url: "{{route('cocommon.store')}}",
                    method: 'POST',
                    data: $('#form-co-turbine').serialize(),
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
                            window.location = "{{route('cocommon.index')}}"
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
        });
    </script>   
@endpush
