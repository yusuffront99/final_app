
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap demo</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
    body {
        /* background: pink; */
        margin: 0px 5px;
        width: 100%;
        height: 60vh;
        border: 2px solid black;
    }
    .container {
        width: 100%;
        margin-left: 0%;
    }

    table.header {
        margin: 0;
        width: 100%;
    }

    .header-text{
        font-size: 17px;
    }

    .text-title {
        text-align: center;
        width: 100%;
        margin-left: 3%;
        margin-top: 6%;
        font-size: 20px;
        font-weight: bold;
        text-decoration: underline;
    }

    .bold-info {
        font-weight: bold;
        margin-left: 8%;
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
        margin-left: 80%;
        width: 30%;
        /* background: orange; */
        font-size: 18px;
        font-weight: bold;
        text-align: center;
    }

    span#tgl {
        margin-right: 5%;
    }
    .ttd-sign {
        margin: 40px 0px;
    }

    span.ttd-name {
        margin-right: -15px;
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
    <div class="text-title" style="font-size: 22px">
        DATA LAPORAN BURNER SYSTEM
    </div>
    <br>
    
    <div class="content" style="font-size: 20px">
        <div class="data-operator">
            Nama Operator I : Jhon Example <br>
            Nama Operator II : Jhon Example <br>
            Operator Shift : Jhon Example <br>
            Tanggal Update : Jhon Example <br>
            Jam Update : Jhon Example
        </div>
    </div>

    <br>
    <div class="bold-info" style="text-align: center;">
        Informasi laporan
    </div>
    <br>
    @foreach ($reports as $rp)
    <table class="table tb-content" style="font-size: 20px">
        <tr>
            <td>
                <div class="text-center" style="font-weight: bold; text-decoration:underline">BURNER 1</div>
                <br>
                <ul>
                    <li>Status : {{$rp->status_burner1}} </li>
                    <li>Keterangan : {{$rp->ket_burner1}}</li>
                </ul>
            </td>
            <td>
                <div class="text-center" style="font-weight: bold; text-decoration:underline">BURNER 2</div>
                <br>
                <ul>
                    <li>Status : {{$rp->status_burner2}} </li>
                    <li>Keterangan : {{$rp->ket_burner2}}</li>
                </ul>
            </td>
        </tr>
        <tr>
            <td>
                <div class="text-center" style="font-weight: bold; text-decoration:underline">BURNER 3</div>
                <br>
                <ul>
                    <li>Status : {{$rp->status_burner3}} </li>
                    <li>Keterangan : {{$rp->ket_burner3}}</li>
                </ul>
            </td>
            <td>
                <div class="text-center" style="font-weight: bold; text-decoration:underline">BURNER 4</div>
                <br>
                <ul>
                    <li>Status : {{$rp->status_burner4}} </li>
                    <li>Keterangan : {{$rp->ket_burner4}}</li>
                </ul>
            </td>
        </tr>
    </table>
    @endforeach
    <br>
    <div class="ttd-right">
        <span id="tgl">{{Carbon\carbon::createFromFormat('Y-m-d', $date_now)->isoFormat('D MMMM Y')}}</span><br>
    </div>
    <div class="ttd-content">
        <span id="ttd-jabatan">MANBAGOP</span><br>
        <div class="ttd-sign">
            
        </div>
        <span id="ttd-name">ISKANDAR SETIYAWAN</span>
    </div>
</div>
</body>
</html>