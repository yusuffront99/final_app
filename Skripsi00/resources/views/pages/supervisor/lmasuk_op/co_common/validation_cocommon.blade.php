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
                            <a href="{{route('lmasuk.op.cocommon')}}" class="text-primary mx-2">
                            All Inboxes / CO Common
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
                        <a href="{{route('lmasuk.op.cocommon')}}" class="btn btn-sm btn-primary"><i class='bx bx-left-arrow-circle'></i> Back</a>
                    </div>
                </div>
            </div>
            <div class="mx-auto">
                <div class="m-auto rounded">
                    <form action="{{route('op.cocommon_updated', $data_id->id)}}" method="POST" class="mx-auto" id="edit-edg-system">
                            @csrf
                            @method('put')
                            <input type="hidden" value="{{$data_id->id}}" name="id">
                            <input type="hidden" value="{{$data_id->user_id}}" name="user_id">
                            <input type="hidden" value="{{$data_id->operator_shift}}" name="operator_shift">
                            <input type="hidden" value="{{$data_id->unit}}" name="unit">
                            <input type="hidden" value="{{$data_id->tanggal_update}}" name="tanggal_update">
                            <input type="hidden" value="{{$data_id->jam_update}}" name="jam_update">
                            <input type="hidden" value="{{$data_id->nama_peralatan}}" name="nama_peralatan">
                            <input type="hidden" value="{{$data_id->operasi_awal}}" name="operasi_awal">
                            <input type="hidden" value="{{$data_id->rencana_operasi}}" name="rencana_operasi">
                            <input type="hidden" value="{{$data_id->operasi_akhir}}" name="operasi_akhir">
                            <input type="hidden" value="{{$data_id->status_kegiatan}}" name="status_kegiatan">
                            <input type="hidden" value="{{$data_id->status_peralatan}}" name="status_peralatan">
                            <input type="hidden" value="{{$data_id->status_equipment_id}}" name="status_equipment_id">
                            <input type="hidden" value="{{$data_id->keterangan}}" name="keterangan">
                            <input type="hidden" value="{{$data_id->catatan_spv}}" name="catatan_spv">

                            <div class="p-3 card bg-secondary text-white">
                                <h5 class="text-primary fw-bold">Validation CO Common</h5>
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
                                        <th>{{$data_id->users->atasan}}</th>
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
                                    <div class="col">
                                        <ul>
                                            <li>Nama Peralatan : <div class="text-success fw-bold">{{$data_id->nama_peralatan}}</div></li>
                                            <li>Motor Operasi Awal: <div class="text-success fw-bold">Motor {{$data_id->operasi_awal}}</div></li>
                                            <li>Rencana Operasi : <div class="text-success fw-bold">Motor {{$data_id->rencana_operasi}}</div></li>
                                            <li>Motor Operasi Akhir : <br> <div class="badge bg-success fw-bold">Motor {{$data_id->operasi_akhir}}</div></li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <ul>
                                            <li>Status Kegiatan : <div class="text-success fw-bold">{{$data_id->status_kegiatan}}</div></li>
                                            <li>Status Peralatan: <div class="text-success fw-bold">{{$data_id->status_peralatan}}</div></li>
                                            <li>Keterangan : <div class="text-success fw-bold">{{$data_id->keterangan}}</div></li>
                                        </ul>
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
