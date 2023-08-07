@if ($dt->status_kegiatan == 'Tidak Terlaksana')
<div class="text-danger">{{$dt->status_kegiatan}}</div>
@else
<div class="text-success">{{$dt->status_kegiatan}}</div>
@endif