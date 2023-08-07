@extends('layouts.main')

@section('content')

@include('includes.navbar')
    <!-- Content wrapper -->
    <div class="content-wrapper mt-2">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y mb-2">
            <div class="mb-2 rounded-pill p-3 fw-bold">
                <div class="row">
                    <div class="col-lg-8 col-sm-9">
                        <div class="p-2">
                            <a href="{{route('home')}}" class="text-primary">
                                <i class="bx bx-home-circle"></i> Home
                            </a>
                            /
                            <span class="text-warning mx-2">
                                All Inboxes
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
            
            <div class="mb-3">
                <div class="card px-4">
                    <strong class="text-center mb-4 mt-2 fs-5">All Inboxes <hr></strong>
                    
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-3">
                            <div class="rounded text-white bg-core-burner">
                                <div class="back-bg">
                                    <i class='bx bxs-package'></i>
                                </div>
                                <div class="text-center mb-3">Burner System</div>
                                <div class="d-flex justify-content-between mx-3 mb-3">
                                    <div class="icon">
                                        <div class="icon-dg">
                                            <i class='bx bx-mail-send fs-2'></i>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        In Processing
                                        <br>
                                        <h2 class="fw-bold text-white">{{$wb}}</h2>
                                    </div>
                                </div>
                                <div class="text-center"><a href="{{route('lmasuk.har.burner')}}" class="text-white btn-dg">see report <i class='bx bx-right-arrow-circle'></i></a></div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <div class="rounded text-white bg-core-burner">
                                <div class="back-bg">
                                    <i class='bx bxs-package'></i>
                                </div>
                                <div class="text-center mb-3">Forwarding Pump</div>
                                <div class="d-flex justify-content-between mx-3 mb-3">
                                    <div class="icon">
                                        <div class="icon-dg">
                                            <i class='bx bx-mail-send fs-2'></i>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        In Processing
                                        <br>
                                        <h2 class="fw-bold text-white">{{$wfp}}</h2>
                                    </div>
                                </div>
                                <div class="text-center"><a href="{{route('lmasuk.har.fwpump')}}" class="text-white btn-dg">see report <i class='bx bx-right-arrow-circle'></i></a></div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <div class="rounded text-white bg-core-burner">
                                {{-- <div class="blink"><i class='bx bxs-star fs-3'></i></div> --}}
                                <div class="back-bg">
                                    <i class='bx bxs-package'></i>
                                </div>
                                <div class="text-center mb-3">High Pressure Pump</div>
                                <div class="d-flex justify-content-between mx-3 mb-3">
                                    <div class="icon">
                                        <div class="icon-dg">
                                            <i class='bx bx-mail-send fs-2'></i>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        In Processing
                                        <br>
                                        <h2 class="fw-bold text-white">{{$whp}}</h2>
                                    </div>
                                </div>
                                <div class="text-center"><a href="{{route('lmasuk.har.hppump')}}" class="text-white btn-dg">see report <i class='bx bx-right-arrow-circle'></i></a></div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <div class="rounded text-white bg-core-edg">
                                <div class="back-bg">
                                    <i class='bx bxs-package'></i>
                                </div>
                                <div class="text-center mb-3">Emergency Diesel Generator</div>
                                <div class="d-flex justify-content-between mx-3 mb-3">
                                    <div class="icon">
                                        <div class="icon-dg">
                                            <i class='bx bx-mail-send fs-2'></i>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        In Processing
                                        <br>
                                        <h2 class="fw-bold text-white">{{$we}}</h2>
                                    </div>
                                </div>
                                <div class="text-center"><a href="{{route('lmasuk.har.edg')}}" class="text-white btn-dg">see report <i class='bx bx-right-arrow-circle'></i></a></div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <div class="rounded text-white bg-core-edg">
                                <div class="back-bg">
                                    <i class='bx bxs-package'></i>
                                </div>
                                <div class="text-center mb-3">Change Over Turbine</div>
                                <div class="d-flex justify-content-between mx-3 mb-3">
                                    <div class="icon">
                                        <div class="icon-dg">
                                            <i class='bx bx-mail-send fs-2'></i>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        In Processing
                                        <br>
                                        <h2 class="fw-bold text-white">{{$wcot}}</h2>
                                    </div>
                                </div>
                                <div class="text-center"><a href="{{route('lmasuk.har.coturbine')}}" class="text-white btn-dg">see report <i class='bx bx-right-arrow-circle'></i></a></div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <div class="rounded text-white bg-core-edg">
                                <div class="back-bg">
                                    <i class='bx bxs-package'></i>
                                </div>
                                <div class="text-center mb-3">Change Over Boiler</div>
                                <div class="d-flex justify-content-between mx-3 mb-3">
                                    <div class="icon">
                                        <div class="icon-dg">
                                            <i class='bx bx-mail-send fs-2'></i>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        In Processing
                                        <br>
                                        <h2 class="fw-bold text-white">{{$wcob}}</h2>
                                    </div>
                                </div>
                                <div class="text-center"><a href="{{route('lmasuk.har.coboiler')}}" class="text-white btn-dg">see report <i class='bx bx-right-arrow-circle'></i></a></div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <div class="rounded text-white bg-core-lfo">
                                <div class="back-bg">
                                    <i class='bx bxs-package'></i>
                                </div>
                                <div class="text-center mb-3">Sootblower</div>
                                <div class="d-flex justify-content-between mx-3 mb-3">
                                    <div class="icon">
                                        <div class="icon-dg">
                                            <i class='bx bx-mail-send fs-2'></i>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        In Processing
                                        <br>
                                        <h2 class="fw-bold text-white">{{$wsbl}}</h2>
                                    </div>
                                </div>
                                <div class="text-center"><a href="{{route('lmasuk.har.sootblower')}}" class="text-white btn-dg">see report <i class='bx bx-right-arrow-circle'></i></a></div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <div class="rounded text-white bg-core-lfo">
                                <div class="back-bg">
                                    <i class='bx bxs-package'></i>
                                </div>
                                <div class="text-center mb-3">Change Over Common</div>
                                <div class="d-flex justify-content-between mx-3 mb-3">
                                    <div class="icon">
                                        <div class="icon-dg">
                                            <i class='bx bx-mail-send fs-2'></i>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        In Processing
                                        <br>
                                        <h2 class="fw-bold text-white">{{$wcoc}}</h2>
                                    </div>
                                </div>
                                <div class="text-center"><a href="{{route('lmasuk.har.cocommon')}}" class="text-white btn-dg">see report <i class='bx bx-right-arrow-circle'></i></a></div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <div class="rounded text-white bg-core-lfo">
                                <div class="back-bg">
                                    <i class='bx bxs-package'></i>
                                </div>
                                <div class="text-center mb-3">HSD Level</div>
                                <div class="d-flex justify-content-between mx-3 mb-3">
                                    <div class="icon">
                                        <div class="icon-dg">
                                            <i class='bx bx-mail-send fs-2'></i>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        In Processing
                                        <br>
                                        <h2 class="fw-bold text-white">{{$whsd}}</h2>
                                    </div>
                                </div>
                                <div class="text-center"><a href="{{route('lmasuk.har.hsdlevel')}}" class="text-white btn-dg">see report <i class='bx bx-right-arrow-circle'></i></a></div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                      
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
    });
</script>
@endpush

