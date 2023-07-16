<?php

namespace App\Http\Controllers\Admin\CRUD\Maintenance;

use App\Http\Controllers\Controller;
use App\Models\CoCommon;
use Illuminate\Http\Request;
use App\Models\Maintenance;
use App\Models\SparePart;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class MainCOCommonContoller extends Controller
{
    // === cocommon
    public function index_cocommon()
    {
        $today = Carbon::now()->format('d-m-Y');
        $startDate = Carbon::now()->subWeek(); 
        $endDate = Carbon::now();
        $spare_part = SparePart::whereIn('category', ['TURBINE','COMMON'])->get();
        $weekly_data = CoCommon::where('status_equipment_id', 6)->orderBy('updated_at','desc')->whereBetween('updated_at', [$startDate, $endDate])->get();

        return view('pages.admin.laporan.maintenance.CoCommon.index', compact('today','weekly_data','spare_part'));
    }

    public function create_detail($id)
    {
        $cocommon_id = CoCommon::where('id', $id)->first();
        return response()->json($cocommon_id);
    }


    public function create()
   {
       $today = Carbon::now()->format('d-m-Y');
       $new_data = CoCommon::whereDate('updated_at', $today)->get();
       $user = User::where('id', Auth::user()->id)->first();
       $code = CoCommon::where('status_equipment_id', 6)->orderBy('updated_at','desc')->get(); 
       return view('pages.admin.laporan.maintenance.cocommon.create', compact('user', 'code','today','new_data'));
   }

   public function store(Request $request)
   {
       $this->validate($request, [
           'repair_code' => 'required|unique:maintenances,repair_code',
           'description' => 'required',
           'item_sp_1' => 'required',
           'item_price_1' => 'required',
           'item_total_1' => 'required',
       ]);

       $maintenances = new Maintenance();
       $maintenances->repair_code = $request->get('repair_code');
       $maintenances->user_id = $request->get('user_id');
       $maintenances->category = $request->get('category');
       $maintenances->description = $request->get('description');
       $maintenances->damage_date = $request->get('damage_date');
       $maintenances->repair_date = $request->get('repair_date');
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
}