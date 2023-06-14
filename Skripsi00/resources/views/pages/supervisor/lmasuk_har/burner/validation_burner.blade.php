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
                            <a href="{{route('lmasuk.har.burner')}}" class="text-primary mx-2">
                                Burner System
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
            <div class="d-flex justify-content-between">
                <div>
                    <a href="{{route('lmasuk.har.burner')}}" class="btn btn-sm btn-primary"><i class='bx bx-left-arrow-circle'></i> Back</a>
                </div>
            </div>
            <hr>
            <div class="mx-auto">
                <div class="m-auto rounded">
                    <form action="{{route('har.burner_updated', $data_id->id)}}" method="POST" class="mx-auto" id="edit-burner_system">
                            @csrf
                            @method('put')
                            
                            <input type="hidden" value="{{$data_id->id}}" name="id">
                            <input type="hidden" value="{{$data_id->nip}}" name="nip">
                            <input type="hidden" value="{{$data_id->user_id}}" name="user_id">
                            <input type="hidden" value="{{$data_id->operator_kedua}}" name="operator_kedua">
                            <input type="hidden" value="{{$data_id->atasan}}" name="atasan">
                            <input type="hidden" value="{{$data_id->operator_shift}}" name="operator_shift">
                            <input type="hidden" value="{{$data_id->unit}}" name="unit">
                            <input type="hidden" value="{{$data_id->tanggal_update}}" name="tanggal_update">
                            <input type="hidden" value="{{$data_id->jam_update}}" name="jam_update">
                            <input type="hidden" value="{{$data_id->ket_burner1}}" name="ket_burner1">
                            <input type="hidden" value="{{$data_id->ket_burner2}}" name="ket_burner2">
                            <input type="hidden" value="{{$data_id->ket_burner3}}" name="ket_burner3">
                            <input type="hidden" value="{{$data_id->ket_burner4}}" name="ket_burner4">
                            <input type="hidden" value="{{$data_id->status_burner1}}" name="status_burner1">
                            <input type="hidden" value="{{$data_id->status_burner2}}" name="status_burner2">
                            <input type="hidden" value="{{$data_id->status_burner3}}" name="status_burner3">
                            <input type="hidden" value="{{$data_id->status_burner4}}" name="status_burner4">
                            <input type="hidden" value="{{$data_id->status}}" name="status">

                            <div class="p-3 card bg-secondary text-white">
                                <h5 class="text-primary fw-bold">Validation Burner System</h5>
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
                                                <option value="{{$status->id}}">{{$status->status_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <table>
                                    <tr>
                                        <th width="30%">NIP</th>
                                        <th>:</th>
                                        <td class="text-warning">{{$data_id->nip}}</td>
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
                                        <th>Unit</th>
                                        <th>:</th>
                                        <th>{{$data_id->unit}}</th>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Update</th>
                                        <th>:</th>
                                        <th>{{$data_id->tanggal_update}}</th>
                                    </tr>
                                    <tr>
                                        <th>Jam Update</th>
                                        <th>:</th>
                                        <th>{{$data_id->jam_update}}</th>
                                    </tr>
                                </table>
                                <hr>
                                <div class="row my-2">
                                    <div class="col-lg col-md-6">
                                        <strong class="text-success">Burner 1</strong>
                                        <p>
                                            * status : {!!$data_id->status_burner1!!}
                                            <br>
                                            <small class="text-danger">* Keterangan :</small> <br> {!!$data_id->ket_burner1!!}
                                        </p>
                                    </div>
                                    <div class="col-lg col-md-6">
                                        <strong class="text-success">Burner 2</strong>
                                        <p>
                                            * status : {!!$data_id->status_burner2!!}
                                            <br>
                                            <small class="text-danger">* Keterangan :</small> <br> {!!$data_id->ket_burner2!!}
                                        </p>
                                    </div>
                                    <div class="col-lg col-md-6">
                                        <strong class="text-success">Burner 3</strong>
                                        <p>
                                            * status : {!!$data_id->status_burner3!!}
                                            <br>
                                            <small class="text-danger">* Keterangan :</small> <br> {!!$data_id->ket_burner3!!}
                                        </p>
                                    </div>
                                    <div class="col-lg col-md-6">
                                        <strong class="text-success">Burner 4</strong>
                                        <p>
                                            * status : {!!$data_id->status_burner4!!}
                                            <br>
                                            <small class="text-danger">* Keterangan :</small> <br> {!!$data_id->ket_burner4!!}
                                        </p>
                                        
                                    </div>
                                </div>
                                <input type="hidden" name="catatan" value="{{$data_id->catatan}}">
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
                url: 'burner_system/update/' + id
                method: 'POST',
                data: $('#edit_burner_system').serialize(),
                dataType: 'JSON',
                success: function(data){
                    
                }
            });
        });
    </script>
@endpush --}}