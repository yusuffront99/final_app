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
                                Forwarding Pump
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
                                            <table>
                                                @forelse ($data as $dt)
                                                <thead class="text-center mb-4">
                                                    <tr>
                                                        <th id="th-col" width="15%">Action</th>
                                                        <th id="th-col" width="100%">Information</th>
                                                        <th id="th-col" width="15%">Status</th>
                                                    </tr>
                                                </thead>
                                            
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center">
                                                            @if ($dt->status_equipments->status_name == 'Waiting')
                                                                <a href="{{route('op.fwpump_validation', $dt->id)}}"><i class='bx bx-edit fs-3'></i></a>
                                                            @endif
                                                        </td>
                                                        <td class="text-white">
                                                            <small class="bg-danger rounded-pill px-2 mb-2">{{Carbon\carbon::createFromFormat('Y-m-d', $dt->tanggal_update)->format('d-m-Y')}}</small>
                                                            <small class="bg-primary rounded-pill px-2 mb-2">{{$dt->operator_shift}}</small>
                                                            
                                                            <p class="mt-4">
                                                                <div class="row px-3">
                                                                    <div class="col-lg-5">
                                                                        <strong class="text-success">FP Pump</strong>
                                                                        {!!$dt->info_FP!!}
                                                                    </div>
                                                                </div>
                                                            </p>
                                                            <hr>
                                                        </td>
                                                        <td>
                                                            @include('commons.report_status')
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                    @empty
                                                    <tbody>
                                                        <tr>
                                                            <div class="text-center">
                                                                Tidak Ada Laporan Masuk
                                                            </div>
                                                        </tr>
                                                    </tbody>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                        <a href="{{route('op.all_fwpump_validation')}}" class="btn btn-primary text-white btn-sm rounded-pill btn-view mt-3">see all <i class='bx bxs-right-arrow-circle'></i></a>
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

