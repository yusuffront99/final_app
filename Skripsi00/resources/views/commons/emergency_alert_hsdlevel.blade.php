@if ($dt->storage_level >= 3.5 && $dt->daily_level <= 2)
    <div class="text-white" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="HSD Level Caution">
        <div class="bagde bg-warning rounded text-center py-3"><i class='bx bxl-whatsapp success' ></i> Lakukan Pengisian Solar Oleh Operator Unit</div>
    </div>
@elseif ($dt->storage_level <= 3.5 && $dt->daily_level >= 2)
    <div class="text-white" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="HSD Level Caution">
        <div class="bagde bg-danger rounded text-center py-3"><i class='bx bxl-whatsapp success' ></i> Hubungi Segera Bagian Bahan Bakar</div>
    </div>
@elseif ($dt->storage_level <= 3.5 && $dt->daily_level <= 2)
    <div class="text-white" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="HSD Level Caution">
        <div class="bagde bg-danger rounded text-center py-3"><i class='bx bxl-whatsapp success' ></i> Segera Lakukan Pengisian BBM Storage Tank dan Daily Tank</div>
    </div>
@endif