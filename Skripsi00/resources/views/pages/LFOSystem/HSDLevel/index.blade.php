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
                                HSD Level
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
                                <a href="{{route('hsd_level.create')}}" class="btn btn-sm btn-success mx-2" width="25%"
                                data-bs-title="HP Pump"><i class='bx bxs-plus-circle'></i> Create</a>
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
                                            <div><strong><i class='bx bxs-timer'></i> Recent Report HSD</strong></div>
                                        
                                        </div>
                                        <br>

                                        <div class="scroll">
                                            <table class="table table-hovered">
                                                @forelse ($data as $dt)
                                                <thead class="text-center mb-4">
                                                    <tr>
                                                        <th id="th-col" width="25%">Status</th>
                                                        <th id="th-col" width="">Information</th>
                                                        <th id="th-col" width="25">Condition</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            @include('commons.report_status')
                                                            <div class="text-center">
                                                                @if ($dt->status_equipments->status_name == 'Rejected')
                                                                    <a href="{{route('hsd_level.edit', $dt->id)}}"  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="HP Pump"><i class='bx bx-edit text-danger'></i></a>
                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td class="text-white">
                                                            <small class="bg-danger rounded-pill px-2 mb-2">{{Carbon\carbon::createFromFormat('Y-m-d H:i:s', $dt->created_at)->format('d-m-Y')}}</small>
                                    
                                                            <small class="bg-primary rounded-pill px-2 mb-2">{{$dt->operator_shift}}</small>
                                                            <small class="bg-success rounded-pill px-2 mb-2">{{$dt->created_at}}</small>
                                                            <small class="bg-danger rounded-pill px-2 mb-2">{{$dt->users->nama_lengkap}}</small>
                                                            <hr>
                                                            @include('commons.emergency_alert_hsdlevel')
                                                            <p class="mt-4">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <ul>
                                                                            <li>Storage Level : 
                                                                                @if ($dt->storage_level >= 3.50)
                                                                                    <div class="text-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Level Normal">{{$dt->storage_level}} <i class='bx bxs-up-arrow-circle'></i></div>
                                                                                @else
                                                                                <div class="text-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Level Low">{{$dt->storage_level}} / m<sup>3</sup> <i class='bx bxs-down-arrow-circle'></i></div>
                                                                                @endif
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <ul>
                                                                            <li>Daily Level : 
                                                                                @if ($dt->daily_level >= 2.00)
                                                                                <div class="text-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Level Normal">{{$dt->daily_level}} / m<sup>3</sup> <i class='bx bxs-up-arrow-circle'></i></div>
                                                                                @else
                                                                                <div class="text-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Level Low">{{$dt->daily_level}} / m<sup>3</sup> <i class='bx bxs-down-arrow-circle'></i></div>
                                                                                @endif
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <ul>
                                                                            <li>Catatan : 
                                                                                <div class="text-warning">
                                                                                    {!!$dt->info_hsd!!}
                                                                                    
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    @if ($dt->status_equipments->status_name == 'Rejected')
                                                                    <hr>
                                                                    <span class="text-danger fw-bold">Catatan : <span class="text-white">{{$dt->catatan_spv}}</span></span>
                                                                    @endif
                                                                </div>
                                                            </p>
                                                        </td>
                                                        <td>
                                                            @include('commons.status_alert_hsdlevel')
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
                                        <!-- <a href="" class="btn btn-primary text-white btn-sm rounded-pill btn-view mt-3">Show Detail<i class='bx bxs-right-arrow-circle'></i></a> -->
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

<!-- Modal -->
{{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
</div> --}}
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

