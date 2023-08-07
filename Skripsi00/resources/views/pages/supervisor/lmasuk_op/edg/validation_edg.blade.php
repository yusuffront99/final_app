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
                            <a href="{{route('lmasuk.op.edg')}}" class="text-primary mx-2">
                                All Inboxes / EDG System
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
                        <a href="{{route('lmasuk.op.edg')}}" class="btn btn-sm btn-primary"><i class='bx bx-left-arrow-circle'></i> Back</a>
                    </div>
                </div>
            </div>
            <div class="mx-auto">
                <div class="m-auto rounded">
                    <form action="{{route('op.edg_updated', $data_id->id)}}" method="POST" class="mx-auto" id="edit-edg-system">
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
                            <input type="hidden" value="{{$data_id->lev_bbm_awal}}" name="lev_bbm_awal">
                            <input type="hidden" value="{{$data_id->lev_oli}}" name="lev_oli">
                            <input type="hidden" value="{{$data_id->teg_battery}}" name="teg_battery">
                            <input type="hidden" value="{{$data_id->jam_start}}" name="jam_start">
                            <input type="hidden" value="{{$data_id->teg_out}}" name="teg_out">
                            <input type="hidden" value="{{$data_id->frekuensi}}" name="frekuensi">
                            <input type="hidden" value="{{$data_id->putaran}}" name="putaran">
                            <input type="hidden" value="{{$data_id->temp_coolant}}" name="temp_coolant">
                            <input type="hidden" value="{{$data_id->press_oli}}" name="press_oli">
                            <input type="hidden" value="{{$data_id->jam_stop}}" name="jam_stop">
                            <input type="hidden" value="{{$data_id->lev_bbm_akhir}}" name="lev_bbm_akhir">
                            <input type="hidden" value="{{$data_id->status_equipment_id}}" name="status_equipment_id">
                            <input type="hidden" value="{{$data_id->kondisi_peralatan}}" name="kondisi_peralatan">
                            <input type="hidden" value="{{$data_id->keterangan}}" name="keterangan">
                            <input type="hidden" value="{{$data_id->catatan_spv}}" name="catatan_spv">

                            <div class="p-3 card bg-secondary text-white">
                                <h5 class="text-primary fw-bold">Validation EDG System</h5>
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
                                        <th>Tanggal Update</th>
                                        <th>:</th>
                                        <th>{{$data_id->tanggal_update}}</th>
                                    </tr>
                                </table>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                        <ul>
                                            <li class="text-success">Kondisi Peralatan : 
                                                @if ($data_id->kondisi_peralatan == 'Normal')
                                                    <span class="badge bg-success">{{$data_id->kondisi_peralatan}}</span>
                                                @else
                                                    <span class="badge bg-danger">{{$data_id->kondisi_peralatan}}</span>
                                                @endif
                                            </li>
                                            <li>Jam Start : {{$data_id->jam_start}}</li>
                                            <li>Jam Stop : {{$data_id->jam_stop}}</li>
                                            <li>Level Oli : {{$data_id->lev_oli}}</li>
                                            <li>Temperature Coolant : {{$data_id->temp_coolant}}</li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <ul>
                                            <li>Level BBM Awal : {{$data_id->lev_bbm_awal}}</li>
                                            <li>Tegangan Output : {{$data_id->teg_out}}</li>
                                            <li>Frekuensi : {{$data_id->frekuensi}}</li>
                                            <li>Putaran : {{$data_id->putaran}}</li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <ul>
                                            <li>Level BBM Akhir : {{$data_id->lev_bbm_akhir}}</li>
                                            <li>Tegangan Battery : {{$data_id->teg_battery}}</li>
                                            <li>Pressure Oli : {{$data_id->press_oli}}</li>
                                            <li>Keterangan : {{$data_id->keterangan}}</li>
                                        </ul>
                                    </div>
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