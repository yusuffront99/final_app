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
                            <a href="{{route('lmasuk.op.hppump')}}" class="text-primary mx-2">
                            All Inboxes / HSD Level
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
                        <a href="{{route('lmasuk.op.hsdlevel')}}" class="btn btn-sm btn-primary"><i class='bx bx-left-arrow-circle'></i> Back</a>
                    </div>
                </div>
            </div>
            <div class="mx-auto">
                <div class="m-auto rounded">
                    <form action="{{route('op.hsdlevel_updated', $data_id->id)}}" method="POST" class="mx-auto">
                            @csrf
                            @method('put')
                            <input type="hidden" value="{{$data_id->id}}" name="id">
                            <input type="hidden" value="{{$data_id->user_id}}" name="user_id">
                            <input type="hidden" value="{{$data_id->operator_shift}}" name="operator_shift">
                            <input type="hidden" value="{{$data_id->storage_level}}" name="storage_level">
                            <input type="hidden" value="{{$data_id->daily_level}}" name="daily_level">
                            <input type="hidden" value="{{$data_id->info_hsd}}" name="info_hsd">
                            <input type="hidden" value="{{$data_id->status_peralatan}}" name="status_peralatan">
                            <input type="hidden"  name="catatan_spv">
                            

                            <div class="p-3 card bg-secondary text-white">
                                <h5 class="text-primary fw-bold">Validation HSD Level</h5>
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
                                        <th>{{$data_id->users->atasan}}</th>
                                    </tr>
                                    <tr>
                                        <th>Operator Shift</th>
                                        <th>:</th>
                                        <th>{{$data_id->operator_shift}}</th>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Update / Jam Update</th>
                                        <th>:</th>
                                        <th>{{$data_id->created_at}}</th>
                                    </tr>
                                </table>
                                <hr>
                                <div class="row">
                                    <div class="col-lg">
                                        <strong class="text-warning">High Speed Diesel Level</strong>
                                        <br>
                                        <ul>
                                            <li>Storage Level : 
                                                @if ($data_id->storage_level >= 3.50)
                                                    <div class="text-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Level Normal">{{$data_id->storage_level}} / m<sup>3</sup><i class='bx bxs-up-arrow-circle'></i></div>
                                                @else
                                                <div class="text-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Level Low">{{$data_id->storage_level}} / m<sup>3</sup> <i class='bx bxs-down-arrow-circle'></i></div>
                                                @endif
                                            </li>
                                            <li>Daily Level : 
                                                @if ($data_id->daily_level >= 2.00)
                                                <div class="text-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Level Normal">{{$data_id->daily_level}} / m<sup>3</sup> <i class='bx bxs-up-arrow-circle'></i></div>
                                                @else
                                                <div class="text-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Level Low">{{$data_id->daily_level}} / m<sup>3</sup> <i class='bx bxs-down-arrow-circle'></i></div>
                                                @endif
                                            </li>
                                            <li>
                                                <small>Status: <span class="badge bg-success">{{$data_id->status}}</span></small>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg text-success">
                                        <small>Keterangan :</small>
                                        
                                        <br>
                                        <small>
                                            
                                            {!!$data_id->info_hsd!!}
                                        </small>
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
