
@extends('layouts.main')

@section('content')
@include('includes.navbar')
    <!-- Content wrapper -->
    <div class="content-wrapper mt-2">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="rounded-pill p-3 fw-bold">
                <div class="row">
                    <div class="col-lg-8 col-sm-9">
                        <div class="p-2">
                            <a href="{{route('dashboard')}}" class="text-primary">
                                <i class='bx bxs-dashboard'></i> Dashboard
                            </a>
                            /
                            <span class="text-warning mx-2">
                                Maintenance
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

            <div class="my-3">
                <div class="card shadow-sm p-3 bg-light">
                    <span class="badge border border-primary text-primary p-3 fw-bold rounded mb-4" style="width: 100%">DATA MAINTENANCE</span>
                
                    <div class="p-2">
                        <div class="row">
                           <div class="col-lg-4">
                            <div class="border border-primary">
                                <div class="p-2">
                                    <div class="fw-bold bg-warning">
                                        <i class='bx bx-history'></i> Recent Repair History
                                    </div>

                                    <div class="my-1 scroll">
                                        <div class="card">
                                            <small>Hello Developer,</small>
                                            Admin telah menambahkan laporan baru
                                        </div>
                                    </div>

                                    <a href="{{route('maintenance.see_more')}}">See More</a>
                                </div>
                            </div>
                           </div>
                           <div class="col-lg-8">
                           @include('commons.maintenance_card')
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div id="text"></div>
        <!-- / Content -->

        <!-- Footer -->
        @include('includes.footer')
        <!-- / Footer -->
    <!-- / Layout page -->
@endsection

@push('add-script')
<script>
    $(document).ready(function(){
        $('#example').DataTable({
                scrollY: 300,
                scrollX: true,
            });

            $('.show_confirm').click(function(event) {
                var form =  $(this).closest("form");
                var name = $(this).data("name");
                event.preventDefault();
                swal({
                    title: `Are you sure you want to delete?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
            });

            setTimeout(() => {
            $('.notif-updated').hide();
        }, 1000);
    });
</script>
@endpush