@if ($dt->storage_level >= 3.5 && $dt->daily_level >= 2)
    <div class="text-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="HSD Level Normal">
        <i class='bx bx-check-circle fs-3'></i>
    </div>
@elseif ($dt->storage_level >= 3.5 && $dt->daily_level <= 2)
    <div class="text-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="HSD Level Caution">
        <i class='bx bx-alarm-exclamation fs-3'></i>
    </div>
@elseif ($dt->storage_level <= 3.5 && $dt->daily_level >= 2)
    <div class="text-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="HSD Level Caution">
        <i class='bx bx-alarm-exclamation fs-3'></i>
    </div>
@else
    <div class="text-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="HSD Level Low">
        <i class='bx bx-x-circle fs-3'></i>
    </div>
@endif