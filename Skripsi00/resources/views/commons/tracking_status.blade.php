@if ($dt->status_equipments->status_name == 'Forward')
                                                                <i class='bx bx-user text-primary'></i>
                                                                <br>
                                                                <i class='bx bx-down-arrow-alt'></i>
                                                                <br>
                                                                <i class='bx bx-mail-send text-primary'></i>
                                                            @elseif ($dt->status_equipments->status_name == 'Waiting')
                                                                <i class='bx bx-user'></i>
                                                                <br>
                                                                <i class='bx bx-down-arrow-alt'></i>
                                                                <br>
                                                                <i class='bx bx-user text-primary'></i>
                                                            @elseif ($dt->status_equipments->status_name == 'Waiting Material')
                                                                <i class='bx bx-user'></i>
                                                                <br>
                                                                <i class='bx bx-down-arrow-alt'></i>
                                                                <br>
                                                                <i class='bx bx-user text-primary'></i>
                                                            @elseif ($dt->status_equipments->status_name == 'Rejected')
                                                                <i class='bx bx-user'></i>
                                                                <br>
                                                                <i class='bx bx-up-arrow-alt'></i>
                                                                <br>
                                                                <i class='bx bx-x-circle text-danger'></i>
                                                            @elseif ($dt->status_equipments->status_name == 'Working')
                                                            <i class='bx bx-mail-send text-primary'></i>
                                                                <br>
                                                                <i class='bx bx-down-arrow-alt'></i>
                                                                <br>
                                                                <i class='bx bxs-hourglass text-warning'></i>
                                                            @elseif ($dt->status_equipments->status_name == 'Resolved')
                                                            <i class='bx bx-wink-smile fs-2 icon-resolved fs-3 text-success'></i>
                                                            @else
                                                            <i class='bx bx-check-shield fs-3 text-success'></i></h1>
                                                            @endif

                                                            {{-- <i class='bx bx-search'></i> --}}
                                                            {{-- <i class='bx bx-user'></i>
                                                            <br>
                                                            <i class='bx bx-mail-send' ></i>
                                                            <br>
                                                            1 --}}