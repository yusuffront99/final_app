@if ($dt->status_sbl31 == NULL)
    <small class="badge bg-success">G-31</small>
@elseif ($dt->status_sbl31 == 'G-31')
    <div class="badge bg-danger">{{$dt->status_sbl31}}</div>
@endif
@if ($dt->status_sbl32 == NULL)
    <small class="badge bg-success">G-32</small>
@elseif ($dt->status_sbl32 == 'G-32')
    <div class="badge bg-danger">{{$dt->status_sbl32}}</div>
@endif
@if ($dt->status_sbl33 == NULL)
    <small class="badge bg-success">G-33</small>
@elseif ($dt->status_sbl33 == 'G-33')
    <div class="badge bg-danger">{{$dt->status_sbl33}}</div>
@endif
@if ($dt->status_sbl34 == NULL)
    <small class="badge bg-success">G-34</small>
@elseif ($dt->status_sbl34 == 'G-34')
    <div class="badge bg-danger">{{$dt->status_sbl34}}</div>
@endif
@if ($dt->status_sbl35 == NULL)
    <small class="badge bg-success">G-35</small>
@elseif ($dt->status_sbl35 == 'G-35')
    <div class="badge bg-danger">{{$dt->status_sbl35}}</div>
@endif
@if ($dt->status_sbl36 == NULL)
    <small class="badge bg-success">YB-36</small>
@elseif ($dt->status_sbl36 == 'YB-36')
    <div class="badge bg-danger">{{$dt->status_sbl36}}</div>
@endif