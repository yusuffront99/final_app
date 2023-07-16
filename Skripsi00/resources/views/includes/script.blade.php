<!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{asset('frontends/assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('frontends/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('frontends/assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('frontends/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
    

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}

    <script src="{{asset('frontends/assets/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    {{-- <script src="{{asset('frontends/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script> --}}

    <!-- Main JS -->
    <script src="{{asset('frontends/assets/js/main.js')}}"></script>

    <!-- Page JS -->
    {{-- <script src="{{asset('frontends/assets/js/dashboards-analytics.js')}}"></script> --}}

    {{-- TRIX JS --}}
    <script src="{{asset('trix/js/trix.js')}}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    
    {{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script> --}}
    <script>
    setInterval(customClock, 500);
        function customClock() {
            var time = new Date();
            var hrs = time.getHours();
            var min = time.getMinutes();
            var sec = time.getSeconds();
            
            document.getElementById('timer').innerHTML = hrs + ":" + min + ":" + sec;
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.10.7/dayjs.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>


    <!-- {{-- <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
     --}} -->

