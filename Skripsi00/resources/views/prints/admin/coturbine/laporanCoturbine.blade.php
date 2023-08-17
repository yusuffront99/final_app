
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

    th#col-nip{
        width: 10% !important;
    }

    th#col-th{
        width: 16% !important;
    }
    th#col-short {
        width: 12% !important;
    }

    th#col-unit{
        width: 6% !important;
    }

    th#info {
        width: 35% !important;
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
        DATA LAPORAN CHANGE OVER PERALATAN TURBINE</span>
    </div>
    <br>
    <table class="table table-bordered th-content">
        <thead>
            <tr>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th class="op-1">Operator</th>
                    <th class="op-1">Supervisor</th>
                    <th class="tgl-col">Shift</th>
                    <th class="tgl-col">Tanggal CO</th>
                    <th class="tgl-col">Jam CO</th>
                    <th class="tgl-col">Unit</th>
                    <th class="common-information text-center">Motor Operasi</th>                                
                    <th class="common-information text-center">Informasi</th>                                                                                         
                </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($reports as $rp)
            <tr>
                <td>{{$no++;}}</td>
                <td>{{$rp->users->nip}}</td>
                <td>{{$rp->users->nama_lengkap}}</td>
                <td>{{$rp->users->atasan}}</td>
                <td>{{$rp->operator_shift}}</td>
                <td>{{Carbon\carbon::createFromFormat('Y-m-d', $rp->tanggal_update)->format('d-m-Y')}}</td>
                <td>{{$rp->jam_update}}</td>
                <td>{{$rp->unit}}</td>
                <td>
                    <ul>
                    <div class="badge bg-success rounded-pill text-white">{{$rp->nama_peralatan}}</div>
                        <li>Operasi Awal : <div class="text-danger fw-bold">Motor {{$rp->operasi_awal}}</div></li>
                        <li>Rencana Operasi : <div class="text-warning fw-bold">Motor {{$rp->rencana_operasi}}</li>
                        <li>Operasi Akhir : <div class="text-success fw-bold">Motor {{$rp->operasi_akhir}}</li>
                    </ul>
                </td>
                <td>
                    <ul>
                        <li>Pelaksanaan : 
                        @if ($rp->status_kegiatan == 'Terlaksana')
                            <div class="text-white badge bg-success">{{$rp->status_kegiatan}}</div>
                        @else
                            <div class="text-white badge bg-danger">{{$rp->status_kegiatan}}</div>
                        @endif
                        </li>
                        <li>Evaluasi : 
                        @if ($rp->status_peralatan == 'Normal')
                            <div class="text-white badge bg-success">{{$rp->status_peralatan}}</div>
                        @else
                            <div class="text-white badge bg-danger">{{$rp->status_peralatan}}</div>
                        @endif
                        <li>Keterangan : <div class="text-danger">{{$rp->keterangan}}</div></li>
                    </ul>
                </td>
            </tr>
        @endforeach
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