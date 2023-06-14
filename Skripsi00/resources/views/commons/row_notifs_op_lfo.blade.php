<div class="row">
    <div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 mb-2">
        <div class="p-2 shadow-sm bg-primary rounded card-item text-center text-white">
            <strong>Forwarding Pump</strong>
            <i class='bx bx-alarm-snooze icon-bg1'></i>
            <div class="fs-3 fw-bold">{{$totfw}}</div>
            <small>Total Laporan</small>
            <div class="bg-white rounded">
                <a href="{{route('lmasuk.op.fwpump')}}" class="text-primary">see report</a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-4 mb-3">
        <div class="p-2 shadow-sm bg-primary rounded card-item text-center text-white">
            <strong>High Pressure Pump</strong>
            <i class='bx bx-alarm-snooze icon-bg3'></i>
            <div class="fs-3 fw-bold">{{$tothp}}</div>
            <small>Total Laporan</small>
            <div class="bg-white rounded">
                <a href="{{route('lmasuk.op.hppump')}}" class="text-primary">see report</a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-4 mb-3">
        <div class="p-2 shadow-sm bg-primary rounded card-item text-center text-white">
            <strong>High Speed Diesel</strong>
            <i class='bx bx-alarm-snooze icon-bg3'></i>
            <div class="fs-3 fw-bold">{{$tothp}}</div>
            <small>Total Laporan</small>
            <div class="bg-white rounded">
                <a href="{{route('lmasuk.op.hppump')}}" class="text-primary">see report</a>
            </div>
        </div>
    </div>
</div>