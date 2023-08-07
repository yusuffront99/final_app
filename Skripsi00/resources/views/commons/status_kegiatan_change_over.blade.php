@if ($dt->status_kegiatan == 'Terlaksana' && $dt->status_peralatan == 'Normal')
<div class="badge bg-success">{{$dt->status_kegiatan}}</div> / <div class="badge bg-success">{{$dt->status_peralatan}}</div>
@else
<div class="badge bg-danger">{{$dt->status_kegiatan}}</div> / <div class="badge bg-danger">{{$dt->status_peralatan}}</div>
@endif