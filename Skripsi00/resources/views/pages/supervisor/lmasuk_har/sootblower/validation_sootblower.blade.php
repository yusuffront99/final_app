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
                                All Inboxes / Sootblower System
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
                    <a href="{{route('lmasuk.har.sootblower')}}" class="btn btn-sm btn-primary"><i class='bx bx-left-arrow-circle'></i> Back</a>
                </div>
            </div>
            <hr>
            <div class="mx-auto">
                <div class="m-auto rounded">
                    <form action="{{route('har.sootblower_updated', $data_id->id)}}" method="POST" class="mx-auto" id="edit-sootblower_system">
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
                            <input type="hidden" value="{{$data_id->status_equipment_id}}" name="status_equipment_id">                          
                            <input type="hidden" value="-" name="catatan_spv">

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
                url: 'burner_system/update/' + id,
                method: 'POST',
                data: $('#edit_burner_system').serialize(),
                dataType: 'JSON',
                success: function(data){
                    
                }
            });
        });
    </script>
@endpush --}}