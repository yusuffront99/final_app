<?php

namespace App\Http\Controllers\Admin\CRUD;

use App\Http\Controllers\Controller;
use App\Models\BurnerSystem;
use App\Models\Maintenance;
use App\Models\SparePart;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CrudMaintenanceController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $startDate = Carbon::now()->subWeek(); // Mengambil tanggal satu minggu yang lalu
        $endDate = Carbon::now();
        $data_burner = BurnerSystem::where('status_equipment_id', 6)->orderBy('updated_at','desc')->whereBetween('updated_at', [$startDate, $endDate])->count();
        $tburner_repaired = Maintenance::where('category', 'BURNER SYSTEM')->count();
        
        return view('pages.admin.laporan.maintenance.index', [
            'user' => $user,
            'data_burner' => $data_burner,
            'tburner_repaired' => $tburner_repaired
        ]);
    }

    // === BURNER
    public function index_burner()
    {
        $today = Carbon::now()->format('d-m-Y');
        $startDate = Carbon::now()->subWeek(); // Mengambil tanggal satu minggu yang lalu
        $endDate = Carbon::now();
        $spare_part = SparePart::whereIn('category', ['BOILER','COMMON'])->get();
        $weekly_data = BurnerSystem::where('status_equipment_id', 6)->orderBy('updated_at','desc')->whereBetween('updated_at', [$startDate, $endDate])->get();
        $tbm_exists = DB::table('maintenances')->exists();
        $tbm_data = Maintenance::get();

        return view('pages.admin.laporan.maintenance.burner.index', compact('today','weekly_data','spare_part','tbm_exists','tbm_data'));
    }

    public function create_detail($id)
    {
        // $today = Carbon::now()->format('d-m-Y');
        // $startDate = Carbon::now()->subWeek(); // Mengambil tanggal satu minggu yang lalu
        // $endDate = Carbon::now();
        // $weekly_data = BurnerSystem::where('status_equipment_id', 6)->orderBy('updated_at','desc')->whereBetween('updated_at', [$startDate, $endDate])->get();
        $burner_id = BurnerSystem::where('id', $id)->first();
        // $spare_part = SparePart::get();
        return response()->json($burner_id);
    }

    public function create()
    {
        $today = Carbon::now()->format('d-m-Y');
        $new_data = BurnerSystem::whereDate('updated_at', $today)->get();
        $user = User::where('id', Auth::user()->id)->first();
        $code = BurnerSystem::where('status_equipment_id', 6)->orderBy('updated_at','desc')->get(); 
        return view('pages.admin.laporan.maintenance.burner.create', compact('user', 'code','today','new_data','sp'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'burner_system_id' => 'required|unique:maintenances,burner_system_id',
            'description' => 'required',
            'item_sp_1' => 'required',
            'item_price_1' => 'required',
            'item_total_1' => 'required',
        ]);

        $maintenances = new Maintenance();
        $maintenances->burner_system_id = $request->get('burner_system_id');
        $maintenances->user_id = $request->get('user_id');
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

    public function chooise($id)
    {
        $data = BurnerSystem::where('id', $id)->first();

        return response()->json(
            [
                'data' => $data,
                'success' => true,
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

    public function histories()
    {
        $histories = Maintenance::orderBy('created_at','desc')->get();

    
        return view('pages.admin.laporan.maintenance.histories', compact('histories'));
    }

}
