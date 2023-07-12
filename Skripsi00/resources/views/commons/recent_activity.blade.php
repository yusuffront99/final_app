<table class="table">
                                            <tr>
                                                @foreach ($db as $db)
                                                <td width="10%">
                                                    @if ($db->users->profile_img == '-')
                                                        <img src="{{asset('frontends/assets/img/avatars/profile.jpg')}}" alt class="w-px-40 h-auto rounded-circle" />
                                                    @else
                                                        <img src="{{asset('storage/' . $db->users->profile_img)}}" alt class="w-px-40 h-auto rounded-circle" />
                                                    @endif
                                                </td>
                                                <td>
                                                    <small class="text-white badge bg-primary fw-bold">{{$db->users->nama_panggilan}}</small>
                                                    <small class="text-white badge bg-warning fw-bold">{{$db->operator_shift}}</small>
                                                    <br>
                                                    <small class="text-white">telah membuat laporan <strong class="text-danger">Burner</strong> {{$db->created_at->diffForHumans()}}</small>
                                                </td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                @foreach ($dfp as $dfp)
                                                <td width="10%">
                                                    @if ($dfp->users->profile_img == '-')
                                                        <img src="{{asset('frontends/assets/img/avatars/profile.png')}}" alt class="w-px-40 h-auto rounded-circle" />
                                                    @else
                                                        <img src="{{asset('storage/' . $dfp->users->profile_img)}}" alt class="w-px-40 h-auto rounded-circle" />
                                                    @endif
                                                </td>
                                                <td>
                                                <small class="text-white badge bg-primary fw-bold">{{$dfp->users->nama_panggilan}}</small>
                                                    <small class="text-white badge bg-warning fw-bold">{{$db->operator_shift}}</small>
                                                    <br>
                                                    <small class="text-white">telah membuat laporan <strong class="text-danger">Forwarding Pump</strong> {{$dfp->created_at->diffForHumans()}}</small>
                                                </td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                @foreach ($dhp as $dhp)
                                                <td width="10%">
                                                    @if ($dhp->users->profile_img == '-')
                                                        <img src="{{asset('frontends/assets/img/avatars/profile.png')}}" alt class="w-px-40 h-auto rounded-circle" />
                                                    @else
                                                        <img src="{{asset('storage/' . $dhp->users->profile_img)}}" alt class="w-px-40 h-auto rounded-circle" />
                                                    @endif
                                                </td>
                                                <td>
                                                <small class="text-white badge bg-primary fw-bold">{{$dhp->users->nama_panggilan}}</small>
                                                    <small class="text-white badge bg-warning fw-bold">{{$dhp->operator_shift}}</small>
                                                    <br>
                                                    <small class="text-white">telah membuat laporan <strong class="text-danger">High Pressure Pump</strong> {{$dhp->created_at->diffForHumans()}}</small>
                                                </td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                @foreach ($dhsd as $dhsd)
                                                <td width="10%">
                                                    @if ($dhsd->users->profile_img == '-')
                                                        <img src="{{asset('frontends/assets/img/avatars/profile.png')}}" alt class="w-px-40 h-auto rounded-circle" />
                                                    @else
                                                        <img src="{{asset('storage/' . $dhsd->users->profile_img)}}" alt class="w-px-40 h-auto rounded-circle" />
                                                    @endif
                                                </td>
                                                <td>
                                                <small class="text-white badge bg-primary fw-bold">{{$dhsd->users->nama_panggilan}}</small>
                                                    <small class="text-white badge bg-warning fw-bold">{{$dhsd->operator_shift}}</small>
                                                    <br>
                                                    <small class="text-white">telah membuat laporan <strong class="text-danger">High Speed Diesel Level</strong> {{$dhsd->created_at->diffForHumans()}}</small>
                                                </td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                @foreach ($dsbl as $dsbl)
                                                <td width="10%">
                                                    @if ($dsbl->users->profile_img == '-')
                                                        <img src="{{asset('frontends/assets/img/avatars/profile.png')}}" alt class="w-px-40 h-auto rounded-circle" />
                                                    @else
                                                        <img src="{{asset('storage/' . $dsbl->users->profile_img)}}" alt class="w-px-40 h-auto rounded-circle" />
                                                    @endif
                                                </td>
                                                <td>
                                                <small class="text-white badge bg-primary fw-bold">{{$dsbl->users->nama_panggilan}}</small>
                                                    <small class="text-white badge bg-warning fw-bold">{{$dsbl->operator_shift}}</small>
                                                    <br>
                                                    <small class="text-white">telah membuat laporan <strong class="text-danger">Sootblower</strong> {{$dsbl->created_at->diffForHumans()}}</small>
                                                </td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                @foreach ($de as $de)
                                                <td width="10%">
                                                    @if ($de->users->profile_img == '-')
                                                        <img src="{{asset('frontends/assets/img/avatars/profile.jpg')}}" alt class="w-px-40 h-auto rounded-circle" />
                                                    @else
                                                        <img src="{{asset('storage/' . $de->users->profile_img)}}" alt class="w-px-40 h-auto rounded-circle" />
                                                    @endif
                                                </td>
                                                <td>
                                                    <small class="text-white badge bg-primary fw-bold">{{$de->users->nama_panggilan}}</small>
                                                    <small class="text-white badge bg-warning fw-bold">{{$de->operator_shift}}</small>
                                                    <br>
                                                    <small class="text-white">telah membuat laporan <strong class="text-danger">EDG</strong> {{$de->created_at->diffForHumans()}}</small>
                                                </td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                @foreach ($dcot as $dcot)
                                                <td width="10%">
                                                    @if ($dcot->users->profile_img == '-')
                                                        <img src="{{asset('frontends/assets/img/avatars/profile.jpg')}}" alt class="w-px-40 h-auto rounded-circle" />
                                                    @else
                                                        <img src="{{asset('storage/' . $dcot->users->profile_img)}}" alt class="w-px-40 h-auto rounded-circle" />
                                                    @endif
                                                </td>
                                                <td>
                                                    <small class="text-white badge bg-primary fw-bold">{{$dcot->users->nama_panggilan}}</small>
                                                    <small class="text-white badge bg-warning fw-bold">{{$dcot->operator_shift}}</small>
                                                    <br>
                                                    <small class="text-white">telah membuat laporan <strong class="text-danger">Change Over Peralatan Turbine</strong> {{$dcot->created_at->diffForHumans()}}</small>
                                                </td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                @foreach ($dcob as $dcob)
                                                <td width="10%">
                                                    @if ($dcob->users->profile_img == '-')
                                                        <img src="{{asset('frontends/assets/img/avatars/profile.jpg')}}" alt class="w-px-40 h-auto rounded-circle" />
                                                    @else
                                                        <img src="{{asset('storage/' . $dcob->users->profile_img)}}" alt class="w-px-40 h-auto rounded-circle" />
                                                    @endif
                                                </td>
                                                <td>
                                                    <small class="text-white badge bg-primary fw-bold">{{$dcob->users->nama_panggilan}}</small>
                                                    <small class="text-white badge bg-warning fw-bold">{{$dcob->operator_shift}}</small>
                                                    <br>
                                                    <small class="text-white">telah membuat laporan <strong class="text-danger">Change Over Peralatan Boiler</strong> {{$dcob->created_at->diffForHumans()}}</small>
                                                </td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                @foreach ($dcoc as $dcoc)
                                                <td width="10%">
                                                    @if ($dcoc->users->profile_img == '-')
                                                        <img src="{{asset('frontends/assets/img/avatars/profile.jpg')}}" alt class="w-px-40 h-auto rounded-circle" />
                                                    @else
                                                        <img src="{{asset('storage/' . $dcoc->users->profile_img)}}" alt class="w-px-40 h-auto rounded-circle" />
                                                    @endif
                                                </td>
                                                <td>
                                                    <small class="text-white badge bg-primary fw-bold">{{$dcoc->users->nama_panggilan}}</small>
                                                    <small class="text-white badge bg-warning fw-bold">{{$dcoc->operator_shift}}</small>
                                                    <br>
                                                    <small class="text-white">telah membuat laporan <strong class="text-danger">Change Over Peralatan Common</strong> {{$dcoc->created_at->diffForHumans()}}</small>
                                                </td>
                                                @endforeach
                                            </tr>
                                        </table>