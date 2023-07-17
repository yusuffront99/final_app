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
                            <a href="{{route('maintenance.histories')}}" class="text-primary mx-2">
                                Maintenance / Repair History
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
            <div class="shadow-sm p-3 bg-light rounded">
                <div>
                    <div class="mb-2">
                        <a href="{{route('maintenance.histories')}}" class="btn btn-sm btn-primary"><i class='bx bx-left-arrow-circle'></i> Back</a>
                    </div>
                    <h6 class="text-white bg-dark p-3 text-center rounded-pill">Form Equipment Repair History</h6>
                    
                    <hr>
                    <form action="{{route('maintenance.update', $maintenance_id->id)}}" method="post">
                            @csrf                                
                            @method('put')
                          
                            <input type="hidden" name="user_id" value="{{$maintenance_id->user_id}}"> 
                            <input type="hidden" name="repair_code" value="{{$maintenance_id->repair_code}}"> 
                            <input type="hidden" name="category" value="{{$maintenance_id->category}}"> 
                            <input type="hidden" name="damage_date" value="{{$maintenance_id->damage_date}}"> 
                            <input type="hidden" name="repair_date" value="{{$maintenance_id->repair_date}}"> 
                            <input type="hidden" name="total_price" value="{{$maintenance_id->total_price}}"> 

                    <div class="row mx-2">
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-2 p-3" style="background-color: #efefef;">
                            <div class="form-group my-1 mx-2">
                                <label for="" class="fw-bold">Repair Code <small class="text-danger" style="font-size: 10px;">*Kode Perbaikan tidak bisa diubah</small></label>
                                <select name="repair_code" id="repair_code" class="form-select">
                                    <option value="{{$maintenance_id->repair_code}}">{{$maintenance_id->repair_code}}</option>
                                </select>
                            </div>
                            <div class="form-group my-1 mx-2">
                                <label for="" class="fw-bold">Kategori</label>
                                    <select name="category" id="category" class="form-select">
                                        <option value="{{$maintenance_id->category}}" selected>{{$maintenance_id->category}}</option>
                                    </select>
                                </option>
                            </div>
                            
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group my-1 mx-2">
                                        <label for="" class="fw-bold">Spart Part (1)</label>
                                        <select name="item_sp_1" id="item_sp_1" class="form-select">
                                            <option value="-">-- Spare Part --</option>
                                            @foreach ($spare_parts as $sp)
                                                <option value="{{$sp->spare_part_name}}" {{$sp->spare_part_name == $maintenance_id->item_sp_1 ? 'selected' : ''}}>{{$sp->spare_part_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group my-1 mx-2">
                                        <label for="" class="fw-bold">Item Spart Part (2)</label>
                                        <select name="item_sp_2" id="item_sp_2" class="form-select">
                                            <option value="-">-- Spare Part --</option>
                                            @foreach ($spare_parts as $sp)
                                                <option value="{{$sp->spare_part_name}}" {{$sp->spare_part_name == $maintenance_id->item_sp_2 ? 'selected' : ''}}>{{$sp->spare_part_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group my-1 mx-2">
                                        <label for="" class="fw-bold">Item Spart Part (3)</label>
                                        <select name="item_sp_3" id="item_sp_3" class="form-select">
                                            <option value="-">-- Spare Part --</option>
                                            @foreach ($spare_parts as $sp)
                                                <option value="{{$sp->spare_part_name}}" {{$sp->spare_part_name == $maintenance_id->item_sp_3 ? 'selected' : ''}}>{{$sp->spare_part_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group my-1 mx-2">
                                        <label for="" class="fw-bold">Total Item (1)</label>
                                        <input type="number" name="item_total_1" id="" value="{{$maintenance_id->item_total_1}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group my-1 mx-2">
                                        <label for="" class="fw-bold">Total Item (2)</label>
                                        <input type="number" name="item_total_2" id="" value="{{$maintenance_id->item_total_2}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group my-1 mx-2">
                                        <label for="" class="fw-bold">Total Item (3)</label>
                                        <input type="number" name="item_total_3" id="" value="{{$maintenance_id->item_total_3}}" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group my-1 mx-2">
                                        <label for="" class="fw-bold">Harge Per Item (1)</label>
                                        <input type="text" name="item_price_1" id="" value="{{$maintenance_id->item_price_1}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group my-1 mx-2">
                                        <label for="" class="fw-bold">Harge Per Item (2)</label>
                                        <input type="text" name="item_price_2" id="" value="{{$maintenance_id->item_price_2}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group my-1 mx-2">
                                        <label for="" class="fw-bold">Harge Per Item (3)</label>
                                        <input type="text" name="item_price_3" id="" value="{{$maintenance_id->item_price_3}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-2 p-3" style="background-color: #efefef;">
                            <div class="form-group my-1 mx-2 bg-light">
                                <label for="description" class="fw-bold">Penanganan & Perbaikan</label>
                                <input id="description" type="hidden" name="description" value="{{$maintenance_id->description}}">
                                <trix-editor input="description"></trix-editor>
                            </div>
                        </div>
                    </div>
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
@include('includes.footer')
@endsection
