<?php

namespace App\Http\Controllers\Print\Admin;

use App\Models\BurnerSystem;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\CoBoiler;
use App\Models\CoCommon;
use App\Models\CoTurbine;
use App\Models\EdgSystem;
use App\Models\LfoSystem;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class LaporanDataController extends Controller
{
    // == PRINT
    public function laporan_burner()
    {
        // $shift_reports = BurnerSystem::with('users')->get();
        $first_date = Carbon::parse(request()->first_date)->toDateTimeString();
        $last_date = Carbon::parse(request()->last_date)->toDateTimeString();
        $reports = BurnerSystem::with(['users','status_equipments'])->whereBetween('tanggal_update',[$first_date, $last_date])->orderBy('tanggal_update','desc')->get();

        $date_now = Carbon::now()->format('Y-m-d');

        $path = base_path('public/frontends/assets/img/logo/pln.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $img = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $pdf = PDF::setOptions(
            ['isHtml5ParserEnabled' => true, 
            'isRemoteEnabled' => true,
            ])
            ->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif'])
            ->setPaper('a4', 'landscape')
            ->loadView('prints.admin.Burner.LaporanBurner', [
                'img' => $img,
                'date_now' => $date_now,
                'reports' => $reports,
                'date' => date('d-m-Y'),
            ]);

        // return $pdf->stream();
        return $pdf->stream();
    }

    public function laporan_lfo()
    {
        $first_date = Carbon::parse(request()->first_date)->toDateTimeString();
        $last_date = Carbon::parse(request()->last_date)->toDateTimeString();
        $reports = LfoSystem::with(['users','status_equipments'])->whereBetween('tanggal_update',[$first_date, $last_date])->orderBy('tanggal_update','desc')->get();

        $date_now = Carbon::now()->format('Y-m-d');

        $path = base_path('public/frontends/assets/img/logo/pln.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $img = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $pdf = PDF::setOptions(
            ['isHtml5ParserEnabled' => true, 
            'isRemoteEnabled' => true,
            ])
            ->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif'])
            ->setPaper('a4', 'landscape')
            ->loadView('prints.admin.Lfo.LaporanLfo', [
                'img' => $img,
                'date_now' => $date_now,
                'reports' => $reports,
                'date' => date('d-m-Y'),
            ]);

        // return $pdf->stream();
        return $pdf->stream();
    }

    public function laporan_edg()
    {
        $first_date = Carbon::parse(request()->first_date)->toDateTimeString();
        $last_date = Carbon::parse(request()->last_date)->toDateTimeString();
        $reports = EdgSystem::with(['users','status_equipments'])->whereBetween('tanggal_update',[$first_date, $last_date])->orderBy('tanggal_update','desc')->get();
        
        // $reports = EdgSystem::with(['users','status_equipments'])->whereBetween('tanggal_update', [$first_date, $last_date])->get();
        $date_now = Carbon::now()->format('Y-m-d');

        $path = base_path('public/frontends/assets/img/logo/pln.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $img = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $pdf = PDF::setOptions(
            ['isHtml5ParserEnabled' => true, 
            'isRemoteEnabled' => true,
            ])
            ->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif'])
            ->setPaper('a4', 'landscape')
            ->loadView('prints.admin.Edg.LaporanEdg', [
                'img' => $img,
                'date_now' => $date_now,
                'reports' => $reports,
                'date' => date('d-m-Y'),
            ]);

        // return $pdf->stream();
        return $pdf->stream();
        // }
    }
    public function laporan_coturbine()
    {
        $first_date = Carbon::parse(request()->first_date)->toDateTimeString();
        $last_date = Carbon::parse(request()->last_date)->toDateTimeString();
        $reports = CoTurbine::with(['users','status_equipments'])->whereBetween('tanggal_update',[$first_date, $last_date])->orderBy('tanggal_update','desc')->get();
        
        // $reports = EdgSystem::with(['users','status_equipments'])->whereBetween('tanggal_update', [$first_date, $last_date])->get();
        $date_now = Carbon::now()->format('Y-m-d');

        $path = base_path('public/frontends/assets/img/logo/pln.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $img = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $pdf = PDF::setOptions(
            ['isHtml5ParserEnabled' => true, 
            'isRemoteEnabled' => true,
            ])
            ->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif'])
            ->setPaper('a4', 'landscape')
            ->loadView('prints.admin.coturbine.LaporanCoturbine', [
                'img' => $img,
                'date_now' => $date_now,
                'reports' => $reports,
                'date' => date('d-m-Y'),
            ]);

        // return $pdf->stream();
        return $pdf->stream();
        // }
    }

    public function laporan_coboiler()
    {
        $first_date = Carbon::parse(request()->first_date)->toDateTimeString();
        $last_date = Carbon::parse(request()->last_date)->toDateTimeString();
        $reports = CoBoiler::with(['users','status_equipments'])->whereBetween('tanggal_update',[$first_date, $last_date])->orderBy('tanggal_update','desc')->get();
        
        // $reports = EdgSystem::with(['users','status_equipments'])->whereBetween('tanggal_update', [$first_date, $last_date])->get();
        $date_now = Carbon::now()->format('Y-m-d');

        $path = base_path('public/frontends/assets/img/logo/pln.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $img = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $pdf = PDF::setOptions(
            ['isHtml5ParserEnabled' => true, 
            'isRemoteEnabled' => true,
            ])
            ->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif'])
            ->setPaper('a4', 'landscape')
            ->loadView('prints.admin.coboiler.LaporanCoboiler', [
                'img' => $img,
                'date_now' => $date_now,
                'reports' => $reports,
                'date' => date('d-m-Y'),
            ]);

        // return $pdf->stream();
        return $pdf->stream();
        // }
    }
    public function laporan_cocommon()
    {
        $first_date = Carbon::parse(request()->first_date)->toDateTimeString();
        $last_date = Carbon::parse(request()->last_date)->toDateTimeString();
        $reports = CoCommon::with(['users','status_equipments'])->whereBetween('tanggal_update',[$first_date, $last_date])->orderBy('tanggal_update','desc')->get();
        
        // $reports = EdgSystem::with(['users','status_equipments'])->whereBetween('tanggal_update', [$first_date, $last_date])->get();
        $date_now = Carbon::now()->format('Y-m-d');

        $path = base_path('public/frontends/assets/img/logo/pln.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $img = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $pdf = PDF::setOptions(
            ['isHtml5ParserEnabled' => true, 
            'isRemoteEnabled' => true,
            ])
            ->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif'])
            ->setPaper('a4', 'landscape')
            ->loadView('prints.admin.cocommon.LaporanCocommon', [
                'img' => $img,
                'date_now' => $date_now,
                'reports' => $reports,
                'date' => date('d-m-Y'),
            ]);

        // return $pdf->stream();
        return $pdf->stream();
        // }
    }

    public function laporan_user()
    {
        $reports = User::whereNotIn('divisi', ['Admin'])->orderBy('nip','asc')->get();

        $date_now = Carbon::now()->format('Y-m-d');

        $path = base_path('public/frontends/assets/img/logo/pln.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $img = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $pdf = PDF::setOptions(
            ['isHtml5ParserEnabled' => true, 
            'isRemoteEnabled' => true,
            ])
            ->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif'])
            ->setPaper('a4', 'landscape')
            ->loadView('prints.admin.User.LaporanUser', [
                'img' => $img,
                'date_now' => $date_now,
                'reports' => $reports,
                'date' => date('d-m-Y'),
            ]);

        // return $pdf->stream();
        return $pdf->download($date_now . '.pdf');
    }


    // ======= DOWNLOAD
    public function download_burner($id)
    {
        // $shift_reports = BurnerSystem::with('users')->get();
        $reports = BurnerSystem::with(['users','status_equipments'])->where('id', $id)->get();
        $date_now = Carbon::now()->format('Y-m-d');

        $path = base_path('public/frontends/assets/img/logo/pln.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $img = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $pdf = PDF::setOptions(
            ['isHtml5ParserEnabled' => true, 
            'isRemoteEnabled' => true,
            ])
            ->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif'])
            ->setPaper('a4', 'landscape')
            ->loadView('prints.admin.Burner.DownloadBurner', [
                'img' => $img,
                'date_now' => $date_now,
                'reports' => $reports,
                'date' => date('d-m-Y'),
            ]);

        // return $pdf->stream();
        return $pdf->download($date_now.'.pdf');
    }
}