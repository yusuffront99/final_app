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
                                Sootblowers System
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
                            <a href="{{route('sbl_system.create')}}" class="btn btn-sm btn-success" width="25%"><i class='bx bxs-plus-circle'></i> create SBL</a>
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
                                        <small class="text-dark fst-italic"><i class='bx bx-info-circle'></i> Laporan Sootblowers System adalah sebuah laporan yang dibuat untuk mengupdate kondisi terakhir peralatan tersebut. Yang mana ini dilakukan setiap seminggu sekali (Hari Minggu)</small><br>
                                        <a href="{{route('all_view_edg')}}" class="btn btn-warning btn-sm rounded-pill btn-all-info">All Information <i class='bx bxs-right-arrow-circle'></i></a>
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
                                                                    <a href="{{route('sbl_system.edit', $dt->id)}}"><i class='bx bx-edit fs-4 text-danger'></i></a>
                                                                    <br><small class="text-white">{{$dt->catatan}}</small>
                                                                </div>
                                                            @endif
                                                        
                                                        </td>
                                                        <td class="text-white">
                                                            <small class="bg-danger rounded-pill px-2 mb-2">{{Carbon\carbon::createFromFormat('Y-m-d', $dt->tanggal_update)->format('d-m-Y')}}</small>
                                                            
                                                            <small class="bg-primary rounded-pill px-2 mb-2">{{$dt->operator_shift}}</small>
                                                            
                                                            
                                                            <p class="mt-2">
                                                                @if ($dt->status_equipments->status_name == 'Rejected')
                                                                    <div class="text-danger">
                                                                        <small class="text-danger fst-italic">*Laporan Perlu Diperbaiki</small>
                                                                        <br><small class="text-white">{{$dt->catatan_spv}}</small>
                                                                    </div>
                                                                    
                                                                @else
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <ul>
                                                                            <li>Type-L (Short) : </li> @include('commons.indication_sbl_type_L')
                                                                            <li>Type-C (Long) : </li> @include('commons.indication_sbl_type_C')
                                                                            <li>Type-G/YB (Rotary/Swing) : </li> @include('commons.indication_sbl_type_G')
                                                                            <hr>
                                                                            <li>
                                                                                <div class="text-warning fw-bold">
                                                                                Keterangan : {!!$dt->keterangan!!}
                                                                                </div>
                                                                            </li>
                                                                        </ul>
  
                                                                        @if ($dt->status_equipments->status_name == 'Waiting Material')
                                                                        <div class="text-warning fw-bold">
                                                                            <small class="text-warning fst-italic">*Catatan Supervisor : {{$dt->catatan_spv}}</small>
                                                                            <br><small class="text-white">{{$dt->catatan}}</small>
                                                                        </div>
                                                                        @endif

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
                                        <a href="{{route('all_view_sootblower')}}" class="btn btn-primary text-white btn-sm rounded-pill btn-view mt-3">see more <i class='bx bxs-right-arrow-circle'></i></a>
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
            <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel"><i class='bx bx-info-circle'></i> Laporan Sootblower System</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @forelse ($data_latest as $dt)
            <ul class="fw-bold">
                <li>Laporan Dibuat : <span class="badge bg-primary rounded-pill">{{$dt->users->nama_lengkap}} / {{$dt->operator_kedua}}</span></li>
                <li>Tanggal Laporan : <span class="badge bg-warning rounded-pill">{{Carbon\carbon::createFromFormat('Y-m-d', $dt->tanggal_update)->format('d-m-Y')}}</span></li>
                <li>Operator Shift : <span class="badge bg-success rounded-pill">{{$dt->operator_shift}}</span></li>
                <li>Unit : <span class="badge bg-success rounded-pill">{{$dt->unit}}</span></li>
            </ul>
            
            <div class="fw-bold text-white text-center bg-danger rounded-pill">Informasi Laporan</div>
            <div class="fw-bold">
                {!!$dt->keterangan!!}
            </div>
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

