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
                            <a href="{{route('sbl_system.index')}}" class="text-primary mx-2">
                                Sootblowers System
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
                <form action="" class="mx-auto" id="form-sbl-system">
                        @csrf
                        <div class="row shadow-sm p-3 bg-light rounded">
                            <div class="mb-2">
                                <a href="{{route('sbl_system.index')}}" class="btn btn-sm btn-primary rounded-pill"><i class='bx bx-left-arrow-circle'></i> Back</a>
                            </div>
                            <h6 class="text-white bg-dark p-3 text-center rounded-pill">Form Sootblower System</h6>
                            <hr>
                            <div class="col-lg-6 col-md-6 text-dark fw-bold">
                                <div class="form-group mb-2 mx-3">
                                    <label for="user_id">Nama Operator I</label>
                                    <select name="user_id" id="user_id" class="form-select">
                                        <option value="{{Auth::user()->id}}">{{Auth::user()->nama_lengkap}}</option>
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
                                        <option value="{{Auth::user()->atasan}}">{{Auth::user()->atasan}}</option>
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
                                        <option value="" selected hidden>-- Pilih Unit --</option>
                                        <option value="Unit 3" id="show-form">Unit 3</option>
                                        <option value="Unit 4">Unit 4</option>
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
                            <div class="fw-bold mb-4">
                                <div class="text-center">
                                <strong class="text-white mb-3 badge bg-danger">Sootblowers Data</strong>
                                </div>

                                <!-- FORM SBL -->
                                <!-- type L -->
                                <div class="row mx-auto">
                                    <div class="col-lg-12 col-md-12 col-sm-12 mb-2 shadow-sm bg-dark text-white">
                                       <h6 class="fw-bold text-white my-2 badge bg-warning">SBL TYPE - L (Short)</h6>

                                        <div class="card bg-light text-dark mb-3">
                                           <div class="my-2">
                                                <div class="row">
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <ul>
                                                        <li>No 1</li>
                                                        <input type="checkbox" name="status_sbl1" id="status_sbl1" value="jump">
                                                        <li>No 2</li>
                                                        <input type="checkbox" name="status_sbl2" id="status_sbl2" value="jump">
                                                        <li>No 3</li>
                                                        <input type="checkbox" name="status_sbl3" id="status_sbl3" value="jump">
                                                        <li>No 4</li>
                                                        <input type="checkbox" name="status_sbl4" id="status_sbl4" value="jump">
                                                        <li>No 5</li>
                                                        <input type="checkbox" name="status_sbl5" id="status_sbl5" value="jump">
                                                        <li>No 6</li>
                                                        <input type="checkbox" name="status_sbl6" id="status_sbl6" value="jump">
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <ul>
                                                        <li>No 7</li>
                                                        <input type="checkbox" name="status_sbl7" id="status_sbl7" value="jump">
                                                        <li>No 8</li>
                                                        <input type="checkbox" name="status_sbl8" id="status_sbl8" value="jump">
                                                        <li>No 9</li>
                                                        <input type="checkbox" name="status_sbl9" id="status_sbl9" value="jump">
                                                        <li>No 10</li>
                                                        <input type="checkbox" name="status_sbl10" id="status_sbl10" value="jump">
                                                        <li>No 11</li>
                                                        <input type="checkbox" name="status_sbl11" id="status_sbl11" value="jump">
                                                        <li>No 12</li>
                                                        <input type="checkbox" name="status_sbl12" id="status_sbl12" value="jump">
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <ul>
                                                        <li>No 13</li>
                                                        <input type="checkbox" name="status_sbl13" id="status_sbl13" value="jump">
                                                        <li>No 14</li>
                                                        <input type="checkbox" name="status_sbl14" id="status_sbl14" value="jump">
                                                        <li>No 15</li>
                                                        <input type="checkbox" name="status_sbl15" id="status_sbl15" value="jump">
                                                        <li>No 16</li>
                                                        <input type="checkbox" name="status_sbl16" id="status_sbl16" value="jump">
                                                        <li>No 17</li>
                                                        <input type="checkbox" name="status_sbl17" id="status_sbl17" value="jump">
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <ul>
                                                        <li>No 18</li>
                                                        <input type="checkbox" name="status_sbl18" id="status_sbl18" value="jump">
                                                        <li>No 19</li>
                                                        <input type="checkbox" name="status_sbl19" id="status_sbl19" value="jump">
                                                        <li>No 20</li>
                                                        <input type="checkbox" name="status_sbl20" id="status_sbl9" value="jump">
                                                        <li>No 21</li>
                                                        <input type="checkbox" name="status_sbl21" id="status_sbl21" value="jump">
                                                        <li>No 22</li>
                                                        <input type="checkbox" name="status_sbl22" id="status_sbl22" value="jump">
                                                    </ul>
                                                </div>
                                           </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- type G & C -->
                                <div class="row" style="margin: auto;">
                                    <div class="col-lg-6 mb-2  bg-dark text-white">
                                       <div class="row">
                                            <div class="col-lg-12">
                                                <h6 class="fw-bold text-white my-2 badge bg-danger text-center">SBL TYPE - C (Long)</h6>
                                                <div class="card bg-light text-dark mb-2">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <ul>
                                                            <li>No 23</li>
                                                            <input type="checkbox" name="status_sbl23" id="status_sbl23" value="jump">
                                                            <li>No 24</li>
                                                            <input type="checkbox" name="status_sbl24" id="status_sbl24" value="jump">
                                                            <li>No 25</li>
                                                            <input type="checkbox" name="status_sbl25" id="status_sbl25" value="jump">
                                                            <li>No 26</li>
                                                            <input type="checkbox" name="status_sbl26" id="status_sbl26" value="jump">
                                                            </ul>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <ul>
                                                            <li>No 23</li>
                                                            <input type="checkbox" name="status_sbl23" id="status_sbl23" value="jump">
                                                            <li>No 24</li>
                                                            <input type="checkbox" name="status_sbl24" id="status_sbl24" value="jump">
                                                            <li>No 25</li>
                                                            <input type="checkbox" name="status_sbl25" id="status_sbl25" value="jump">
                                                            <li>No 26</li>
                                                            <input type="checkbox" name="status_sbl26" id="status_sbl26" value="jump">
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                       </div>
                                    </div>
                                    <div class="col-lg-6 mb-2  bg-dark text-white">
                                       <div class="row">
                                            <div class="col-lg-12">
                                                <h6 class="fw-bold text-white my-2 rounded-pill badge bg-primary">SBL TYPE - G (Rotary / Swing)</h6>
                                                <div class="card bg-light text-dark mb-3">
                                                    <div class="row mb-5">
                                                        <div class="col-lg-6">
                                                            <ul>
                                                                <li>No 31</li>
                                                                <input type="checkbox" name="status_sbl31" id="status_sbl31" value="jump">
                                                                <li>No 32</li>
                                                                <input type="checkbox" name="status_sbl32" id="status_sbl32" value="jump">
                                                                <li>No 33</li>
                                                                <input type="checkbox" name="status_sbl33" id="status_sbl33" value="jump">
                                                            </ul>
                                                            </div>
                                                            <div class="col-lg-6">
                                                            <ul>
                                                                <li>No 34</li>
                                                                <input type="checkbox" name="status_sbl34" id="status_sbl34" value="jump">
                                                                <li>No 35</li>
                                                                <input type="checkbox" name="status_sbl35" id="status_sbl35" value="jump">
                                                                <li><strong class="text-danger">No 36 (Swing)</strong></li>
                                                                <input type="checkbox" name="status_sbl35" id="status_sbl35" value="jump">
                                                                <!-- <br><br>
                                                                <hr> -->
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                       </div>
                                       </div>
                                    </div>
                                </div>

                                <div class="row mx-auto">
                                   <div class="col-12">
                                        <div class="">
                                        <div class="form-control">
                                            <label for="info_hsd">Keterangan Gangguan <small class="text-danger">*</small></label>
                                            <input id="catatan" type="hidden" name="catatan" required>
                                            <trix-editor input="catatan"></trix-editor>
                                        </div>
                                        </div>
                                   </div>
                                </div>

                                <input type="hidden" name="status_equipment_id" value="1">
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
        document.addEventListener('trix-file-accept', function(e){
            e.preventDefault();
        })
    </script>
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
                    url: "{{route('sbl_system.store')}}",
                    method: 'POST',
                    data: $('#form-sbl-system').serialize(),
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
                            window.location = "{{route('sbl_system.index')}}"
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
