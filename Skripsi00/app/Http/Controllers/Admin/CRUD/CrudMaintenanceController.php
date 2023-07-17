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
use App\Models\SparePart;
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
        
        return redirect()->route('maintenance.histories')->with('success','Moved Data to Trash Successfully');
    }

    public function delete_permanent($id)
    {
        $maintenance = Maintenance::where('id',$id)->onlyTrashed();
    	$maintenance->forceDelete();
        return back()->with('success', 'Deleted Data Successfully');
    }

    public function trash()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $histories = Maintenance::with('users')->onlyTrashed()->get();
        return view('pages.admin.laporan.maintenance.trash', compact('histories','user'));
    }

    public function restore($id) 
    {
        $maintenance = Maintenance::onlyTrashed()->where('id',$id);
    	$maintenance->restore();

        return redirect()->route('maintenance.histories')->with('success', 'Data restored successfully');
    }

    public function histories()
    {
        $spare_part = SparePart::get();
        $histories = Maintenance::orderBy('created_at','desc')->get();
        return view('pages.admin.laporan.maintenance.histories', compact('histories','spare_part'));
    }

    public function edit($id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $maintenance_id = Maintenance::where('id', $id)->first();
        $spare_parts = SparePart::get();
        
        return view('pages.admin.laporan.maintenance.edit', compact('maintenance_id', 'user','spare_parts'));
    }

    public function histories_update(Request $request, $id)
    {
        $update = Maintenance::where('id', $id)->first();

        $update->id = $update->id;
        
        $update->user_id = $request->get('user_id');
        $update->repair_code = $request->get('repair_code');
        $update->damage_date = $request->get('damage_date');
        $update->repair_date = $request->get('repair_date');
        $update->category = $request->get('category');

        $update->item_sp_1 = $request->get('item_sp_1');
        $update->item_sp_2 = $request->get('item_sp_2');
        $update->item_sp_3 = $request->get('item_sp_3');

        $it1 =  intval($request->get('item_total_1'));
        $it2 =  intval($request->get('item_total_2'));
        $it3 =  intval($request->get('item_total_3'));

        $tp1 =  intval($request->get('item_price_1'));
        $tp2 =  intval($request->get('item_price_2'));
        $tp3 =  intval($request->get('item_price_3'));

        $update->item_total_1 = $it1;
        $update->item_total_2 = $it2;
        $update->item_total_3 = $it3;

        $update->item_price_1 = $tp1;
        $update->item_price_2 = $tp2;
        $update->item_price_3 = $tp3;
        $update->description = $request->get('description');

        $total_price = (($it1 * $tp1) + ($it2 * $tp2) + ($it3 * $tp3));
        $update->total_price = $total_price;
        
        $update->save();

        return redirect()->route('maintenance.histories')->with('success', 'updated data successfully');
    }

}
