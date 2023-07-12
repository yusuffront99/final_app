<div class="col-lg-2">
    <div class="card border border-danger shadow-md">
        <div class="text-center text-danger fw-bold p-2">
           @if ($data_burner > 0)
           <a href="" class="new-notif text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="ada {{$data_burner}} Laporan Baru"><i class='bx bx-bell' ></i></a href="">
           @endif
            <small><i class='bx bxs-hot'></i> BURNER</small>
        </div>
    </div>
    <div class="card bg-danger text-white fw-bold shadow-md my-1">
        <div class="text-center p-2">
            <small>Total Repaired</small>
            <span><i class='bx bx-cog'></i></span>
            <h2 class="fw-bold text-white">{{$tburner_repaired}}</h2>
            <span>
                <a href="" class="border border-white text-white px-5 click-check">check</a>
            </span>
        </div>
    </div>
</div>
