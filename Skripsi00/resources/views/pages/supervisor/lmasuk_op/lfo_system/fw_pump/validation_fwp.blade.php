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
                            <a href="{{route('lmasuk.op.fwpump')}}" class="text-primary mx-2">
                                LFO System / Forwarding Pump
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
                        <a href="{{route('lmasuk.op.fwpump')}}" class="btn btn-sm btn-primary"><i class='bx bx-left-arrow-circle'></i> Back</a>
                    </div>
                </div>
            </div>
            <div class="mx-auto">
                <div class="m-auto rounded">
                    <form action="{{route('op.fwpump_updated', $data_id->id)}}" method="POST" class="mx-auto" id="edit-burner_system">
                            @csrf
                            @method('put')
                            <input type="hidden" value="{{$data_id->id}}" name="id">
                            <input type="hidden" value="{{$data_id->user_id}}" name="user_id">
                            <input type="hidden" value="{{$data_id->operator_kedua}}" name="operator_kedua">
                            <input type="hidden" value="{{$data_id->atasan}}" name="atasan">
                            <input type="hidden" value="{{$data_id->operator_shift}}" name="operator_shift">
                            <input type="hidden" value="{{$data_id->tanggal_update}}" name="tanggal_update">
                            <input type="hidden" value="{{$data_id->jam_update}}" name="jam_update">
                            <input type="hidden" value="{{$data_id->arus_FP_A}}" name="arus_FP_A">
                            <input type="hidden" value="{{$data_id->arus_FP_B}}" name="arus_FP_B">
                            {{-- <input type="hidden" value="{{$data_id->arus_HP_A}}" name="arus_HP_A">
                            <input type="hidden" value="{{$data_id->arus_HP_B}}" name="arus_HP_B"> --}}
                            <input type="hidden" value="{{$data_id->status_FP_A}}" name="status_FP_A">
                            <input type="hidden" value="{{$data_id->status_FP_B}}" name="status_FP_B">
                            {{-- <input type="hidden" value="{{$data_id->status_HP_A}}" name="status_HP_A">
                            <input type="hidden" value="{{$data_id->status_HP_B}}" name="status_HP_B"> --}}
                            <input type="hidden" value="{{$data_id->press_FP_A}}" name="press_FP_A">
                            <input type="hidden" value="{{$data_id->press_FP_B}}" name="press_FP_B">
                            {{-- <input type="hidden" value="{{$data_id->press_HP_A}}" name="press_HP_A">
                            <input type="hidden" value="{{$data_id->press_HP_B}}" name="press_HP_B"> --}}
                            {{-- <input type="hidden" value="{{$data_id->DP_High}}" name="DP_High"> --}}
                            <input type="hidden" value="{{$data_id->info_FP}}" name="info_FP">
                            {{-- <input type="hidden" value="{{$data_id->info_HP}}" name="info_HP"> --}}
                            <input type="hidden" value="{{$data_id->status}}" name="status">
                            <input type="hidden" value="{{$data_id->catatan_spv}}" name="catatan_spv">

                            <div class="p-3 card bg-secondary text-white">
                                <h5 class="text-primary fw-bold">Validation LFO System</h5>
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
                                    <tr>
                                        <th>Jam Update</th>
                                        <th>:</th>
                                        <th>{{$data_id->jam_update}}</th>
                                    </tr>
                                </table>
                                <hr>
                                <div class="row">
                                    {{-- <div class="col-lg">
                                        <strong class="text-warning">FW Pump</strong>
                                        <br>
                                        <ul>
                                            <li>
                                                <small> A: {{$data_id->forwardings->arus_FP_A}} A / {{$data_id->forwardings->press_FP_A}} MPA / {{$data_id->forwardings->status_FP_A}}</small>
                                            </li>
                                            <li>
                                                <small>B: {{$data_id->forwardings->arus_FP_B}} A / {{$data_id->forwardings->press_FP_B}} MPA / {{$data_id->forwardings->status_FP_B}}</small>
                                            </li>
                                        </ul>
                                    </div> --}}
                                    <div class="col-lg">
                                        <strong class="text-warning">Forwarding Pump {{$data_id->unit}}</strong>
                                        <br>
                                        <ul>
                                            <li>
                                                <small>A: {{$data_id->arus_FP_A}} A / {{$data_id->press_FP_A}} MPA / {{$data_id->status_FP_A}}</small>
                                            </li>
                                            <li>
                                                <small>B: {{$data_id->arus_FP_B}} A / {{$data_id->press_FP_B}} MPA / {{$data_id->status_FP_B}}</small>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg text-success">
                                        <small>Keterangan :</small>
                                        
                                        <br>
                                        <small>
                                            {!!$data_id->info_FP!!}
                                            
                                            {{-- {!!$data_id->info_HP!!} --}}
                                        </small>
                                    </div>
                                </div>
                                <hr>
                                <div class="my-1">
                                    <div class="row">
                                        <div class="col-lg-8 mx-auto">
                                            <label for="">Masukkan Catatan <span style="color: yellow">*</span></label>
                                            <input type="text" name="catatan" id="catatan" class="form-control" placeholder="Laporan Sesuai..." style="height: 40px" required>
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