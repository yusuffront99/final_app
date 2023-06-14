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
                            <a href="{{route('hsd_level.index')}}" class="text-primary mx-2">
                                LFO System
                            </a>
                            /
                            <span class="text-primary mx-2">
                                HSD Level
                            </span>
                            /
                            <span class="text-warning mx-2">
                                Update
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
                    <div class="row shadow-sm p-3 bg-light rounded">
                        <div class="mb-2">
                            <a href="{{route('hsd_level.index')}}" class="btn btn-sm btn-primary rounded-pill"><i class='bx bx-left-arrow-circle'></i> Back</a>
                        </div>
                        <h6 class="text-white bg-dark p-3 text-center rounded-pill">Form LFO System - HSD Level</h6>
                        <form action="{{route('hsd_level.update', $data_id->id)}}" class="mx-auto" id="form-lfo-system" method="POST">
                            @csrf
                            @method('put')
                            <div class="row">
                                    <div class="col-lg-6 fw-bold form-fw">
                                        <div class="form-group mb-2 mx-3">
                                            <label for="user_id">Nama Operator</label>
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
                                        <div class="form-group mb-2 mx-3">
                                            <label for="arus_HP">HSD Level (M<sup>3</sup>)</label>
                                            <div class="row m-auto my-1">
                                                <div class="col">
                                                    <h6 class="text-center">Storage Level</h6>
                                                    <input type="number" value="{{$data_id->storage_level}}" placeholder="0.00" name="storage_level" id="storage_level" class="form-control" required>
                                                </div>
                                                <div class="col">
                                                    <h6 class="text-center">Daily Level</h6>
                                                    <input type="number" value="{{$data_id->storage_level}}" placeholder="0.00" name="daily_level" id="daily_level" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="col-lg-6 text-dark fw-bold">
                                        <div class="form-group mb-2 mx-3">
                                            <label for="status">Status</label>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="status" id="status" value="Normal" {{$data_id->status == 'Normal'? 'checked' : ''}}>
                                                        <label class="form-check-label" for="status">
                                                            Normal
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="status" id="status" value="Abnormal" {{$data_id->status == 'Abnormal'? 'checked' : ''}}>
                                                        <label class="form-check-label" for="status">
                                                            Abnormal
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-2 mx-3">
                                            <label for="info_hsd">Info HSD</label>
                                            {{-- @foreach ($history as $ht)
                                            <input id="info_hsd" type="hidden" name="info_hsd" value="{{$ht->info_hsd}}" required>
                                            @endforeach --}}
                                            <input value="{{$data_id->info_hsd}}" id="info_hsd" type="hidden" name="info_hsd" required>
                                            <trix-editor input="info_hsd"></trix-editor>
                                        </div>
                                        <input type="hidden" value="1" name="status_equipment_id" id="status_equipment_id">
                                        <input type="hidden" value="-" name="catatan_spv" id="catatan_spv">
                                    </div>

                                    <div class="d-grid gap-2 px-4 py-2">
                                        <button type="submit" class="btn btn-success text-center" id="btn-save">save</button>
                                    </div>
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
