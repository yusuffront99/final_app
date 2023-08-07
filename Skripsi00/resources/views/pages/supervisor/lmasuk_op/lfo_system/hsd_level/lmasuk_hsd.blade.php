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
                            <span class="text-primary mx-2">
                            All Inboxes
                            </span>
                            /
                            <span class="text-warning mx-2">
                                High Speed Diesel
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
                    @include('commons.row_notifs_op_lfo')
                    {{-- ROW NOTIFS --}}
                    @include('commons.validasi_success_update')

                    <div class="row">
                            <div class="row py-3 rounded m-auto">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card bg-secondary text-white p-3">
                                        <div class="d-flex justify-content-between">
                                            @if ($data->count() > 0)
                                                <small><i class='bx bxs-bell-ring text-warning fs-3' data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Waiting Report"></i>
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
                                                        <th id="th-col" width="25%">Action</th>
                                                        <th id="th-col" width="">Information</th>
                                                        <th id="th-col" width="25">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            @if ($dt->status_equipments->status_name == 'Waiting')
                                                                <div class="text-center">
                                                                    <a href="{{route('op.hsdlevel_validation', $dt->id)}}"><i class='bx bx-edit fs-3 text-primary'></i></a>
                                                                </div>
                                                            @endif
                                                        </td>
                                                        
                                                        <td class="text-white">
                                                            {{-- <small class="bg-danger rounded-pill px-2 mb-2">{{Carbon\carbon::createFromFormat('Y-m-d H:i:s', $dt->created_at)->format('d-m-Y')}}</small> --}}
                                    
                                                            <small class="bg-primary rounded-pill px-2 mb-2">{{$dt->operator_shift}}</small>
                                                            <small class="bg-success rounded-pill px-2 mb-2">{{$dt->created_at}}</small>
                                                            <small class="bg-danger rounded-pill px-2 mb-2">{{$dt->users->nama_lengkap}}</small>
                                                            <hr>
                                                            @include('commons.alerts.emergency_alert_hsdlevel')
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
                                                                </div>
                                                            </p>
                                                        </td>
                                                        <td>
                                                            @include('commons.report_status')
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

