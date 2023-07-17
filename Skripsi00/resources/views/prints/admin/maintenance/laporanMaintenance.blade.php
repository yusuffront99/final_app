
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PowerPlant | CoTurbine</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
    body {
        /* background: pink; */
        margin: 0px 5px;
        width: 100%;
        height: 60vh;
        border-style: double;
    }
    .container {
        width: 150%;
        margin-left: 0%;
    }

    table.header {
        margin: 0;
        width: 100%;
    }

    .header-text{
        font-size: 18px;
    }

    .text-title {
        text-align: center;
        width: 150%;
        margin-left: 10%;
        font-size: 20px;
        font-weight: bold;
        text-decoration: underline;
    }

    table.th-content {
        font-size: 16px;
        width: 165%;
        padding: 0; 
        border: 1px solid black !important;
    }

    table.th-content thead tr th, table.th-content tr td {
        border: 1px solid black;
    }

    th#common{
        width: 100% !important;
    }

    th#common-sm{
        width: 150% !important;
    }

    th#common-md{
        width: 180% !important;
    }

    th#common-lg{
        width: 210% !important;
    }

    th#common-xl{
        width: 300% !important;
    }

    span#shift {
        font-weight: bold;
    }

    .ttd-right {
        text-align: right;
        width: 160%;
        /* background: yellow; */
        font-size: 18px;
        font-weight: bold;
    }

    .ttd-content {
        margin-top: 30px;
        margin-left: 130%;
        width: 30%;
        /* background: orange; */
        font-size: 18px;
        font-weight: bold;
        text-align: center;
    }

    span#tgl {
        text-align: center;
    }
    .ttd-sign {
        margin: 50px 0px;
    }

    span.ttd-name {
        margin-right: -15px;
    }

    .tb {
        font-weight: bold;
    }

    .ttd-table {
        margin: auto;
        width: 165%;
        font-size: 20px;
        font-weight: bold;
        margin-top: 15px;
    }

    .tu {
        text-decoration: underline;
    }
</style>

