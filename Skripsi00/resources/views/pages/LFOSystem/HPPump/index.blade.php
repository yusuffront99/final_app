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
                            <span class="text-primary mx-2">
                                LFO System
                            </span>
                            /
                            <span class="text-warning mx-2">
                                High Pressure Pump
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
                            <div class="d-flex justify-content-around">
                                @forelse ($hsd as $h)
                                @if ($h->daily_level >= 2.0)  
                                    <a href="{{route('hp_pump.create')}}" class="btn btn-sm btn-success" width="25%"><i class='bx bxs-plus-circle'></i> Create</a>
                                @else
                                    <button class="btn btn-sm btn-success" data-bs-toggle="modal" href="#exampleModalToggle" role="button"><i class='bx bxs-plus-circle'></i> Create</button>
                                @endif
                                @empty
                                <button class="btn btn-sm btn-success" data-bs-toggle="modal" href="#exampleModalToggle" role="button" disabled><i class='bx bxs-plus-circle'></i> Create</button>
                                @endforelse
                            </div>
                            <div class="">
                                <a href="" class="btn btn-sm btn-primary">{{Carbon\carbon::createFromFormat('Y-m-d', $date)->isoFormat('D MMMM Y')}}</a>
                            </div>
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
                            <div class="row rounded m-auto">
                                <div class="col-lg-12 col-md-12">
                                    <div class="mb-2">
                                        <small class="text-dark fst-italic"><i class='bx bx-info-circle'></i> Light Fuel Oil (LFO) System Report adalah sebuah laporan yang dibuat untuk mengupdate kondisi terakhir peralatan tersebut. Yang mana ini dilakukan setiap seminggu sekali (Hari Minggu)</small><br>
                                    </div>
                                    <div class="card bg-secondary text-white p-3">
                                        <div class="d-flex justify-content-between">
                                            <div><strong><i class='bx bxs-timer'></i> Recent Report {{Auth::user()->tim_divisi}}</strong></div>
                                            <div><a href="" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class='bx bx-history'></i> Recent History</a></div>
                                        </div>
                                        <br>

                                        <div class="scroll">
                                            <table class="table table-hovered">
                                                @forelse ($data as $dt)
                                                <thead class="text-center mb-4">
                                                    <tr>
                                                        <th id="th-col" width="25%">Status</th>
                                                        <th id="th-col" width="100%">Informasi</th>
                                                        <th id="th-col" width="35%">Tracking</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            @include('commons.report_status')
                                                            
                                                            <div class="text-center">
                                                                @if ($dt->status_equipments->status_name == 'Rejected')
                                                                    <a href="{{route('hp_pump.edit', $dt->id)}}"  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="HP Pump"><i class='bx bx-edit text-danger'></i></a>
                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td class="text-white">
                                                            <small class="bg-danger rounded-pill px-2 mb-2">{{Carbon\carbon::createFromFormat('Y-m-d', $dt->tanggal_update)->format('d-m-Y')}}</small>
                                    
                                                            <small class="bg-primary rounded-pill px-2 mb-2">{{$dt->operator_shift}}</small>
                                                            <small class="bg-warning rounded-pill px-2 mb-2">{{$dt->users->nama_lengkap}}</small>
                                                            
                                                            <p class="mt-4">
                                                                @if ($dt->status_equipments->status_name == 'Rejected')
                                                                    <div class="text-danger">                                         
                                                                        <small class="text-danger fst-italic">*Laporan Perlu Diperbaiki</small><br>
                                                                        {!!$dt->catatan!!}
                                                                    </div>
                                                                    <hr>
                                                                @else
                                                                    <div class="row">
                                                                        <div class="col-auto">
                                                                            <div class="text-success fw-bold">HP Pump</div>
                                                                            {!!$dt->info_HP!!}
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
                                                    <tbody>
                                                        <tr>
                                                            <td class="my-4 text-center text-white">
                                                                <div>Belum Ada Laporan Masuk</div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                        <a href="{{route('all_view_hppump')}}" class="btn btn-primary text-white btn-sm rounded-pill btn-view mt-3">see all report<i class='bx bxs-right-arrow-circle'></i></a>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-3 col-md-12 rounded">
                                    <div class="p-2">
                                    
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        @include('includes.footer')

        <!-- / Footer -->
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="text-center badge bg-success mx-3">HSD Level</div>
            <div class="modal-body">
                <div class="d-flex justify-content-evenly">
                    @foreach ($hsd as $h)
                    <strong class="text-primary">Storage Level (m<sup>3</sup>) : 
                        <br>
                        @if ($h->storage_level >= 3.0)
                        <div class="text-success">{{$h->storage_level}} / (m<sup>3</sup>)<i class='bx bx-up-arrow-circle'></i></div>
                        @else
                            <div class="text-danger">{{$h->storage_level}} / (m<sup>3</sup>)<i class='bx bx-down-arrow-circle'></i></div>
                        @endif
                    </strong>
                    <strong class="text-primary">Daily Level (m<sup>3</sup>) : <br><span class="text-danger">{{$h->daily_level}} / (m<sup>3</sup>)<i class='bx bx-down-arrow-circle'></i></span></strong>
                    @endforeach
                </div>
                <hr>
                <small class="text-warning">
                    Anda belum bisa membuat laporan HP Pump <br>
                    Karena HSD Level Abnormal
                </small>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel"><i class='bx bx-info-circle'></i> Laporan High Pressure Pump</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @forelse ($data_latest as $dt)
            <div class="scroll">
                <ul class="fw-bold">
                    <li>Laporan Dibuat : <span class="badge bg-primary rounded-pill">{{$dt->users->nama_lengkap}} / {{$dt->operator_kedua}}</span></li>
                    <li>Tanggal Laporan : <span class="badge bg-warning rounded-pill">{{Carbon\carbon::createFromFormat('Y-m-d', $dt->tanggal_update)->format('d-m-Y')}}</span></li>
                    <li>Operator Shift : <span class="badge bg-success rounded-pill">{{$dt->operator_shift}}</span>
                        <span class="badge bg-primary rounded-pill">{{$dt->unit}}</span>
                    </li>
                </ul>
                
                <div class="fw-bold text-white text-center bg-dark rounded-pill">Informasi Laporan</div>
                <ul>
                    <li class="fw-bold">Tanggal Update / Jam Update</li>
                    <span class="bold">{{$dt->tanggal_update}} / {{$dt->jam_update}} </span>
                    <li class="fw-bold text-success">High Pressure Pump A</li>
                    <span class="bold">{{$dt->press_HP_A}} MPA / {{$dt->arus_HP_A}} A</span>
                    <li class="fw-bold text-danger">High Pressure Pump B</li>
                    <span class="bold">{{$dt->press_HP_B}} MPA / {{$dt->arus_HP_B}} A</span>
                    <li class="fw-bold">Catatan High PressurePump</li>
                    <span class="bold">{!!$dt->info_HP!!}</span>
                </ul>
            </div>
            <hr>
            @empty
                <div class="text-center">Tidak ada</div>
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

