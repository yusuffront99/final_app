<?php

namespace App\Http\Controllers\Admin\CRUD\Maintenance\Detail;

use App\Http\Controllers\Controller;
use App\Models\BurnerSystem;
use App\Models\CoBoiler;
use App\Models\CoCommon;
use App\Models\CoTurbine;
use App\Models\EdgSystem;
use App\Models\Fw_Pump;
use App\Models\Hp_Pump;
use App\Models\HsdLevel;
use App\Models\Sootblower;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MaintenanceHistoryController extends Controller
{
    public function history_burner()
    {
        $date = Carbon::now()->format('Y-m-d');
        $data = BurnerSystem::where('status_equipment_id', 6)->orderBy('updated_at','desc')->get();

        return view('pages.admin.laporan.maintenance.burner.history', compact('date','data'));
    }

    public function history_sootblower()
    {
        $date = Carbon::now()->format('Y-m-d');
        $data = Sootblower::where('status_equipment_id', 6)->orderBy('updated_at','desc')->get();

        return view('pages.admin.laporan.maintenance.sootblower.history', compact('date','data'));
    }

    public function history_edg()
    {
        $date = Carbon::now()->format('Y-m-d');
        $data = EdgSystem::where('status_equipment_id', 6)->orderBy('updated_at','desc')->get();

        return view('pages.admin.laporan.maintenance.edg.history', compact('date','data'));
    }

    public function history_coboiler()
    {
        $date = Carbon::now()->format('Y-m-d');
        $data = CoBoiler::where('status_equipment_id', 6)->orderBy('updated_at','desc')->get();

        return view('pages.admin.laporan.maintenance.coboiler.history', compact('date','data'));
    }

    public function history_coturbine()
    {
        $date = Carbon::now()->format('Y-m-d');
        $data = CoTurbine::where('status_equipment_id', 6)->orderBy('updated_at','desc')->get();

        return view('pages.admin.laporan.maintenance.coturbine.history', compact('date','data'));
    }

    public function history_cocommon()
    {
        $date = Carbon::now()->format('Y-m-d');
        $data = CoCommon::where('status_equipment_id', 6)->orderBy('updated_at','desc')->get();

        return view('pages.admin.laporan.maintenance.cocommon.history', compact('date','data'));
    }

    public function history_fwpump()
    {
        $date = Carbon::now()->format('Y-m-d');
        $data = Fw_Pump::where('status_equipment_id', 6)->orderBy('updated_at','desc')->get();

        return view('pages.admin.laporan.maintenance.fwpump.history', compact('date','data'));
    }
    public function history_hppump()
    {
        $date = Carbon::now()->format('Y-m-d');
        $data = Hp_Pump::where('status_equipment_id', 6)->orderBy('updated_at','desc')->get();

        return view('pages.admin.laporan.maintenance.hppump.history', compact('date','data'));
    }
    public function history_hsdlevel()
    {
        $date = Carbon::now()->format('Y-m-d');
        $data = HsdLevel::where('status_equipment_id', 6)->orderBy('updated_at','desc')->get();

        return view('pages.admin.laporan.maintenance.hsdlevel.history', compact('date','data'));
    }
}
