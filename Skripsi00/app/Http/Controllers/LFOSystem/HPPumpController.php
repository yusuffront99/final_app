<?php

namespace App\Http\Controllers\LFOSystem;

use App\Http\Controllers\Controller;
use App\Models\Hp_Pump;
use App\Models\HsdLevel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Webpatser\Uuid\Uuid;

class HPPumpController extends Controller
{
    public function index()
    {
        $hsd = HsdLevel::take(1)->latest()->get();
        $user = User::where('id', Auth::user()->id)->first();
        $data = Hp_Pump::with('users')->where('operator_shift', Auth::user()->tim_divisi)->latest()->get();
        $date = Carbon::now()->format('Y-m-d');
        $data_latest = Hp_Pump::with('users')->orderBy('tanggal_update','desc')->take(2)->get();

        return view('pages.LFOSystem.HPPump.index', compact('data','date','data_latest','user','hsd'));
    }

    
    public function create()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $users = User::where('tim_divisi', Auth::user()->tim_divisi)
        ->Where('jabatan', Auth::user()->jabatan)
        ->get();
        return view('pages.LFOSystem.HPPump.create', compact('users','user'));
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'user_id' => 'required',
            'operator_kedua' => 'required',
            'atasan' => 'required',
            'unit' => 'required',
            'operator_shift' => 'required',
            'tanggal_update' => 'required',
            'jam_update' => 'required',
            'arus_HP_A' => 'required',
            'arus_HP_B' => 'required',
            'status_HP_A' => 'required',
            'status_HP_B' => 'required',
            'press_HP_A' => 'required',
            'press_HP_B' => 'required',
            'DP_High' => 'required',
            'info_HP' => 'required',
            'status_equipment_id' => 'required',
        ]);

        $hppump = new Hp_Pump();

        $hppump->id = Uuid::generate();
        $hppump->user_id = $request->get('user_id');
        $hppump->operator_kedua = $request->get('operator_kedua');
        $hppump->atasan = $request->get('atasan');
        $hppump->unit = $request->get('unit');
        $hppump->operator_shift = $request->get('operator_shift');
        $hppump->tanggal_update = $request->get('tanggal_update');
        $hppump->jam_update = $request->get('jam_update');
        $hppump->arus_HP_A = $request->get('arus_HP_A');
        $hppump->arus_HP_B = $request->get('arus_HP_B');
        $hppump->press_HP_A = $request->get('press_HP_A');
        $hppump->press_HP_B = $request->get('press_HP_B');
        $hppump->status_HP_A = $request->get('status_HP_A');
        $hppump->status_HP_B = $request->get('status_HP_B');
        $hppump->DP_High = $request->get('DP_High');
        $hppump->info_HP = $request->get('info_HP');
        $hppump->status_equipment_id = $request->get('status_equipment_id');
        $hppump->catatan = $request->get('catatan');

        $hppump->save();

        return response()->json([
            'success' => 'Added Data Successfully'
        ], 200);
    }

    public function edit($id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $users = User::where('tim_divisi', Auth::user()->tim_divisi)
        ->Where('jabatan', Auth::user()->jabatan)
        ->get();
        $data_id = Hp_Pump::where('id', $id)->first();

        return view('pages.LFOSystem.HPPump.edit', compact('data_id', 'users','user'));
    }

    public function update(Request $request, $id)
    {
        $update = Hp_Pump::where('id', $id)->first();

        $update->id = $update->id;
        
        $update->user_id = $request->get('user_id');
        $update->operator_kedua = $request->get('operator_kedua');
        $update->atasan = $request->get('atasan');
        $update->unit = $request->get('unit');
        $update->operator_shift = $request->get('operator_shift');
        $update->tanggal_update = $request->get('tanggal_update');
        $update->jam_update = $request->get('jam_update');
        $update->arus_HP_A = $request->get('arus_HP_A');
        $update->arus_HP_B = $request->get('arus_HP_B');
        $update->press_HP_A = $request->get('press_HP_A');
        $update->press_HP_B = $request->get('press_HP_B');
        $update->status_HP_A = $request->get('status_HP_A');
        $update->status_HP_B = $request->get('status_HP_B');
        $update->DP_High = $request->get('DP_High');
        $update->info_HP = $request->get('info_HP');
        $update->status_equipment_id = $request->get('status_equipment_id');
        $update->catatan = $request->get('catatan');

        $update->save();

        return redirect()->route('hp_pump.index')->with('success', 'Data Updated Successfully');;
    }

    public function all_view_hppump()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = Hp_Pump::with('users','status_equipments')->orderBy('tanggal_update','desc')->get();

        return view('pages.reports.all_data.all_data_hppump', compact('data','user'));
    }
}
