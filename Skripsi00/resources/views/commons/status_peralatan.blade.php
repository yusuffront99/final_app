@if ($dt->status_peralatan == 'Ready')
<div class="text-success">{{$dt->status_peralatan}}</div>
@else
<div class="text-danger">{{$dt->status_peralatan}}</div>
@endif