@if ($dt->status_equipments->status_name == 'Waiting Material')
    <h1 class="text-warning text-center" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Status Waiting Material"><i class='bx bxs-hourglass fs-3'></i></h1>

@elseif ($dt->status_equipments->status_name == 'Forwarding')
    <h1 class="text-primary text-center" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Status Fowarding"><i class='bx bxs-chevrons-right'></i></h1>

@elseif ($dt->status_equipments->status_name == 'Working')
    <h1 class="text-warning text-center" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Status Working"><i class='bx bx-run fs-3'></i></h1>

@elseif ($dt->status_equipments->status_name == 'Waiting')
    <h1 class="text-warning text-center" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Status Waiting Check"><i class='bx bx-loader-circle fs-3'></i></h1>

@elseif ($dt->status_equipments->status_name == 'Rejected')
    <h1 class="text-danger text-center" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Status Rejected"><i class='bx bx-x-circle fs-3'></i></h1>
@else
    <h1 class="text-success text-center" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Status Done"><i class='bx bx-check-double fs-3'></i></h1>
@endif