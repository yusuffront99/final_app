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
                            <a href="{{route('lmasuk.op.sootblower')}}" class="text-primary mx-2">
                                Sootblower System
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
            <div class="row">
                <div class="d-flex justify-content-between mb-3">
                    <div>
                        <a href="{{route('lmasuk.op.sootblower')}}" class="btn btn-sm btn-primary"><i class='bx bx-left-arrow-circle'></i> Back</a>
                    </div>
                </div>
            </div>
            <div class="mx-auto">
                <div class="m-auto rounded">
                    <form action="{{route('op.sootblower_updated', $data_id->id)}}" method="POST" class="mx-auto" id="edit-sootblower-system">
                            @csrf
                            @method('put')
                            <input type="hidden" value="{{$data_id->id}}" name="id">
                            <input type="hidden" value="{{$data_id->user_id}}" name="user_id">
                            <input type="hidden" value="{{$data_id->operator_kedua}}" name="operator_kedua">
                            <input type="hidden" value="{{$data_id->atasan}}" name="atasan">
                            <input type="hidden" value="{{$data_id->operator_shift}}" name="operator_shift">
                            <input type="hidden" value="{{$data_id->unit}}" name="unit">
                            <input type="hidden" value="{{$data_id->jam_update}}" name="jam_update">
                            <input type="hidden" value="{{$data_id->tanggal_update}}" name="tanggal_update">
                            <input type="hidden" value="{{$data_id->status_sbl1}}" name="status_sbl1">
                            <input type="hidden" value="{{$data_id->status_sbl2}}" name="status_sbl2">
                            <input type="hidden" value="{{$data_id->status_sbl3}}" name="status_sbl3">
                            <input type="hidden" value="{{$data_id->status_sbl4}}" name="status_sbl4">
                            <input type="hidden" value="{{$data_id->status_sbl5}}" name="status_sbl5">
                            <input type="hidden" value="{{$data_id->status_sbl6}}" name="status_sbl6">
                            <input type="hidden" value="{{$data_id->status_sbl7}}" name="status_sbl7">
                            <input type="hidden" value="{{$data_id->status_sbl8}}" name="status_sbl8">
                            <input type="hidden" value="{{$data_id->status_sbl9}}" name="status_sbl9">
                            <input type="hidden" value="{{$data_id->status_sbl10}}" name="status_sbl10">
                            <input type="hidden" value="{{$data_id->status_sbl11}}" name="status_sbl11">
                            <input type="hidden" value="{{$data_id->status_sbl12}}" name="status_sbl12">
                            <input type="hidden" value="{{$data_id->status_sbl13}}" name="status_sbl13">
                            <input type="hidden" value="{{$data_id->status_sbl14}}" name="status_sbl14">
                            <input type="hidden" value="{{$data_id->status_sbl15}}" name="status_sbl15">
                            <input type="hidden" value="{{$data_id->status_sbl16}}" name="status_sbl16">
                            <input type="hidden" value="{{$data_id->status_sbl17}}" name="status_sbl17">
                            <input type="hidden" value="{{$data_id->status_sbl18}}" name="status_sbl18">
                            <input type="hidden" value="{{$data_id->status_sbl19}}" name="status_sbl19">
                            <input type="hidden" value="{{$data_id->status_sbl20}}" name="status_sbl20">
                            <input type="hidden" value="{{$data_id->status_sbl21}}" name="status_sbl21">
                            <input type="hidden" value="{{$data_id->status_sbl22}}" name="status_sbl22">
                            <input type="hidden" value="{{$data_id->status_sbl23}}" name="status_sbl23">
                            <input type="hidden" value="{{$data_id->status_sbl24}}" name="status_sbl24">
                            <input type="hidden" value="{{$data_id->status_sbl25}}" name="status_sbl25">
                            <input type="hidden" value="{{$data_id->status_sbl26}}" name="status_sbl26">
                            <input type="hidden" value="{{$data_id->status_sbl27}}" name="status_sbl27">
                            <input type="hidden" value="{{$data_id->status_sbl28}}" name="status_sbl28">
                            <input type="hidden" value="{{$data_id->status_sbl29}}" name="status_sbl29">
                            <input type="hidden" value="{{$data_id->status_sbl30}}" name="status_sbl30">
                            <input type="hidden" value="{{$data_id->status_sbl31}}" name="status_sbl31">
                            <input type="hidden" value="{{$data_id->status_sbl32}}" name="status_sbl32">
                            <input type="hidden" value="{{$data_id->status_sbl33}}" name="status_sbl33">
                            <input type="hidden" value="{{$data_id->status_sbl34}}" name="status_sbl34">
                            <input type="hidden" value="{{$data_id->status_sbl35}}" name="status_sbl35">
                            <input type="hidden" value="{{$data_id->status_sbl36}}" name="status_sbl36">
                            <input type="hidden" value="{{$data_id->status_equipment_id}}" name="status_equipment_id">
                            <input type="hidden" value="{{$data_id->catatan}}" name="catatan">

                            <div class="p-3 card bg-secondary text-white">
                                <h5 class="text-primary fw-bold">Validation Sootblower System</h5>
                                <br>
                                <div class="d-flex justify-content-between">
                                    <div class="">
                                        <small></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <br>
                                        <select name="status_equipment_id" id="status_equipment_id" class="" width="50%">
                                            @foreach ($status_equipments as $status)
                                                <option value="{{$status->id}}">{{$status->status_equipment}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <table>
                                    <tr>
                                        <th width="30%">NIP</th>
                                        <th>:</th>
                                        <td class="text-warning">{{$data_id->users->nip}}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Operator</th>
                                        <th>:</th>
                                        <th>
                                            {{$data_id->users->nama_lengkap}}
                                            /
                                            {{$data_id->operator_kedua}}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Nama Atasan</th>
                                        <th>:</th>
                                        <th>{{$data_id->atasan}}</th>
                                    </tr>
                                    <tr>
                                        <th>Operator Shift</th>
                                        <th>:</th>
                                        <th>{{$data_id->operator_shift}}</th>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Update</th>
                                        <th>:</th>
                                        <th>{{$data_id->tanggal_update}}</th>
                                    </tr>
                                </table>
                                <hr>
                                <div class="fw-bold">
                                <ul>
                                    <li>Sootblower Type-L : </li>
                                    @include('commons.validation_sbl_type_L')
                                    <li>Sootblower Type-C : </li>
                                    @include('commons.validation_sbl_type_C')
                                    <li>Sootblower Type-G/Swing : </li>
                                    @include('commons.validation_sbl_type_G')
                                    <hr>
                                    <li class="text-danger">{!!$data_id->keterangan!!}</li>
                                </ul>
                                </div>
                                <hr>
                                <div class="my-1">
                                    <div class="row">
                                        <div class="col-lg-8 mx-auto">
                                            <label for="">Masukkan Catatan <span style="color: yellow">*</span></label>
                                            <input type="text" name="catatan_spv" id="catatan_spv" class="form-control" placeholder="Laporan Sesuai..." style="height: 40px" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <hr class="line-dash">
                                <div class="my-2 text-center">
                                    <small class="mb-3">Pastikan anda sudah memilih status dipojok kanan atas, <a href="#" class="text-warning"><i class='bx bxs-up-arrow-circle'></i> see</a></small>
                                    <br>
                                    <button type="submit" class="btn btn-md btn-warning">Process</button>
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
        });

        $('#btn-simpan').click(function(){
            alert()

            $.ajax({
                url: 'sootblower/update/' + id,
                method: 'POST',
                data: $('#edit_sootblower').serialize(),
                dataType: 'JSON',
                success: function(data){
                    
                }
            });
        });
    </script>
@endpush --}}