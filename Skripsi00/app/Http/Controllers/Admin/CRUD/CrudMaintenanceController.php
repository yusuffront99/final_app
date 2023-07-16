<?php

namespace App\Http\Controllers\Admin\CRUD;

use App\Http\Controllers\Controller;
use App\Models\BurnerSystem;
use App\Models\CoBoiler;
use App\Models\CoCommon;
use App\Models\CoTurbine;
use App\Models\EdgSystem;
use App\Models\Fw_Pump;
use App\Models\Hp_Pump;
use App\Models\HsdLevel;
use App\Models\Maintenance;
use App\Models\Sootblower;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class CrudMaintenanceController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $startDate = Carbon::now()->subWeek(); // Mengambil tanggal satu minggu yang lalu
        $endDate = Carbon::now();
        $data_burner = BurnerSystem::where('status_equipment_id', 6)->orderBy('updated_at','desc')->whereBetween('updated_at', [$startDate, $endDate])->count();
        $data_sootblower = Sootblower::where('status_equipment_id', 6)->orderBy('updated_at','desc')->whereBetween('updated_at', [$startDate, $endDate])->count();
        $data_edg = EdgSystem::where('status_equipment_id', 6)->orderBy('updated_at','desc')->whereBetween('updated_at', [$startDate, $endDate])->count();
        $data_fwpump = Fw_Pump::where('status_equipment_id', 6)->orderBy('updated_at','desc')->whereBetween('updated_at', [$startDate, $endDate])->count();
        $data_hppump = Hp_Pump::where('status_equipment_id', 6)->orderBy('updated_at','desc')->whereBetween('updated_at', [$startDate, $endDate])->count();
        $data_hsdlevel = HsdLevel::where('status_equipment_id', 6)->orderBy('updated_at','desc')->whereBetween('updated_at', [$startDate, $endDate])->count();
        $data_coturbine = CoTurbine::where('status_equipment_id', 6)->orderBy('updated_at','desc')->whereBetween('updated_at', [$startDate, $endDate])->count();
        $data_cocommon = CoCommon::where('status_equipment_id', 6)->orderBy('updated_at','desc')->whereBetween('updated_at', [$startDate, $endDate])->count();
        $data_coboiler = CoBoiler::where('status_equipment_id', 6)->orderBy('updated_at','desc')->whereBetween('updated_at', [$startDate, $endDate])->count();

        // ============================================
        $tburner_repaired = Maintenance::where('category', 'BURNER SYSTEM')->count();
        $tsootblower_repaired = Maintenance::where('category', 'SOOTBLOWER SYSTEM')->count();
        $tedg_repaired = Maintenance::where('category', 'EDG SYSTEM')->count();
        $thppump_repaired = Maintenance::where('category', 'HIGH PRESSURE PUMP')->count();
        $tfwpump_repaired = Maintenance::where('category', 'FORWARDING PUMP')->count();
        $thsdlevel_repaired = Maintenance::where('category', 'HIGH SPEED DIESEL LEVEL')->count();
        $tcoturbine_repaired = Maintenance::where('category', 'CHANGE OVER TURBINE')->count();
        $tcoboiler_repaired = Maintenance::where('category', 'CHANGE OVER BOILER')->count();
        $tcocommon_repaired = Maintenance::where('category', 'CHANGE OVER COMMON')->count();
       
        return view('pages.admin.laporan.maintenance.index', [
            'user' => $user,
            'data_burner' => $data_burner,
            'data_sootblower' => $data_sootblower,
            'data_edg' => $data_edg,
            'data_hppump' => $data_hppump,
            'data_fwpump' => $data_fwpump,
            'data_hsdlevel' => $data_hsdlevel,
            'data_coturbine' => $data_coturbine,
            'data_coboiler' => $data_coboiler,
            'data_cocommon' => $data_cocommon,
            
            'tburner_repaired' => $tburner_repaired,
            'tsootblower_repaired' => $tsootblower_repaired,
            'tedg_repaired' => $tedg_repaired,
            'thppump_repaired' => $thppump_repaired,
            'tfwpump_repaired' => $tfwpump_repaired,
            'thsdlevel_repaired' => $thsdlevel_repaired,
            'tcoturbine_repaired' => $tcoturbine_repaired,
            'tcocommon_repaired' => $tcocommon_repaired,
            'tcoboiler_repaired' => $tcoboiler_repaired,
        ]);
    }

    public function delete($id)
    {
        Maintenance::find($id)->delete();
        
        return back();
    }

    public function delete_permanent($id)
    {
        $burner = Maintenance::where('id',$id)->onlyTrashed();
    	$burner->forceDelete();
        return back()->with('success', 'Deleted Data Successfully');
    }

    public function trash()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = Maintenance::with('users')->onlyTrashed()->get();
        return view('pages.admin.laporan.maintenance.trash', compact('data','user'));
    }

    public function restore($id) 
    {
        $burner = EdgSystem::onlyTrashed()->where('id',$id);
    	$burner->restore();

        return redirect()->route('admin.index.edg')->with('succes', 'Data restored successfully');
    }

    public function histories()
    {
        $histories = Maintenance::orderBy('created_at','desc')->get();

    
        return view('pages.admin.laporan.maintenance.histories', compact('histories'));
    }

    public function histories_edit($id)
    {
        return view('pages.admin.laporan.maintenance.index');
    }

    public function histories_update(Request $request)
    {

    }

}
