<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 mb-2">
        <div class="p-2 shadow-sm bg-primary rounded card-item text-center text-white">
            <strong>Change Over Turbine</strong>
            <i class='bx bx-alarm-snooze icon-bg1'></i>
            <div class="fs-3 fw-bold">{{$totcot}}</div>
            <small>Total Laporan</small>
            <div class="bg-white rounded">
                <a href="{{route('op.coturbine_data_shift')}}" class="text-primary">see report</a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6">
        <div class="p-2 shadow-sm bg-primary rounded card-item text-center text-white">
            <strong>Change Over Boiler</strong>
            <i class='bx bx-alarm-snooze icon-bg2'></i>
            <div class="fs-3 fw-bold">{{$totcob}}</div>
            <small>Total Laporan</small>
            <div class="bg-white rounded">
                <a href="{{route('op.coboiler_data_shift')}}" class="text-primary">see report</a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-4 mb-3">
        <div class="p-2 shadow-sm bg-primary rounded card-item text-center text-white">
            <strong>Change Over Common</strong>
            <i class='bx bx-alarm-snooze icon-bg3'></i>
            <div class="fs-3 fw-bold">{{$totcoc}}</div>
            <small>Total Laporan</small>
            <div class="bg-white rounded">
                <a href="{{route('op.cocommon_data_shift')}}" class="text-primary">see report</a>
            </div>
        </div>
    </div>
</div>