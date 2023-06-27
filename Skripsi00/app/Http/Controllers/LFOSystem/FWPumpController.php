<?php

namespace App\Http\Controllers\LFOSystem;

use App\Http\Controllers\Controller;
use App\Models\Fw_Pump;
use App\Models\HsdLevel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Webpatser\Uuid\Uuid;

class FWPumpController extends Controller
{
    public function index()
    {
    
        $hsd = HsdLevel::take(1)->latest()->get();
        $user = User::where('id', Auth::user()->id)->first();
        $data = Fw_Pump::with('users')->latest()->where('operator_shift', Auth::user()->tim_divisi)->latest()->get();
        $date = Carbon::now()->format('Y-m-d');
        $data_latest = Fw_Pump::with('users')->orderBy('tanggal_update','desc')->take(2)->get();

        return view('pages.LFOSystem.FWPump.index', compact('user','data','date','data_latest','hsd'));
    }

    public function create()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $users = User::where('tim_divisi', Auth::user()->tim_divisi)
        ->Where('jabatan', Auth::user()->jabatan)
        ->get();
        return view('pages.LFOSystem.FWPump.create', compact('users','user'));
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'user_id' => 'required',
            'operator_kedua' => 'required',
            'atasan' => 'required',
            'operator_shift' => 'required',
            'tanggal_update' => 'required',
            'jam_update' => 'required',
            'arus_FP_A' => 'required',
            'arus_FP_B' => 'required',
            'status_FP_A' => 'required',
            'status_FP_B' => 'required',
            'press_FP_A' => 'required',
            'press_FP_B' => 'required',
            'info_FP' => 'required',
            'status_equipment_id' => 'required',
        ]);

        $forwarding = new Fw_Pump();

        $forwarding->id = Uuid::generate();
        $forwarding->user_id = $request->get('user_id');
        $forwarding->operator_kedua = $request->get('operator_kedua');
        $forwarding->atasan = $request->get('atasan');
        $forwarding->operator_shift = $request->get('operator_shift');
        $forwarding->tanggal_update = $request->get('tanggal_update');
        $forwarding->jam_update = $request->get('jam_update');
        $forwarding->arus_FP_A = $request->get('arus_FP_A');
        $forwarding->arus_FP_B = $request->get('arus_FP_B');
        $forwarding->press_FP_A = $request->get('press_FP_A');
        $forwarding->press_FP_B = $request->get('press_FP_B');
        $forwarding->status_FP_A = $request->get('status_FP_A');
        $forwarding->status_FP_B = $request->get('status_FP_B');
        $forwarding->info_FP = $request->get('info_FP');
        $forwarding->status_equipment_id = $request->get('status_equipment_id');
        $forwarding->catatan_spv = $request->get('catatan_spv');

        $forwarding->save();

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
        $data_id = Fw_Pump::where('id', $id)->first();

        return view('pages.LFOSystem.FWPump.edit', compact('data_id', 'users','user'));
    }

    public function update(Request $request, $id)
    {
        $update = Fw_Pump::where('id', $id)->first();

        $update->id = $update->id;
        
        $update->user_id = $request->get('user_id');
        $update->operator_kedua = $request->get('operator_kedua');
        $update->atasan = $request->get('atasan');
        $update->operator_shift = $request->get('operator_shift');
        $update->tanggal_update = $request->get('tanggal_update');
        $update->jam_update = $request->get('jam_update');
        $update->arus_FP_A = $request->get('arus_FP_A');
        $update->arus_FP_B = $request->get('arus_FP_B');
        $update->press_FP_A = $request->get('press_FP_A');
        $update->press_FP_B = $request->get('press_FP_B');
        $update->status_FP_A = $request->get('status_FP_A');
        $update->status_FP_B = $request->get('status_FP_B');
        $update->info_FP = $request->get('info_FP');
        $update->status_equipment_id = $request->get('status_equipment_id');
        $update->catatan_spv = $request->get('catatan_spv');

        $update->save();

        return redirect()->route('fw_pump.index')->with('success', 'Data Updated Successfully');;
    }

    public function all_view_fwpump()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = Fw_Pump::with('users','status_equipments')->orderBy('tanggal_update','desc')->get();

        return view('pages.reports.all_data.all_data_fwpump', compact('data','user'));
    }
}
