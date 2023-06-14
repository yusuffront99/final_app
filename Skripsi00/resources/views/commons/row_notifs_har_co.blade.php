<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-4 mb-2">
        <div class="p-2 shadow-sm bg-warning rounded card-item text-center text-white">
            <strong>New Report</strong>
            <i class='bx bx-alarm-snooze icon-bg1'></i>
            <i class='bx bxs-bell-ring'></i>
            <div class="fs-3 fw-bold">{{$wf}}</div>
            <small>Total Laporan</small>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-4 mb-2">
        <div class="p-2 shadow-sm bg-primary rounded card-item text-center text-white">
            <strong>Waiting Material</strong>
            <i class='bx bx-alarm-snooze icon-bg1'></i>
            <i class='bx bxs-hourglass-bottom'></i>
            <div class="fs-3 fw-bold">{{$wmr}}</div>
            <small>Total Laporan</small>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-4 mb-2">
        <div class="p-2 shadow-sm bg-danger rounded card-item text-center text-white">
            <strong>Working</strong>
            <i class='bx bx-alarm-snooze icon-bg2'></i>
            <i class='bx bx-loader-circle'></i>
            <div class="fs-3 fw-bold">{{$wr}}</div>
            <small>Total Laporan</small>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-4 mb-4">
        <div class="p-2 shadow-sm bg-success rounded card-item text-center text-white">
            <strong>Resolved</strong>
            <i class='bx bx-alarm-snooze icon-bg3'></i>
            <i class='bx bx-check-circle'></i>
            <div class="fs-3 fw-bold">{{$rr}}</div>
            <small>Total Laporan</small>
        </div>
    </div>
</div>
<hr>
<div class="d-flex justify-content-between">
    <div>
        <a href="{{route('lmasuk.har')}}" class="btn btn-sm btn-danger"><i class='bx bx-left-arrow-circle'></i> Back</a>
    </div>
</div>