@if ($dt->kondisi_peralatan == 'Abnormal')
    <div class="text-white">
        <div class="alert alert-danger rounded text-center py-3">Abnormal</div>
    </div>
@else
    <div class="text-white">
        <div class="alert alert-success rounded text-center py-3">Normal</div>
    </div>
@endif