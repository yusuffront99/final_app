@if ($dt->status_FP_A == 'Ready')
    <div class="text-success">{{$dt->status_FP_A}}</div>
@elseif ($dt->status_FP_B == 'Not Ready')
    <div class="text-danger">{{$dt->status_FP_B}}</div>
@else
    no
@endif