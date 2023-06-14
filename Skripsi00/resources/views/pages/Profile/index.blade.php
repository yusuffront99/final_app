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
                            <span class="text-primary mx-2">
                                Profile
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
            @if (session()->has('success'))
                <div class="notif-updated">
                    <strong class="fs-4">Yeah!! <i class='bx bx-check-circle fs-4'></i></strong>
                <br>
                    {{session('success')}}
                </div>
            @endif
            <div class="mx-auto">
                <div class="m-auto rounded text-dark bg-light">

                    <br>
                    <h3 class="text-center fw-bold my-2">Data Pribadi</h3>
                    <hr>
                    <div class="d-flex justify-content-between mx-4 mb-2">
                        <a href="{{route('home')}}" class="btn btn-sm btn-primary rounded"><i class='bx bx-left-arrow-circle'></i> Home</a>
                        @if (Auth::user()->divisi != 'Admin')
                            <a href="{{route('profile.edit', $user->id)}}" class="btn btn-sm btn-danger rounded mx-1"><i class='bx bxs-edit-alt'></i> Edit Profile</a>
                        @endif
                    </div>
                    <div class="my-3 mx-2">
                        <table class="table table-hovered fw-bold">
                            <tr>
                                <td width="20%">NIP</td>
                                <td width="5%">:</td>
                                <td><span class="text-primary fw-bold">{{$user->nip}}</span></td>
                            </tr>
                            <tr>
                                <td>Nama Panggilan</td>
                                <td>:</td>
                                <td><span class="text-primary fw-bold">{{$user->nama_panggilan}}</span></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><span class="text-primary fw-bold">{{$user->email}}</span></td>
                            </tr>
                            <tr>
                                <td>Divisi</td>
                                <td>:</td>
                                <td><span class="text-primary fw-bold">{{$user->divisi}}</span></td>
                            </tr>
                            <tr>
                                <td>Tim Divisi</td>
                                <td>:</td>
                                <td><span class="text-primary fw-bold">{{$user->tim_divisi}}</span></td>
                            </tr>
                            <tr>
                                <td>Jabatan</td>
                                <td>:</td>
                                <td><span class="text-primary fw-bold">{{$user->jabatan}}</span></td>
                            </tr>
                            <tr>
                                <td>Atasan</td>
                                <td>:</td>
                                <td><span class="text-primary fw-bold">{{$user->atasan}}</span></td>
                            </tr>
                            <tr>
                                <td>Foto Profil</td>
                                <td>:</td>
                                <td>
                                    <img src="{{asset('storage/' . $user->profile_img)}}" alt="" width="100px" height="120px">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('add-script')
<script>
    $(document).ready(function(){
        setTimeout(() => {
            $('.notif-updated').hide();
        }, 1000);
    });
</script>
@endpush

