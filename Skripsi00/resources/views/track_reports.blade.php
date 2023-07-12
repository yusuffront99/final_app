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
                                Unit Information
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

            {{-- ======== --}}
            <div class="card bg-light p-4">
               <div class="text-center fw-bold">Unit Information - PLTU Asam asam 34</div>
               <hr>
               <div class="row">
                   <div class="col-lg-8">
                        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active" data-bs-interval="10000">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="fw-bold">Data Grafik - SHIFT E</div>
                                            <canvas id="myChart-E"></canvas>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mx-2 scroll-about-1">
                                                <div class="fw-bold">Data Total Reports - SHIFT E</div>
                                                <br>
                                                @include('commons.track_records.E.data_record_shift_burner')
                                                @include('commons.track_records.E.data_record_shift_sootblower')
                                                @include('commons.track_records.E.data_record_shift_edg')
                                                @include('commons.track_records.E.data_record_shift_coboiler')
                                                @include('commons.track_records.E.data_record_shift_cocommon')
                                                @include('commons.track_records.E.data_record_shift_coturbine')
                                                @include('commons.track_records.E.data_record_shift_fwpump')
                                                @include('commons.track_records.E.data_record_shift_hppump')
                                                @include('commons.track_records.E.data_record_shift_hsdlevel')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                                 <div class="carousel-item" data-bs-interval="2000">
                                 <div class="row">
                                        <div class="col-lg-12">
                                            <div class="fw-bold">Data Grafik - SHIFT F</div>
                                            <canvas id="myChart-F"></canvas>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mx-2 scroll-about-1">
                                                <div class="fw-bold">Data Total Reports - SHIFT F</div>
                                                <br>
                                                @include('commons.track_records.F.data_record_shift_burner')
                                                @include('commons.track_records.F.data_record_shift_sootblower')
                                                @include('commons.track_records.F.data_record_shift_edg')
                                                @include('commons.track_records.F.data_record_shift_coboiler')
                                                @include('commons.track_records.F.data_record_shift_cocommon')
                                                @include('commons.track_records.F.data_record_shift_coturbine')
                                                @include('commons.track_records.F.data_record_shift_fwpump')
                                                @include('commons.track_records.F.data_record_shift_hppump')
                                                @include('commons.track_records.F.data_record_shift_hsdlevel')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                                 <div class="carousel-item" data-bs-interval="3000">
                                   <div class="row">
                                        <div class="col-lg-12">
                                            <div class="fw-bold">Data Grafik - SHIFT G</div>
                                            <canvas id="myChart-G"></canvas>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-lg-12 bg-light round">
                                                <div class="mx-2 scroll-about-1">
                                                <div class="fw-bold">Data Total Reports - SHIFT G</div>
                                                <br>
                                                @include('commons.track_records.G.data_record_shift_burner')
                                                @include('commons.track_records.G.data_record_shift_sootblower')
                                                @include('commons.track_records.G.data_record_shift_edg')
                                                @include('commons.track_records.G.data_record_shift_coboiler')
                                                @include('commons.track_records.G.data_record_shift_cocommon')
                                                @include('commons.track_records.G.data_record_shift_coturbine')
                                                @include('commons.track_records.G.data_record_shift_fwpump')
                                                @include('commons.track_records.G.data_record_shift_hppump')
                                                @include('commons.track_records.G.data_record_shift_hsdlevel')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                                 <div class="carousel-item">
                                   <div class="row">
                                        <div class="col-lg-12">
                                            <div class="fw-bold">Data Grafik - SHIFT H</div>
                                            <canvas id="myChart-H"></canvas>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mx-2 scroll-about-1">
                                                <div class="fw-bold">Data Total Reports - SHIFT H</div>
                                                <br>
                                                @include('commons.track_records.H.data_record_shift_burner')
                                                @include('commons.track_records.H.data_record_shift_sootblower')
                                                @include('commons.track_records.H.data_record_shift_edg')
                                                @include('commons.track_records.H.data_record_shift_coboiler')
                                                @include('commons.track_records.H.data_record_shift_cocommon')
                                                @include('commons.track_records.H.data_record_shift_coturbine')
                                                @include('commons.track_records.H.data_record_shift_fwpump')
                                                @include('commons.track_records.H.data_record_shift_hppump')
                                                @include('commons.track_records.H.data_record_shift_hsdlevel')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                             </div>
                             <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                                 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                 <span class="visually-hidden">Previous</span>
                             </button>
                             <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                                 <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                 <span class="visually-hidden">Next</span>
                             </button>
                         </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="row">
                        <div class="p-2 bg-dark rounded fw-bold text-warning">
                            <div id="calendar" class="bg-light"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="scroll-about-2 card shadow-lg bg-dark">
                            <div class="badge bg-primary d-grid p-2"><i class='bx bx-book-reader'></i> Equipment About </div>
                            
                            @foreach ($data as $dt)
                            <div class="p-2 my-1 border border-white text-dark bg-white rounded">
                                <small class="badge bg-danger">{{$dt->name_equipment}}</small><br>
                                <?php echo substr($dt->description,0,175)?>..
                                <a href="{{route('detail-about-equipment', $dt->id)}}" class="btn btn-sm btn-warning px-4">See Details <i class='bx bxs-right-arrow-circle'></i></a>
                            </div>
                            @endforeach
                        </div>
                    </div>
               </div>
            </div>
        </div>
        </div>
        <!-- / Content -->
        <!-- Footer -->
        @include('includes.footer')
        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


@push('add-script')
<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet' />
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            editable: true,
            events: '/home/unit_information',
            displayEventTime: false,
            display: 'background',
            eventRender: function (event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },
            selectable: true,
            selectHelper: true,
        });
    });
</script>
@endpush
@include('includes.statistic-js.shift_E')
@include('includes.statistic-js.shift_F')
@include('includes.statistic-js.shift_G')
@include('includes.statistic-js.shift_H')

@endsection

