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
                            <a href="{{route('burner_system.index')}}" class="text-primary mx-2">
                                Unit Information
                            </a>
                            /
                            <span class="text-warning mx-2">
                                About Equipment
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
                  <div class="card bg-dark p-3">
                    <a href="{{route('unit-information')}}" class="btn btn-warning btn-sm">Back</a>
                    <br>
                    <div class="tex-center badge bg-primary mb-2 p-3">Equipment Detail</div>
                    <div class="my-2">
                        <table class="table table-bordered text-white">
                            <tr>
                                <td>Equipment Name: </td>
                                <td class="text-danger fw-bold">{{$equipment_id->name_equipment}}</td>
                            </tr>
                            <tr>
                                <td>Position (fl) : </td>
                                <td>{{$equipment_id->position}}</td>
                            </tr>
                            <tr>
                                <td>Description: </td>
                                <td>{{$equipment_id->description}}</td>
                            </tr>
                            <tr>
                                <td>Specification : </td>
                                <td>{!!$equipment_id->specification!!}</td>
                            </tr>
                            <tr>
                                <td>Equipment Image</td>
                                <td>
                                    <img src="{{asset('storage/' . $equipment_id->img_equipment)}}" alt=""  width="500px" height="400px">
                                </td>
                            </tr>
                        </table>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')
@endsection
