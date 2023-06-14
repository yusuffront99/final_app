@extends('layouts.main')

@section('content')
@include('includes.navbar')
    <!-- Content wrapper -->
    <div class="content-wrapper mt-2">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="mb-2 rounded-pill p-3 fw-bold">
                <div class="row">
                    <div class="col-lg-8 col-sm-9">
                        <div class="p-2">
                            <a href="{{route('home')}}" class="text-primary">
                                <i class="bx bx-home-circle"></i> Home
                            </a>
                            /
                            <span class="text-warning mx-2">
                                CO Boiler
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
                    
                    {{-- ROW NOTIFS --}}
                    @include('commons.row_notifs_har_co')
                    {{-- ROW NOTIFS --}}

                    @include('commons.validasi_success_update')

                    <div class="row">
                        <div class="row py-3 rounded m-auto">
                            <div class="col-lg-12 col-md-12">
                                <div class="card bg-secondary text-white p-3">
                                    <div class="d-flex justify-content-between">
                                        @if ($data->count() > 0)
                                            <small><i class='bx bxs-bell-ring text-warning fs-3' data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="processing"></i>
                                            <strong id="bell-waiting">{{$data->count()}}</strong>
                                            </small>
                                            @else
                                            <small><i class='bx bxs-bell-ring text-white fs-3'></i>
                                            <strong id="bell-waiting">{{$data->count()}}</strong>
                                            </small>
                                            @endif
                                        
                                        <small><i class='bx bxs-calendar'></i> {{$mon}}</small>
                                    </div>
                                    <br>

                                    <div class="scroll">
                                        <table class="table table-hovered">
                                            @forelse ($data as $dt)
                                            <thead class="text-center mb-4">
                                                <tr>
                                                    <th id="th-col" width="20%">Aksi</th>
                                                    <th id="th-col" width="100%">Information</th>
                                                    <th id="th-col" width="20%">Tracking</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">
                                                        @if ($dt->status_equipments->status_name == 'Forwarding')
                                                            <a href="{{route('har.coboiler_validation', $dt->id)}}" class="text-primary"><i class="bx bx-edit fs-3"></i></a>
                                                        @elseif ($dt->status_equipments->status_name == 'Waiting Material')
                                                            <a href="{{route('har.coboiler_validation', $dt->id)}}" class="text-primary"><i class="bx bx-edit fs-3"></i></a>
                                                        @elseif ($dt->status_equipments->status_name == 'Working')
                                                            <a href="{{route('har.coboiler_validation', $dt->id)}}" class="text-primary"><i class="bx bx-edit fs-3"></i></a>
                                                        {{-- @else
                                                            - --}}
                                                        @endif
                                                    </td>
                                                    <td class="text-white">
                                                        <span class="bg-danger rounded-pill px-2 mb-2"><small>{{Carbon\carbon::createFromFormat('Y-m-d', $dt->tanggal_update)->format('d-m-Y')}}</small></span>
                                                        <span class="bg-primary rounded-pill px-2 mb-2"><small>{{$dt->operator_shift}}</small></span>
                                                        <span class="bg-success rounded-pill px-2 mb-2"><small>{{$dt->unit}}</small></span>
                                                        
                                                        
                                                        <p class="mt-2">
                                                            @if ($dt->status_equipments->status_name == 'Rejected')
                                                                <div class="text-danger">
                                                                    <small class="text-danger fst-italic">*Laporan Perlu Diperbaiki</small>
                                                                </div>
                                                                
                                                            @else
                                                            <div class="row">
                                                                <div class="col">
                                                                    <ul>
                                                                        <li>Nama Peralatan : <br><div class="badge bg-success rounded-pill">{{$dt->nama_peralatan}}</div></li>
                                                                        <li>Status Kegiatan : <br> <div class="text-success">{{$dt->status_kegiatan}}</div></li>
                                                                        <li>Alat Beroperasi : <br> <div class="text-success">Motor {{$dt->operasi_akhir}}</div></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col">
                                                                    <ul>
                                                                        <li>Status Peralatan : <br> <div class="text-success">{{$dt->status_peralatan}}</div></li>
                                                                        <li>Keterangan : <br> <div class="text-success">{{$dt->keterangan}}</div></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            @endif
                                                        </p>
                                                    </td>
                                                    
                                                    <td class="text-center">
                                                        @include('commons.report_status')
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
                                    <a href="{{route('har.all_coboiler_validation')}}" class="btn btn-primary text-white btn-sm rounded-pill btn-view mt-3">see all <i class='bx bxs-right-arrow-circle'></i></a>
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
@endsection

@push('add-script')
<script>
    $(document).ready(function(){
        $('#example').DataTable({
                scrollY: 100,
                scrollX: true,
            });

            setTimeout(() => {
            $('.notif-updated').hide();
        }, 1000);
    });
</script>
@endpush

