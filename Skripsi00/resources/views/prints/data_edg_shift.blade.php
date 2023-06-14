
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PowerPlant | EDG SHIFT</title>
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
        text-transform: uppercase;
    }

    table.th-content {
        font-size: 16px;
        width: 165%;
        padding: 0; 
    }

    table.th-content thead tr th, table.th-content tr td {
        border: 1px solid black;
    }

    th#col-nip{
        width: 10% !important;
    }

    th#col-th{
        width: 16% !important;
    }
    th#col-th-atasan{
        width: 14% !important;
    }
    th#col-short {
        width: 12% !important;
    }

    th#col-unit{
        width: 6% !important;
    }

    th#info {
        width: 30% !important;
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
        margin-right: 1%;
    }
    .ttd-sign {
        margin: 50px 0px;
    }

    span.ttd-name {
        margin-right: -15px;
    }

    span.bold {
        font-weight: bold;
    }

    span.bold-catatan {
        font-weight: bold;
        color: rgb(255, 96, 96);
    }

    .ttd-table {
        margin: auto;
        width: 165%;
        font-size: 20px;
        font-weight: bold;
        margin-top: 15px;
    }

    .text-center.mid {
        margin-left: 30%;
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
                PT PLN (PERSERO) INDUK UNIT PEMBANGKITAN DAN PENYALURAN KALIMANTAN 
                <br>
                UNIT PELAKSANA PEMBANGKITAN ASAM ASAM
                <br>
                PLTU UNIT 3 & 4
            </td>
        </tr>
    </table>
    <br>
    <div class="text-title">
        LAPORAN EMERGENCY DIESEL GENERATOR SYSTEM - {{Auth::user()->tim_divisi}}
    </div>
    <br>
    <table class="table table-bordered th-content">
        <thead>
            <tr>
                <th>No</th>
                <th id="col-nip">NIP</th>
                <th id="col-th">Operator Shift</th>
                <th id="col-th-atasan">Atasan</th>
                <th id="col-short">Tanggal Update</th>
                <th id="info" class="text-center">Informasi I</th>
                <th id="info" class="text-center">Informasi II</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($reports as $rp)
            <tr>
                <td>{{$no++;}}</td>
                <td>{{$rp->nip}}</td>
                <td><span id="shift">{{$rp->operator_shift}}</span> <br> {{$rp->users->nama_lengkap}} / {{$rp->operator_kedua}}</td>
                <td>{{$rp->atasan}}</td>
                <td>{{Carbon\carbon::createFromFormat('Y-m-d', $rp->tanggal_update)->isoFormat('D MMMM Y')}}</td>
                <td>
                    <ul>
                        <li>Level BBM Awal / Level BBM Akhir</li>
                        <span class="bold">{{$rp->lev_bbm_awal}} MM / {{$rp->lev_bbm_akhir}} MM</span>
                        <li>Jam Start Awal / Jam Stop</li>
                        <span class="bold">{{$rp->jam_start}} / {{$rp->jam_stop}} </span>
                        <li>Tegangan Battery / Tegangan Output </li>
                        <span class="bold">{{$rp->teg_battery}} V / {{$rp->teg_out}} V</span>
                        <li>Level Oli / Pressure Oli</li>
                        <span class="bold">{{$rp->lev_oli}} / {{$rp->press_oli}} </span>
                    </ul>
                </td>
                <td>
                    <ul>
                        <li>Frekuensi / Putaran / Temperature Coolant</li>
                        <span class="bold">{{$rp->lev_bbm_awal}} MM / {{$rp->lev_bbm_akhir}} MM</span>
                        <br>
                        <br>
                        <li>Catatan</li>
                        <span class="bold-catatan">{{$rp->catatan}}</span>
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <table class="ttd-table">
        <tr>
            <td>
                <div class="text-center">
                    <br><br><br>
                    <span>Operator {{$rp->operator_shift}}</span>
                    <div class="ttd-sign"></div>
                    <span class="tu">{{Auth::user()->nama_lengkap}}</span><br>
                </div>
            </td>
            <td>
                <div class="text-center mid">
                    <br><br><br>
                    <span>Supervisor {{$rp->operator_shift}}</span>
                    <div class="ttd-sign"></div>
                    <span class="tu">{{$rp->users->atasan}}</span><br>
                </div>
            </td>
            <td>
                <div class="text-center">
                    <span id="tgl">Asam asam, {{Carbon\carbon::createFromFormat('Y-m-d', $date_now)->isoFormat('D MMMM Y')}}</span><br><br>
                    <span>Mengetahui</span><br>
                    <span>MANBAGOP</span>
                    <div class="ttd-sign"></div>
                    <span class="tu">ISKANDAR SETIYAWAN</span><br>
                </div>
            </td>
        </tr>
    </table>
</div>
</body>
</html>