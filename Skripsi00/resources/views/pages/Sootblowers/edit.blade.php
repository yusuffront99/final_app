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
                            <a href="{{route('edg_system.index')}}" class="text-primary mx-2">
                                EDG System
                            </a>
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
                <form action="{{route('sbl_system.update', $data_id->id)}}" method="post" class="mx-auto" id="form-sbl-system">
                        @csrf
                        @method('put')
                        <div class="row shadow-sm p-3 bg-light rounded">
                            <div class="mb-2">
                                <a href="{{route('sbl_system.index')}}" class="btn btn-sm btn-primary rounded-pill"><i class='bx bx-left-arrow-circle'></i> Back</a>
                            </div>
                            <h6 class="text-white bg-dark p-3 text-center rounded-pill">Form Sootblower System</h6>
                            <hr>
                            <div class="col-lg-6 col-md-6 text-dark fw-bold">
                                <div class="form-group mb-2 mx-3">
                                    <input type="hidden" name="id" value="{{$data_id->id}}">
                                    <label for="user_id">Nama Operator I</label>
                                    <select name="user_id" id="user_id" class="form-select">
                                        <option class="checkbox" {{$data_id->status_sbl1 == 'L-1' ? 'checked' : ''}} value="{{Auth::user()->id}}">{{Auth::user()->nama_lengkap}}</option>
                                    </select>
                                </div>
                                <div class="form-group mb-2 mx-3">
                                    <label for="operator_kedua">Nama Operator II <sup style="color:salmon">(*Optional)</sup></label>
                                    <select name="operator_kedua" id="operator_kedua" class="form-select">
                                        <option class="checkbox" {{$data_id->status_sbl1 == 'L-1' ? 'checked' : ''}} value="-">-- Pilih Operator --</option>
                                        @foreach ($users as $user)
                                            <option class="checkbox" {{$data_id->status_sbl1 == 'L-1' ? 'checked' : ''}} value="{{$user->nama_lengkap}}">{{$user->nama_lengkap}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-2 mx-3">
                                    <label for="">Nama Supervisor</label>
                                    <select name="atasan" id="atasan" class="form-select @error('atasan') is-invalid @enderror" name="atasan" required autocomplete="atasan">
                                        <option class="checkbox" {{$data_id->status_sbl1 == 'L-1' ? 'checked' : ''}} value="{{Auth::user()->atasan}}">{{Auth::user()->atasan}}</option>
                                    </select>
                                </div>
                                <div class="form-group mb-2 mx-3">
                                    <label for="">Operator Shift</label>
                                    <select name="operator_shift" id="operator_shift" class="form-select @error('operator_shift') is-invalid @enderror" name="operator_shift" required autocomplete="operator_shift">
                                        <option class="checkbox" {{$data_id->status_sbl1 == 'L-1' ? 'checked' : ''}} value="{{Auth::user()->tim_divisi}}">{{Auth::user()->tim_divisi}}</option>
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
                                    <input type="date" name="tanggal_update" id="tanggal_update" class="form-control" value="{{$data_id->tanggal_update}}" required autocomplete="tanggal_update">
                                </div>
                                <div class="form-group mb-2 mx-3">
                                    <label for="jam_update">Jam Update</label>
                                    <input type="time" name="jam_update" id="jam_update" class="form-control" value="{{$data_id->jam_update}}" required autocomplete="jam_update">
                                </div>
                            </div>
                            <hr class="text-danger">
                            <div class="fw-bold mb-4">
                                <div class="text-center">
                                <strong class="text-white mb-3 badge bg-danger">Sootblowers Data</strong>
                                </div>

                                <div class="my-2">
                                <input type="checkbox" id="check-all"> <label class="text-success"> Check All <i class='bx bx-check-circle'></i></label></input>
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
                                                        <li><div class="badge bg-warning">No 1</div></li>
                                                        <strong class="fw-bold">
                                                        <input type="checkbox" name="status_sbl1" id="status_sbl1" class="checkbox" {{$data_id->status_sbl1 == 'L-1' ? 'checked' : ''}} value="L-1">
                                                        </strong>
                                                        
                                                        <li><div class="badge bg-warning">No 2</div></li>
                                                        <input type="checkbox" name="status_sbl2" id="status_sbl2" class="checkbox" {{$data_id->status_sbl2 == 'L-2' ? 'checked' : ''}} value="L-2">
                                                        <li><div class="badge bg-warning">No 3</div></li>
                                                        <input type="checkbox" name="status_sbl3" id="status_sbl3" class="checkbox" {{$data_id->status_sbl3 == 'L-3' ? 'checked' : ''}} value="L-3">
                                                        <li><div class="badge bg-warning">No 4</div></li>
                                                        <input type="checkbox" name="status_sbl4" id="status_sbl4" class="checkbox" {{$data_id->status_sbl4 == 'L-4' ? 'checked' : ''}} value="L-4">
                                                        <li><div class="badge bg-warning">No 5</div></li>
                                                        <input type="checkbox" name="status_sbl5" id="status_sbl5" class="checkbox" {{$data_id->status_sbl5 == 'L-5' ? 'checked' : ''}} value="L-5">
                                                        <li><div class="badge bg-warning">No 6</div></li>
                                                        <input type="checkbox" name="status_sbl6" id="status_sbl6" class="checkbox" {{$data_id->status_sbl6 == 'L-6' ? 'checked' : ''}} value="L-6">
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <ul>
                                                        <li><div class="badge bg-warning">No 7</div></li>
                                                        <input type="checkbox" name="status_sbl7" id="status_sbl7" class="checkbox" {{$data_id->status_sbl7 == 'L-7' ? 'checked' : ''}} value="L-7">
                                                        <li><div class="badge bg-warning">No 8</div></li>
                                                        <input type="checkbox" name="status_sbl8" id="status_sbl8" class="checkbox" {{$data_id->status_sbl8 == 'L-8' ? 'checked' : ''}} value="L-8">
                                                        <li><div class="badge bg-warning">No 9</div></li>
                                                        <input type="checkbox" name="status_sbl9" id="status_sbl9" class="checkbox" {{$data_id->status_sbl9 == 'L-9' ? 'checked' : ''}} value="L-9">
                                                        <li><div class="badge bg-warning">No 10</div></li>
                                                        <input type="checkbox" name="status_sbl10" id="status_sbl10" class="checkbox" {{$data_id->status_sbl10 == 'L-10' ? 'checked' : ''}} value="L-10">
                                                        <li><div class="badge bg-warning">No 11</div></li>
                                                        <input type="checkbox" name="status_sbl11" id="status_sbl11" class="checkbox" {{$data_id->status_sbl11 == 'L-11' ? 'checked' : ''}} value="L-11">
                                                        <li><div class="badge bg-warning">No 12</div></li>
                                                        <input type="checkbox" name="status_sbl12" id="status_sbl12" class="checkbox" {{$data_id->status_sbl12 == 'L-12' ? 'checked' : ''}} value="L-12">
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <ul>
                                                        <li><div class="badge bg-warning">No 13</div></li>
                                                        <input type="checkbox" name="status_sbl13" id="status_sbl13" class="checkbox" {{$data_id->status_sbl13 == 'L-13' ? 'checked' : ''}} value="L-13">
                                                        <li><div class="badge bg-warning">No 14</div></li>
                                                        <input type="checkbox" name="status_sbl14" id="status_sbl14" class="checkbox" {{$data_id->status_sbl14 == 'L-14' ? 'checked' : ''}} value="L-14">
                                                        <li><div class="badge bg-warning">No 15</div></li>
                                                        <input type="checkbox" name="status_sbl15" id="status_sbl15" class="checkbox" {{$data_id->status_sbl15 == 'L-15' ? 'checked' : ''}} value="L-15">
                                                        <li><div class="badge bg-warning">No 16</div></li>
                                                        <input type="checkbox" name="status_sbl16" id="status_sbl16" class="checkbox" {{$data_id->status_sbl16 == 'L-16' ? 'checked' : ''}} value="L-16">
                                                        <li><div class="badge bg-warning">No 17</div></li>
                                                        <input type="checkbox" name="status_sbl17" id="status_sbl17" class="checkbox" {{$data_id->status_sbl17 == 'L-17' ? 'checked' : ''}} value="L-17">
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <ul>
                                                        <li><div class="badge bg-warning">No 18</div></li>
                                                        <input type="checkbox" name="status_sbl18" id="status_sbl18" class="checkbox" {{$data_id->status_sbl18 == 'L-18' ? 'checked' : ''}} value="L-18">
                                                        <li><div class="badge bg-warning">No 19</div></li>
                                                        <input type="checkbox" name="status_sbl19" id="status_sbl19" class="checkbox" {{$data_id->status_sbl19 == 'L-19' ? 'checked' : ''}} value="L-19">
                                                        <li><div class="badge bg-warning">No 20</div></li>
                                                        <input type="checkbox" name="status_sbl20" id="status_sbl9" class="checkbox" {{$data_id->status_sbl20 == 'L-20' ? 'checked' : ''}} value="L-20">
                                                        <li><div class="badge bg-warning">No 21</div></li>
                                                        <input type="checkbox" name="status_sbl21" id="status_sbl21" class="checkbox" {{$data_id->status_sbl21 == 'L-21' ? 'checked' : ''}} value="L-21">
                                                        <li><div class="badge bg-warning">No 22</div></li>
                                                        <input type="checkbox" name="status_sbl22" id="status_sbl22" class="checkbox" {{$data_id->status_sbl22 == 'L-22' ? 'checked' : ''}} value="L-22">
                                                    </ul>
                                                </div>
                                           </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- type G & C -->
                                <div class="row" style="margin: auto;">
                                    <div class="col-lg-6 my-2  bg-dark text-white">
                                       <div class="row">
                                            <div class="col-lg-12">
                                                <h6 class="fw-bold text-white my-2 badge bg-danger text-center">SBL TYPE - C (Long)</h6>
                                                <div class="card bg-light text-dark mb-2">
                                                    <div class="row">
                                                        <div class="col-lg-6 my-2">
                                                            <ul>
                                                            <li><div class="badge bg-danger">No 23</div></li>
                                                            <input type="checkbox" name="status_sbl23" id="status_sbl23" class="checkbox" {{$data_id->status_sbl23 == 'C-23' ? 'checked' : ''}} value="C-23">
                                                            <li><div class="badge bg-danger">No 24</div></li>
                                                            <input type="checkbox" name="status_sbl24" id="status_sbl24" class="checkbox" {{$data_id->status_sbl24 == 'C-24' ? 'checked' : ''}} value="C-24">
                                                            <li><div class="badge bg-danger">No 25</div></li>
                                                            <input type="checkbox" name="status_sbl25" id="status_sbl25" class="checkbox" {{$data_id->status_sbl25 == 'C-25' ? 'checked' : ''}} value="C-25">
                                                            <li><div class="badge bg-danger">No 26</div></li>
                                                            <input type="checkbox" name="status_sbl26" id="status_sbl26" class="checkbox" {{$data_id->status_sbl26 == 'C-26' ? 'checked' : ''}} value="C-26">
                                                            </ul>
                                                        </div>

                                                        <div class="col-lg-6 my-2">
                                                            <ul>
                                                            <li><div class="badge bg-danger">No 27</div></li>
                                                            <input type="checkbox" name="status_sbl27" id="status_sbl27" class="checkbox" {{$data_id->status_sbl27 == 'C-27' ? 'checked' : ''}} value="C-27">
                                                            <li><div class="badge bg-danger">No 28</div></li>
                                                            <input type="checkbox" name="status_sbl28" id="status_sbl28" class="checkbox" {{$data_id->status_sbl28 == 'C-28' ? 'checked' : ''}} value="C-28">
                                                            <li><div class="badge bg-danger">No 29</div></li>
                                                            <input type="checkbox" name="status_sbl29" id="status_sbl29" class="checkbox" {{$data_id->status_sbl29 == 'C-29' ? 'checked' : ''}} value="C-29">
                                                            <li><div class="badge bg-danger">No 30</div></li>
                                                            <input type="checkbox" name="status_sbl30" id="status_sbl30" class="checkbox" {{$data_id->status_sbl30 == 'C-30' ? 'checked' : ''}} value="C-30">
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                       </div>
                                    </div>
                                    <div class="col-lg-6 my-2  bg-dark text-white">
                                       <div class="row">
                                            <div class="col-lg-12">
                                                <h6 class="fw-bold text-white my-2 rounded-pill badge bg-primary">SBL TYPE - G (Rotary / Swing)</h6>
                                                <div class="card bg-light text-dark mb-3">
                                                    <div class="row mb-5">
                                                        <div class="col-lg-6 my-2">
                                                            <ul>
                                                                <li><div class="badge bg-primary">No 31</div></li>
                                                                <input type="checkbox" name="status_sbl31" id="status_sbl31" class="checkbox" {{$data_id->status_sbl31 == 'G-31' ? 'checked' : ''}} value="G-31">
                                                                <li><div class="badge bg-primary">No 32</div></li>
                                                                <input type="checkbox" name="status_sbl32" id="status_sbl32" class="checkbox" {{$data_id->status_sbl32 == 'G-32' ? 'checked' : ''}} value="G-32">
                                                                <li><div class="badge bg-primary">No 33</div></li>
                                                                <input type="checkbox" name="status_sbl33" id="status_sbl33" class="checkbox" {{$data_id->status_sbl33 == 'G-33' ? 'checked' : ''}} value="G-33">
                                                            </ul>
                                                            </div>
                                                            <div class="col-lg-6 my-2">
                                                            <ul>
                                                                <li><div class="badge bg-primary">No 34</div></li>
                                                                <input type="checkbox" name="status_sbl34" id="status_sbl34" class="checkbox" {{$data_id->status_sbl34 == 'G-34' ? 'checked' : ''}} value="G-34">
                                                                <li><div class="badge bg-primary">No 35</div></li>
                                                                <input type="checkbox" name="status_sbl35" id="status_sbl35" class="checkbox" {{$data_id->status_sbl35 == 'G-35' ? 'checked' : ''}} value="G-35">
                                                                <li><strong class="text-danger"><div class="badge bg-primary">No 36 (Swing)</div></strong></li>
                                                                <input type="checkbox" name="status_sbl36" id="status_sbl36" class="checkbox" {{$data_id->status_sbl36 == 'YB-36' ? 'checked' : ''}} value="YB-36">
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
                                            <label for="catatan_peralatan">Catatan Peralatan <small class="text-danger">*</small></label>
                                            <input id="catatan_peralatan" type="hidden" name="catatan_peralatan" required value="{{$data_id->catatan_peralatan}}">
                                            <trix-editor input="catatan_peralatan"></trix-editor>
                                        </div>
                                        </div>

                                   </div>
                                </div>


                                <input type="hidden" name="status_equipment_id" value="1">
                                <input type="hidden" name="catatan_spv" value="-">
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

