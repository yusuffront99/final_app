<?php

namespace App\Http\Controllers\Admin\CRUD;

use App\Http\Controllers\Controller;
use App\Models\BurnerSystem;
use App\Models\Maintenance;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CrudMaintenanceController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data_burner = BurnerSystem::where('status_equipment_id', 6)->count();
        $tburner_repaired = Maintenance::count();
        
        return view('pages.admin.laporan.maintenance.index', [
            'user' => $user,
            'data_burner' => $data_burner,
            'tburner_repaired' => $tburner_repaired
        ]);
    }

    // === BURNER
    public function index_burner()
    {
        $data_burner_resolved = BurnerSystem::where('status_equipment_id', 6)->get(); 
        return view('pages.admin.laporan.maintenance.burner.index', compact('data_burner_resolved'));
    }
    public function create()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $code = BurnerSystem::where('status_equipment_id', 6)->get(); 
        return view('pages.admin.laporan.maintenance.burner.create', compact('user', 'code'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'burner_system_id' => 'required',
            'description' => 'required',
            'item_sp_1' => 'required',
            'item_price_1' => 'required',
            'item_total_1' => 'required',
        ]);

        $maintenances = new Maintenance();
        $maintenances->burner_system_id = $request->get('burner_system_id');
        $maintenances->category = $request->get('category');
        $maintenances->description = $request->get('description');
        $maintenances->item_sp_1 = $request->get('item_sp_1');
        $maintenances->item_sp_2 = $request->get('item_sp_2');
        $maintenances->item_sp_3 = $request->get('item_sp_3');
        $maintenances->item_price_1 = $request->get('item_price_1');
        $maintenances->item_price_2 = $request->get('item_price_2');
        $maintenances->item_price_3 = $request->get('item_price_3');
        $maintenances->item_total_1 = $request->get('item_total_1');
        $maintenances->item_total_2 = $request->get('item_total_2');
        $maintenances->item_total_3 = $request->get('item_total_3');
        

        $it1 =  intval($request->get('item_total_1'));
        $it2 =  intval($request->get('item_total_3'));
        $it3 =  intval($request->get('item_total_2'));

        $tp1 =  intval($request->get('item_price_1'));
        $tp2 =  intval($request->get('item_price_3'));
        $tp3 =  intval($request->get('item_price_2'));

        $total_price = (($it1 * $tp1) + ($it2 * $tp2) + ($it3 * $tp3));
        $maintenances->total_price = $total_price;

        $maintenances->save();

        return response()->json([
            'success' => 'Added Data Successfully'
        ], 200);
    }

    // === SOOTBLOWER
    // === EDG
    // === CO TURBINE
    // === CO BOILER
    // === CO COMMON
    // === FORWARDING PUMP
    // === HP PUMP
    // === HSD LEVEL


    public function edit($id)
    {

    }

    public function update(Request $request)
    {

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
        return view('pages.admin.laporan.burner.data_trash_burner', compact('data','user'));
    }

}
