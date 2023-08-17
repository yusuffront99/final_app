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
                            <a href="{{route('dashboard')}}" class="text-primary">
                                <i class='bx bxs-dashboard'></i> Dashboard
                            </a>
                            /
                            <a href="{{route('equipment_about.index')}}" class="text-primary mx-2">
                                Equipment About
                            </a>
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
            <div class="rounded text-dark">
                <div class="row shadow-sm bg-light rounded p-3">
                    <h6 class="text-white bg-dark p-3 text-center rounded p-3">About Equipment</h6>
                    
                    <hr>
                    <div class="my-1">
                        <form action="{{route('equipment_about.update', $data_id->id)}}" method="POST" id="form-about-equipment" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <input type="hidden" name="id" value="{{$data_id->id}}">
                            <div class="row mx-auto">
                                <div class="col-lg-6">
                                <div class="form-group mx-2 mb-1">
                                        <label for="" class="fw-bold">Nama Peralatan</label>
                                        <input type="text" name="name_equipment" id="name_equipment" class="form-control" value="{{$data_id->name_equipment}}" required placeholder="BURNER SYSTEM">
                                    </div>
                                    <div class="form-group mx-2 mb-1">
                                        <label for="" class="fw-bold">Posisi Peralatan (lantai)</label>
                                        <input type="text" name="position" id="position" class="form-control" placeholder="ex:3" value="{{$data_id->position}}" required>
                                    </div>
                                    <div class="form-group mx-2 mb-1">
                                        <label for="" class="fw-bold">Deskripsi Peralatan</label>
                                        <textarea name="description" id="description" cols="10" rows="5" class="form-control" required>{{$data_id->description}}</textarea>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6">
                                    <div class="form-group mx-2 mb-1">
                                        
                                        <label for="" class="fw-bold">Image Equipment</label>
                                        <input type="hidden" name="oldImage" value="{{$data_id->img_equipment}}">
                                        <input type="file" name="img_equipment" id="img_equipment" class="form-control" value="{{$data_id->img_equipment}}">
                                    </div>
                                    <div class="form-group mx-2 mb-1">
                                        <div class="form-control">
                                            <label for="specification" class="text-primary fw-bold">Specification <small class="text-danger">*</small></label>
                                            <input id="specification" type="hidden" name="specification" value="{{$data_id->specification}}" required>
                                            <trix-editor input="specification"></trix-editor>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid gap-2 px-4 py-2">
                                <button type="submit" class="btn btn-success text-center" id="btn-save">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@include('includes.footer')
@endsection
