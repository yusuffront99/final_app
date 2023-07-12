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
                                Task Schedule
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
                    <div class="d-flex justify-content-between mb-3">
                        <div class="d-flex justify-content-between">
                            <div class="">
                                <a href="{{route('task_schedule.index')}}" class="btn btn-sm btn-dark"><i class='bx bx-left-arrow-circle'></i> Back</a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <h6 class="text-white bg-dark p-3 text-center rounded p-3">Task Schedule</h6>
                    
                    <hr>
                    <div class="my-1">
                        <form action="{{route('task_schedule.update', $data_id->id)}}" method="POST" id="form-task-schedule" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                            <div class="form-group mb-1">
                                <label for="">Title</label>
                                <select name="title" id="title" class="form-select @error('title') is-invalid @enderror" required autocomplete="title">
                                    <option value="" selected hidden>-- Pilih Unit --</option>
                                   
                                    <option value="Burner" {{$data_id->title == 'Burner' ? 'selected' : ''}}>Burner</option>
                                    <option value="CO Boiler" {{$data_id->title == 'CO Boiler' ? 'selected' : ''}}>CO Boiler</option>
                                    <option value="CO Turbine" {{$data_id->title == 'CO Turbine' ? 'selected' : ''}}>CO Turbine</option>
                                    <option value="CO Common" {{$data_id->title == 'CO Common' ? 'selected' : ''}}>CO Common</option>
                                    <option value="EDG" {{$data_id->title == 'EDG' ? 'selected' : ''}}>EDG</option>
                                    <option value="Sootblower" {{$data_id->title == 'Sootblower' ? 'selected' : ''}}>Sootblower</option>
                                </select>
                            </div>
                            <div class="form-group mb-1">
                                <label for="">Start Date</label>
                                <input type="date" name="start" id="start" class="form-control" value="{{$data_id->start}}">
                            </div>
                            <div class="form-group mb-1">
                                <label for="">End Date</label>
                                <input type="date" name="end" id="end" class="form-control" value="{{$data_id->end}}">
                            </div>
                            <div class="d-grid gap-2 py-2">
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
