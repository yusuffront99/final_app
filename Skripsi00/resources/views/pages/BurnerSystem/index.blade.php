@extends('layouts.main')

@section('content')
@include('includes.navbar')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="rounded-pill fw-bold">
                <div class="row">
                    <div class="col-lg-8 col-sm-9">
                        <div class="p-2">
                            <a href="{{route('home')}}" class="text-primary">
                                <i class="bx bx-home-circle"></i> Home
                            </a>
                            /
                            <span class="text-warning mx-2">
                                Burner System
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
            
            <div class="my-2">
                <div class="card p-3">
                    <div class="p-2">
                        <div class="d-flex justify-content-between">
                            <a href="{{route('burner_system.create')}}" class="btn btn-sm btn-success" width="25%"><i class='bx bxs-plus-circle'></i> create burner</a>
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
                            <div class="row rounded m-auto">
                                <div class="col-lg-12 col-md-12 col-sm">
                                    <div class="mb-2">
                                        <small class="text-dark fst-italic"><i class='bx bx-info-circle'></i> Laporan Burner System adalah sebuah laporan yang dibuat untuk mengupdate kondisi terakhir peralatan tersebut. Yang mana ini dilakukan setiap seminggu sekali (Hari Minggu)</small><br>
                                        <a href="{{route('all_view_burner')}}" class="btn btn-warning btn-sm rounded-pill btn-all-info">All Information <i class='bx bxs-right-arrow-circle'></i></a>
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
                                                        <th id="th-col">Status</th>
                                                        <th id="th-col">Information</th>
                                                        <th id="th-col">Tracking</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            @include('commons.report_status')
                                                            @if ($dt->status_equipments->status_name == 'Rejected')
                                                                <div class="text-center">
                                                                    <a href="{{route('burner_system.edit', $dt->id)}}"><i class='bx bx-edit fs-4 text-danger'></i></a>
                                                                </div>
                                                            @endif
                                                        </td>
                                                        <td class="text-white">
                                                            <small class="bg-warning rounded-pill px-2 mb-2">{{$dt->unit}}</small>
                                                            <small class="bg-danger rounded-pill px-2 mb-2">{{Carbon\carbon::createFromFormat('Y-m-d', $dt->tanggal_update)->format('d-m-Y')}}</small>
                                                            <small class="bg-primary rounded-pill px-2 mb-2">{{$dt->operator_shift}}</small>
                                                            
                                                            
                                                            <p class="mt-2">
                                                                @if ($dt->status_equipments->status_name == 'Rejected')
                                                                    <div class="text-danger">
                                                                        <small class="text-danger fst-italic">*Laporan Perlu Diperbaiki : {{$dt->catatan_spv}}</small>
                                                                        <br><small class="text-white">{{$dt->catatan}}</small>
                                                                    </div>
                                                                    
                                                                @else
                                                                <div class="row">
                                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                                        <div class="px-2">
                                                                            <strong class="text-success">Burner 1</strong>
                                                                            
                                                                            <p>
                                                                            - {{$dt->status_burner1}}
                                                                            <br>
                                                                            - {{$dt->ket_burner1}}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                                        <div class="px-2">
                                                                            <strong class="text-success">Burner 2</strong>
                                                                            
                                                                            <p>
                                                                            - {{$dt->status_burner2}}
                                                                            <br>
                                                                            - {{$dt->ket_burner2}}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                                        <div class="px-2">
                                                                            <strong class="text-success">Burner 3</strong>
                                                                            
                                                                            <p>
                                                                            - {{$dt->status_burner3}}
                                                                            <br>
                                                                            - {{$dt->ket_burner3}}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                                        <div class="px-2">
                                                                            <strong class="text-success">Burner 4</strong>
                                                                            
                                                                            <p>
                                                                            - {{$dt->status_burner4}}
                                                                            <br>
                                                                            - {{$dt->ket_burner4}}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                            </p>
                                                        </td>
                                                        
                                                        <td class="text-center">
                                                        @include('commons.tracking_status')
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
                                        <a href="{{route('all_view_burner')}}" class="btn btn-primary text-white btn-sm rounded-pill btn-view mt-3">see all report <i class='bx bxs-right-arrow-circle'></i></a>
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
    <!-- / Layout page -->
        {{-- MODALS --}}
        <!-- Button trigger modal -->

<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel"><i class='bx bx-info-circle'></i> Laporan Burner</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @forelse ($data_latest as $dt)
            <div class="bg-dark rounded-pill p-2 mb-2 text-center text-white fw-bold">{{$dt->unit}}</div>
            <ul class="fw-bold">
                <li>Laporan Dibuat : <span class="badge bg-primary rounded-pill">{{$dt->users->nama_lengkap}} / {{$dt->operator_kedua}}</span></li>
                <li>Tanggal Laporan : <span class="badge bg-warning rounded-pill">{{Carbon\carbon::createFromFormat('Y-m-d', $dt->tanggal_update)->format('d-m-Y')}}</span></li>
                <li>Operator Shift / Unit : <span class="badge bg-success rounded-pill">{{$dt->operator_shift}}</span></li>
            </ul>
            
            <div class="fw-bold text-white text-center bg-danger rounded-pill">Informasi Laporan</div>
            <ul>
                <div class="row">
                    <div class="col-lg-6">
                        <li><div class="fw-bold">BURNER 1</div> : {{$dt->status_burner1}} / {{$dt->ket_burner1}}</li>
                        <li><div class="fw-bold">BURNER 2</div> : {{$dt->status_burner2}} / {{$dt->ket_burner2}}</li>
                    </div>
                    <div class="col-lg-6">
                        <li><div class="fw-bold">BURNER 3</div> : {{$dt->status_burner3}} / {{$dt->ket_burner3}}</li>
                        <li><div class="fw-bold">BURNER 4</div> : {{$dt->status_burner4}} / {{$dt->ket_burner4}}</li>
                    </div>
                </div>
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

