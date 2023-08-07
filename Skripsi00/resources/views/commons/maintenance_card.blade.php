<div class="row">
    <div class="col-lg-4 col-sm-6 mb-3">
        <div class="card border border-danger shadow-md">
            <div class="text-center text-danger fw-bold p-2">
            @if ($data_burner > 0)
            <a href="{{route('maintenance-burner.index')}}" class="new-notif text-white" data-bs-toggle="tooltip" data-bs-placement="top" title=" {{$data_burner}} Laporan Baru"><i class='bx bx-bell' ></i></a>
            @endif
                <small><i class='bx bxs-hot'></i> BURNER</small>
            </div>
        </div>
        <div class="card bg-danger text-white fw-bold shadow-md my-1">
            <div class="text-center p-1">
                <small>Total Equipment Repaired</small>
                <span><i class='bx bx-cog'></i></span>
                <h2 class="fw-bold text-white">{{$tburner_repaired}}</h2>
                <span>
                    <a href="{{route('maintenance-burner.index')}}" class="border border-white text-white px-5 click-check">check</a>
                </span>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 mb-3">
        <div class="card border border-danger shadow-md">
            <div class="text-center text-danger fw-bold p-2">
            @if ($data_sootblower > 0)
            <a href="{{route('maintenance-sootblower.index')}}" class="new-notif text-white" data-bs-toggle="tooltip" data-bs-placement="top" title=" {{$data_sootblower}} Laporan Baru"><i class='bx bx-bell' ></i></a>
            @endif
                <small><i class='bx bxs-hot'></i> SOOTBLOWER</small>
            </div>
        </div>
        <div class="card bg-danger text-white fw-bold shadow-md my-1">
            <div class="text-center p-1">
                <small>Total Equipment Repaired</small>
                <span><i class='bx bx-cog'></i></span>
                <h2 class="fw-bold text-white">{{$tsootblower_repaired}}</h2>
                <span>
                    <a href="{{route('maintenance-sootblower.index')}}" class="border border-white text-white px-5 click-check">check</a>
                </span>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 mb-3">
        <div class="card border border-danger shadow-md">
            <div class="text-center text-danger fw-bold p-2">
            @if ($data_edg > 0)
            <a href="{{route('maintenance-edg.index')}}" class="new-notif text-white" data-bs-toggle="tooltip" data-bs-placement="top" title=" {{$data_edg}} Laporan Baru"><i class='bx bx-bell' ></i></a>
            @endif
                <small><i class='bx bxs-hot'></i> Emergency Diesel</small>
            </div>
        </div>
        <div class="card bg-danger text-white fw-bold shadow-md my-1">
            <div class="text-center p-1">
                <small>Total Equipment Repaired</small>
                <span><i class='bx bx-cog'></i></span>
                <h2 class="fw-bold text-white">{{$tedg_repaired}}</h2>
                <span>
                    <a href="{{route('maintenance-edg.index')}}" class="border border-white text-white px-5 click-check">check</a>
                </span>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 mb-3">
        <div class="card border border-success shadow-md">
            <div class="text-center text-success fw-bold p-2">
            @if ($data_coturbine > 0)
            <a href="{{route('maintenance-coturbine.index')}}" class="new-notif text-white" data-bs-toggle="tooltip" data-bs-placement="top" title=" {{$data_coturbine}} Laporan Baru"><i class='bx bx-bell' ></i></a>
            @endif
                <small><i class='bx bxs-hot'></i> CHANGE OVER TURBINE</small>
            </div>
        </div>
        <div class="card bg-success text-white fw-bold shadow-md my-1">
            <div class="text-center p-1">
                <small>Total Equipment Repaired</small>
                <span><i class='bx bx-cog'></i></span>
                <h2 class="fw-bold text-white">{{$tburner_repaired}}</h2>
                <span>
                    <a href="{{route('maintenance-coturbine.index')}}" class="border border-white text-white px-5 click-check">check</a>
                </span>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 mb-3">
        <div class="card border border-success shadow-md">
            <div class="text-center text-success fw-bold p-2">
            @if ($data_coboiler > 0)
            <a href="{{route('maintenance-coboiler.index')}}" class="new-notif text-white" data-bs-toggle="tooltip" data-bs-placement="top" title=" {{$data_coboiler}} Laporan Baru"><i class='bx bx-bell' ></i></a>
            @endif
                <small><i class='bx bxs-hot'></i> CHANGE OVER BOILER</small>
            </div>
        </div>
        <div class="card bg-success text-white fw-bold shadow-md my-1">
            <div class="text-center p-1">
                <small>Total Equipment Repaired</small>
                <span><i class='bx bx-cog'></i></span>
                <h2 class="fw-bold text-white">{{$tcoboiler_repaired}}</h2>
                <span>
                    <a href="{{route('maintenance-coboiler.index')}}" class="border border-white text-white px-5 click-check">check</a>
                </span>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 mb-3">
        <div class="card border border-success shadow-md">
            <div class="text-center text-success fw-bold p-2">
            @if ($data_cocommon > 0)
            <a href="{{route('maintenance-cocommon.index')}}" class="new-notif text-white" data-bs-toggle="tooltip" data-bs-placement="top" title=" {{$data_cocommon}} Laporan Baru"><i class='bx bx-bell' ></i></a>
            @endif
                <small><i class='bx bxs-hot'></i> CHANGE OVER COMMON</small>
            </div>
        </div>
        <div class="card bg-success text-white fw-bold shadow-md my-1">
            <div class="text-center p-1">
                <small>Total Equipment Repaired</small>
                <span><i class='bx bx-cog'></i></span>
                <h2 class="fw-bold text-white">{{$tcocommon_repaired}}</h2>
                <span>
                    <a href="{{route('maintenance-cocommon.index')}}" class="border border-white text-white px-5 click-check">check</a>
                </span>
            </div>
        </div>
    </div>

    <!-- ================= -->
    <div class="col-lg-4 col-sm-6 mb-3">
        <div class="card border border-warning shadow-md">
            <div class="text-center text-warning fw-bold p-2">
            @if ($data_hppump > 0)
            <a href="{{route('maintenance-hppump.index')}}" class="new-notif text-white" data-bs-toggle="tooltip" data-bs-placement="top" title=" {{$data_hppump}} Laporan Baru"><i class='bx bx-bell' ></i></a>
            @endif
                <small><i class='bx bxs-hot'></i> HIGH PRESSURE PUMP</small>
            </div>
        </div>
        <div class="card bg-warning text-white fw-bold shadow-md my-1">
            <div class="text-center p-1">
                <small>Total Equipment Repaired</small>
                <span><i class='bx bx-cog'></i></span>
                <h2 class="fw-bold text-white">{{$thppump_repaired}}</h2>
                <span>
                    <a href="{{route('maintenance-hppump.index')}}" class="border border-white text-white px-5 click-check">check</a>
                </span>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 mb-3">
        <div class="card border border-warning shadow-md">
            <div class="text-center text-warning fw-bold p-2">
            @if ($data_fwpump > 0)
            <a href="{{route('maintenance-fwpump.index')}}" class="new-notif text-white" data-bs-toggle="tooltip" data-bs-placement="top" title=" {{$data_fwpump}} Laporan Baru"><i class='bx bx-bell' ></i></a>
            @endif
                <small><i class='bx bxs-hot'></i> FORWARDING PUMP</small>
            </div>
        </div>
        <div class="card bg-warning text-white fw-bold shadow-md my-1">
            <div class="text-center p-1">
                <small>Total Equipment Repaired</small>
                <span><i class='bx bx-cog'></i></span>
                <h2 class="fw-bold text-white">{{$tfwpump_repaired}}</h2>
                <span>
                    <a href="{{route('maintenance-fwpump.index')}}" class="border border-white text-white px-5 click-check">check</a>
                </span>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 mb-3">
        <div class="card border border-warning shadow-md">
            <div class="text-center text-warning fw-bold p-2">
            @if ($data_hsdlevel > 0)
            <a href="{{route('maintenance-hsdlevel.index')}}" class="new-notif text-white" data-bs-toggle="tooltip" data-bs-placement="top" title=" {{$data_hsdlevel}} Laporan Baru"><i class='bx bx-bell' ></i></a>
            @endif
                <small><i class='bx bxs-hot'></i> HIGH SPEED DIESEL LEVEL</small>
            </div>
        </div>
        <div class="card bg-warning text-white fw-bold shadow-md my-1">
            <div class="text-center p-1">
                <small>Total Equipment Repaired</small>
                <span><i class='bx bx-cog'></i></span>
                <h2 class="fw-bold text-white">{{$thsdlevel_repaired}}</h2>
                <span>
                    <a href="{{route('maintenance-hsdlevel.index')}}" class="border border-white text-white px-5 click-check">check</a>
                </span>
            </div>
        </div>
    </div>
</div>