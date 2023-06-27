@extends('layouts.main')

@section('content')
@include('includes.navbar')
    <!-- Content wrapper -->
    <div class="content-wrapper mt-2">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="mb-4 rounded-pill p-3 fw-bold">
                <div class="row">
                    <div class="col-lg-8 col-sm-9">
                        <div class="p-2">
                            <a href="{{route('home')}}" class="text-primary">
                                <i class="bx bx-home-circle"></i> Home
                            </a>
                            /
                            <span class="text-warning mx-2">
                                EDG System
                            </span>
                        </div>
                    </div>
                                    
                    <div class="col-lg-3 col-sm-3 text-center">
                        <div class="badge bg-danger text-white">
                            Today : 
                            <span id="timer"></span>
                        </div>
                    </div>
                </div>
            </div>
            <hr>

            <div class="my-2">
                <div class="card p-3">
                    <div class="p-2">
                        <div class="d-flex justify-content-between">
                            <a href="{{route('edg_system.create')}}" class="btn btn-sm btn-success" width="25%"><i class='bx bxs-plus-circle'></i> create EDG</a>
                            <a href="" class="btn btn-sm btn-primary">{{Carbon\carbon::createFromFormat('Y-m-d', $date)->isoFormat('D MMMM Y')}}</a>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                            @if (session()->has('success'))
                                <div class="notif-updated">
                                    <strong class="fs-4">Yeah!! <i class='bx bx-check-circle fs-4'></i></strong>
                                <br>
                                    {{session('success')}}
                                </div>
                            @endif
                            <div class="row py-3 rounded m-auto">
                                <div class="col-lg-12 col-md-12 col-sm">
                                    <div class="mb-2">
                                        <small class="text-dark fst-italic"><i class='bx bx-info-circle'></i> Laporan Emergency Diesel Generator System adalah sebuah laporan yang dibuat untuk mengupdate kondisi terakhir peralatan tersebut. Yang mana ini dilakukan setiap seminggu sekali (Hari Jum'at)</small><br>
                                        <a href="{{route('all_view_edg')}}" class="btn btn-warning btn-sm rounded-pill btn-all-info">All Information <i class='bx bxs-right-arrow-circle'></i></a>
                                    </div>
                                    <div class="card bg-secondary text-white p-3">
                                        <div class="d-flex justify-content-between">
                                            <div><strong><i class='bx bxs-timer'></i> Recent Report {{Auth::user()->tim_divisi}}</strong></div>
                                            <div><a href="" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class='bx bx-history'></i> Informasi Terakhir</a></div>
                                        </div>
                                        <br>

                                        <div class="scroll">
                                            <table class="table table-hovered">
                                                @forelse ($data as $dt)
                                                <thead class="text-center mb-4">
                                                    <tr>
                                                        <th id="th-col" width="20%">Status</th>
                                                        <th id="th-col" width="100%">Information</th>
                                                        <th id="th-col" width="20%">Tracking</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            @include('commons.report_status')
                                                            @if ($dt->status_equipments->status_name == 'Rejected')
                                                                <div class="text-center">
                                                                    <a href="{{route('edg_system.edit', $dt->id)}}"><i class='bx bx-edit fs-4 text-danger'></i></a>
                                                                    <br><small class="text-white">{{$dt->catatan}}</small>
                                                                </div>
                                                            @endif
                                                        
                                                        </td>
                                                        <td class="text-white">
                                                            <small class="bg-danger rounded-pill px-2 mb-2">{{Carbon\carbon::createFromFormat('Y-m-d', $dt->tanggal_update)->format('d-m-Y')}}</small>
                                                            <br>
                                                            <small class="bg-primary rounded-pill px-2 mb-2">{{$dt->operator_shift}}</small>
                                                            
                                                            
                                                            <p class="mt-2">
                                                                @if ($dt->status_equipments->status_name == 'Rejected')
                                                                    <div class="text-danger">
                                                                        <small class="text-danger fst-italic">*Laporan Perlu Diperbaiki</small>
                                                                        <br><small class="text-white">{{$dt->catatan_spv}}</small>
                                                                    </div>
                                                                    
                                                                @else
                                                                <div class="row">
                                                                    <div class="col-lg-6 col-md-6">
                                                                        <div class="px-2">
                                                                            <ul>
                                                                                <li class="text-success">Tegangan Output</li> * {{$dt->teg_out}}
                                                                                <li class="text-success">Frekuensi</li> * {{$dt->frekuensi}}
                                                                                <li class="text-success">Putaran </li> * {{$dt->putaran}}
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-6">
                                                                        <div class="px-2">
                                                                            <ul>
                                                                                <li class="text-success">Pressure Oli </li> * {{$dt->press_oli}}
                                                                                <li class="text-success">Jam Start / Jam Stop </li> * {{$dt->jam_start}} / {{$dt->jam_stop}}
                                                                                <li class="text-success">Catatan </li> * {{$dt->catatan}}
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                            </p>
                                                        </td>
                                                        
                                                        <td class="text-center">
                                                            @include('commons.tracking_status')
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                    @empty
                                                    <tbody class="text-center">
                                                        <tr>
                                                            <td colspan="4">
                                                                <div class="my-4">Belum Ada Laporan Masuk</div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                        <a href="{{route('edg_system.shift_data_edg')}}" class="btn btn-primary text-white btn-sm rounded-pill btn-view mt-3">see all report <i class='bx bxs-right-arrow-circle'></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        @include('includes.footer')
        <!-- / Footer -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel"><i class='bx bx-info-circle'></i> Laporan Light Fuel Oil</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @forelse ($data_latest as $dt)
            <ul class="fw-bold">
                <li>Laporan Dibuat : <span class="badge bg-primary rounded-pill">{{$dt->users->nama_lengkap}} / {{$dt->operator_kedua}}</span></li>
                <li>Tanggal Laporan : <span class="badge bg-warning rounded-pill">{{Carbon\carbon::createFromFormat('Y-m-d', $dt->tanggal_update)->format('d-m-Y')}}</span></li>
                <li>Operator Shift : <span class="badge bg-success rounded-pill">{{$dt->operator_shift}}</span></li>
            </ul>
            
            <div class="fw-bold text-white text-center bg-danger rounded-pill">Informasi Laporan</div>
            <ul>
                <li class="fw-bold">Level BBM Awal / Level BBM Akhir</li>
                <span class="bold">{{$dt->lev_bbm_awal}} MM / {{$dt->lev_bbm_akhir}} MM</span>
                <li class="fw-bold">Jam Start Awal / Jam Stop</li>
                <span class="bold">{{$dt->jam_start}} / {{$dt->jam_stop}} </span>
                <li class="fw-bold">Tegangan Battery / Tegangan Output </li>
                <span class="bold">{{$dt->teg_battery}} V / {{$dt->teg_out}} V</span>
                <li class="fw-bold">Level Oli / Pressure Oli</li>
                <span class="bold">{{$dt->lev_oli}} / {{$dt->press_oli}} </span>
            </ul>
            <ul>
                <li class="fw-bold">Frekuensi / Putaran / Temperature Coolant</li>
                <span class="bold">{{$dt->lev_bbm_awal}} MM / {{$dt->lev_bbm_akhir}} MM</span>
                <br>
                <li class="fw-bold">Catatan</li>
                <span class="bold-catatan">{{$dt->catatan}}</span>
            </ul>
            <hr>
            @empty
                
            @endforelse
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>
{{-- MODALS --}}
    <!-- / Layout page -->
@endsection

@push('add-script')
<script>
    $(document).ready(function(){
        $('#example').DataTable({
                scrollY: 300,
                scrollX: true,
            });
        
        setTimeout(() => {
            $('.notif-updated').hide();
        }, 1000);
    });
</script>
@endpush

