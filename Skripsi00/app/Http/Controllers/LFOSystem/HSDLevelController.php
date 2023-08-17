<?php

namespace App\Http\Controllers\LFOSystem;

use App\Http\Controllers\Controller;
use App\Models\HsdLevel;
use App\Models\StatusEquipment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Webpatser\Uuid\Uuid;

class HSDLevelController extends Controller
{
    public function index()
    { 
        $user = User::where('id', Auth::user()->id)->first();
        $data = HsdLevel::with('users')->where('operator_shift', Auth::user()->tim_divisi)->latest()->get();
        $date = Carbon::now()->format('Y-m-d');
        $data_latest = HsdLevel::with('users')->orderBy('created_at','desc')->take(1)->get();

        return view('pages.LFOSystem.HSDLevel.index', compact('user', 'data','date','data_latest'));
    }

    public function showChart()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        $chartData = HsdLevel::whereBetween('created_at', [$startDate, $endDate])
            ->get();

        $labels = $chartData->pluck('created_at')->toArray();
        $data = $chartData->pluck('nilai')->toArray();

        return view('pages.LFOSystem.HSDLevel.showChart', compact('labels', 'data','user'));
            
        // return view('pages.LFOSystem.HSDLevel.showChart', compact('storages','dailies','date','dateNow','user'));
    }

    // public function showChart(Request $request)
    // {
    //     $selectedMonth = $request->input('month', date('n')); // Mengambil bulan yang dipilih, default ke bulan saat ini
    //     $data = YourModel::whereMonth('created_at', $selectedMonth)->pluck('value')->toArray(); // Ganti dengan query dan kolom yang sesuai
    //     $months = YourModel::whereMonth('created_at', $selectedMonth)->pluck('month')->toArray(); // Ganti dengan query dan kolom yang sesuai
    
    //     return view('', compact('data', 'months'));
    // }

    public function create()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('pages.LFOSystem.HSDLevel.create', compact('user'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'operator_shift' => "required",
            'storage_level' => 'required',
            'daily_level' => 'required',
            'status_peralatan' => 'required',
            'status_equipment_id' => 'required',
            'info_hsd' => 'required',
            'catatan_spv' => 'required',
        ]);

        $hsd = new HsdLevel();

        $hsd->id = Uuid::generate();
        $hsd->user_id = $request->get('user_id');
        $hsd->operator_shift = $request->get('operator_shift');
        $hsd->storage_level = $request->get('storage_level');
        $hsd->daily_level = $request->get('daily_level');
        $hsd->status_peralatan = $request->get('status_peralatan');
        $hsd->status_equipment_id = $request->get('status_equipment_id');
        $hsd->info_hsd = $request->get('info_hsd');
        $hsd->catatan_spv = $request->get('catatan_spv');

        $hsd->save();

        return response()->json([
            'success' => 'Added Data Successfully'
        ], 200);
    }

    public function edit($id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data_id = HsdLevel::with(['users', 'status_equipments'])->where('id', $id)->first();

        return view('pages.LFOSystem.HSDLevel.edit', compact('user','data_id'));
    }

    public function update(Request $request)
    {
        $update = HsdLevel::with('users')->where('id', $request->id)->first();

        $update->id = $update->id;

        $update->user_id = $request->get('user_id');
        $update->operator_shift = $request->get('operator_shift');
        $update->storage_level = $request->get('storage_level');
        $update->daily_level = $request->get('daily_level');
        $update->status_peralatan = $request->get('status_peralatan');
        $update->status_equipment_id = $request->get('status_equipment_id');
        $update->info_hsd = $request->get('info_hsd');
        $update->catatan_spv = $request->get('catatan_spv');
        $update->save();

        return redirect()->route('hsd_level.index')->with('success', 'Updated Data Successfully');
    }

    public function all_view_hsdlevel()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = HsdLevel::with(['users','status_equipments'])->orderBy('created_at','desc')->get();

        return view('pages.reports.all_data.all_data_hsdlevel', compact('data','user'));
    }
}
