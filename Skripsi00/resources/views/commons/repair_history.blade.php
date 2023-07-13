@if ($ht->item_total_1 > 0 && $ht->item_total_2 > 0 && $ht->item_total_3 > 0)
<div class="fw-bold badge bg-danger">1. Penggantian Spare Part /Item</div>
    <ul>
        <li>Nama Item  : {{$ht->item_sp_1}}</li>
        <li>Total Item : {{$ht->item_total_1}} (Jumlah)</li>
        <li>Harga Per item : {{$ht->item_price_1}} (Rupiah)</li>
    </ul>
<div class="fw-bold badge bg-danger">2. Penggantian Spare Part /Item</div>
    <ul>
        <li>Nama Item  : {{$ht->item_sp_2}}</li>
        <li>Total Item : {{$ht->item_total_2}} (Jumlah)</li>
        <li>Harga Per item : {{$ht->item_price_2}} (Rupiah)</li>
    </ul>
<div class="fw-bold badge bg-danger">3. Penggantian Spare Part /Item</div>
    <ul>
        <li>Nama Item  : {{$ht->item_sp_3}}</li>
        <li>Total Item : {{$ht->item_total_3}} (Jumlah)</li>
        <li>Harga Per item : {{$ht->item_price_3}} (Rupiah)</li>
    </ul>

@elseif ($ht->item_total_1 > 0 && $ht->item_total_2 > 0 && $ht->item_total_3 == 0)
<div class="fw-bold badge bg-danger">1. Penggantian Spare Part /Item</div>
    <ul>
        <li>Nama Item  : {{$ht->item_sp_1}}</li>
        <li>Total Item : {{$ht->item_total_1}} (Jumlah)</li>
        <li>Harga Per item : {{$ht->item_price_1}} (Rupiah)</li>
    </ul>
<div class="fw-bold badge bg-danger">2. Penggantian Spare Part /Item</div>
    <ul>
        <li>Nama Item  : {{$ht->item_sp_2}}</li>
        <li>Total Item : {{$ht->item_total_2}} (Jumlah)</li>
        <li>Harga Per item : {{$ht->item_price_2}} (Rupiah)</li>
    </ul>

@elseif ($ht->item_total_1 > 0 && $ht->item_total_2 == 0 && $ht->item_total_3 == 0)
<div class="fw-bold badge bg-danger">1. Penggantian Spare Part /Item</div>
    <ul>
        <li>Nama Item  : {{$ht->item_sp_1}}</li>
        <li>Total Item : {{$ht->item_total_1}} (Jumlah)</li>
        <li>Harga Per item : {{$ht->item_price_1}} (Rupiah)</li>
    </ul>
@else
-
@endif