<body>
<div class="container">
    <table>
        <tr>
            <td class="header-logo">
                <img src="<?php echo $img ?>" width="60px" height="70px" alt="">
            </td>
            <td class="header-text">
                PT PLN (PERSERO) UNIT INDUK PEMBANGKITAN DAN PENYALURAN KALIMANTAN 
                <br>
                UNIT PELAKSANA PEMBANGKITAN ASAM ASAM
                <br>
                PLTU UNIT 3 & 4
            </td>
        </tr>
    </table>
    <br>
    <div class="text-title">
        DATA LAPORAN RIWAYAT PERBAIKAN PERALATAN UNIT</span>
    </div>
    <br>
    <table class="table table-bordered th-content">
        <thead>
                <tr>
                    <th>No</th>
                    <th class="text-center common">Repair Code</th>
                    <th class="text-center common-info">Kategori</th>
                    <th class="text-center common-info">Unit</th>
                    <th class="text-center common-sm">Data Operator</th>
                    <th class="text-center common-md">Tanggal</th>
                    <th class="text-center common-md">Maintenance Detail</th>
                    <th class="text-center common-sm">Biaya</th>                                                                                   
                </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($reports as $rp)
                <tr>
                <td>{{$no++}}</td>
                <td><div class="alert alert-danger fw-bold">{{$rp->repair_code}}</div></td>
                <td>{{$rp->category}}</td>
                <td>{{$rp->unit}}</td>
                <td>
                    NIP : {{$rp->users->nip}} <br>
                    Operator : {{$rp->users->nama_lengkap}} <br>
                    Jabatan: {{$rp->users->jabatan}} <br>
                    Bagian : {{$rp->users->divisi}} <br>
                    Shift : {{$rp->users->tim_divisi}} <br>
                    Atasan : {{$rp->users->atasan}} <br>
                </td>
                <td>
                    Tgl Kerusakan : <br> <span class="text-danger">{{$rp->damage_date}}</span>
                    <hr>
                    Tgl Perbaikan : <br> <span class="text-success">{{$rp->repair_date}}</span>
                </td>
                <td>
                    <ul>
                        <li>Penangangan & Perbaikan : <br> <div class="text-success">{!!$rp->description!!}</div></li>
                        <hr>
                        <li>
                            Rincian Perbaikan : <br>
                            @if ($rp->item_total_1 > 0 && $rp->item_total_2 > 0 && $rp->item_total_3 > 0)
                                <div class="text-danger">1. Penggantian Spare Part /Item</div>
                                    <ul>
                                        <li>Nama Item  : {{$rp->item_sp_1}}</li>
                                        <li>Total Item : {{$rp->item_total_1}} (Jumlah)</li>
                                        <li>Harga Per item : <?php echo number_format($rp->item_price_1, 0, ',', '.')?> (Rupiah)</li>
                                    </ul>
                                <div class="text-danger">2. Penggantian Spare Part /Item</div>
                                    <ul>
                                        <li>Nama Item  : {{$rp->item_sp_2}}</li>
                                        <li>Total Item : {{$rp->item_total_2}} (Jumlah)</li>
                                        <li>Harga Per item : <?php echo number_format($rp->item_price_2, 0, ',', '.')?> (Rupiah)</li>
                                    </ul>
                                <div class="text-danger">3. Penggantian Spare Part /Item</div>
                                    <ul>
                                        <li>Nama Item  : {{$rp->item_sp_3}}</li>
                                        <li>Total Item : {{$rp->item_total_3}} (Jumlah)</li>
                                        <li>Harga Per item : <?php echo number_format($rp->item_price_3, 0, ',', '.')?>(Rupiah)</li>
                                    </ul>

                                @elseif ($rp->item_total_1 > 0 && $rp->item_total_2 > 0 && $rp->item_total_3 == 0)
                                <div class="text-danger">1. Penggantian Spare Part /Item</div>
                                    <ul>
                                        <li>Nama Item  : {{$rp->item_sp_1}}</li>
                                        <li>Total Item : {{$rp->item_total_1}} (Jumlah)</li>
                                        <li>Harga Per item : <?php echo number_format($rp->item_price_1, 0, ',', '.')?> (Rupiah)</li>
                                    </ul>
                                <div class="text-danger">2. Penggantian Spare Part /Item</div>
                                    <ul>
                                        <li>Nama Item  : {{$rp->item_sp_2}}</li>
                                        <li>Total Item : {{$rp->item_total_2}} (Jumlah)</li>
                                        <li>Harga Per item : <?php echo number_format($rp->item_price_2, 0, ',', '.')?> (Rupiah)</li>
                                    </ul>

                                @elseif ($rp->item_total_1 > 0 && $rp->item_total_2 == 0 && $rp->item_total_3 == 0)
                                <div class="text-danger">1. Penggantian Spare Part /Item</div>
                                    <ul>
                                        <li>Nama Item  : {{$rp->item_sp_1}}</li>
                                        <li>Total Item : {{$rp->item_total_1}} (Jumlah)</li>
                                        <li>Harga Per item : <?php echo number_format($rp->item_price_3, 0, ',', '.')?> (Rupiah)</li>
                                    </ul>
                            @else
                                -
                            @endif
                        </li>
                    </ul>
                </td>
                <td><div class="text-success fs-3"><?php echo number_format($rp->total_price, 0, ',', '.')?></div></td>
                </tr>
            @endforeach
        </tbody>
        <tbody>
            <tr>
                <td colspan="3"><h6 style="font-family:'Courier New', Courier, monospace">Total Biaya Perbaikan : </h6></td>
                <td colspan="5"><h6 class="text-success">Rp. <?php echo number_format($reports->sum('total_price'), 0, '.','.')?></h6></td>
            </tr>
        </tbody>
    </table>
    <br>
    <div class="ttd-right">
        
    </div>
    <table class="ttd-table">
        <tr>
            <td>
                <div class="text-center">
                    <br><br><br>
                    <span>MANBAGOP</span>
                    <div class="ttd-sign"></div>
                    <span class="tu">ISKANDAR SETIYAWAN</span><br>
                    <span>NIP : 8714009ZY</span>
                </div>
            </td>
            <td>
                <div class="text-center">
                    <br><br><br>
                    <span>MANBAGHAR</span>
                    <div class="ttd-sign"></div>
                    <span class="tu">FELANDI ARLIANTORO</span><br>
                    <span>NIP : 89112259Z</span>
                </div>
            </td>
            <td>
                <div class="text-center">
                    <span id="tgl">Asam asam, {{Carbon\carbon::createFromFormat('Y-m-d', $date_now)->isoFormat('D MMMM Y')}}</span><br><br>
                    <span>Mengetahui</span><br>
                    <span>MANAGER UPK ASAM ASAM</span>
                    <div class="ttd-sign"></div>
                    <span class="tu">DANI ESA WINDIARTO</span><br>
                    <span>NIP : 8007070D</span>
                </div>
            </td>
        </tr>
    </table>
</div>
</body>
</html>