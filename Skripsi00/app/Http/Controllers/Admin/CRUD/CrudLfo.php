<?php

namespace App\Http\Controllers\Admin\CRUD;

use App\Http\Controllers\Controller;
use App\Models\forwarding;
use App\Models\LfoSystem;
use App\Models\StatusEquipment;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CrudLfo extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = LfoSystem::with(['users','forwardings'])->latest()->get();
        return view('pages.admin.laporan.lfo.data_laporan_lfo', compact('data','user'));
    }

    public function edit($id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $operators = User::where('jabatan', 'Operator Boiler')->orderBy('nama_lengkap', 'asc')->get();
        $leaders = User::where('jabatan', 'Supervisor Operasi')->orderBy('nama_lengkap', 'asc')->get();
        $forwarding = forwarding::get();
        $status = StatusEquipment::get();

        $data_id = LfoSystem::with(['users','status_equipments','forwardings'])->where('id', $id)->first();
        return view('pages.admin.laporan.lfo.data_validasi_lfo', compact('data_id', 'status','operators','leaders', 'forwarding','user'));
    }

    public function edit_forwarding($id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $operators = User::where('jabatan', 'Operator Boiler')->orderBy('nama_lengkap', 'asc')->get();
        $status_equipments = StatusEquipment::get();
        $forwarding = forwarding::where('id', $id)->first();
        return view('pages.admin.laporan.lfo.data_validasi_forwarding', compact('forwarding', 'status_equipments','operators','user'));
    }

    public function update($id, Request $request)
    {
        $update = lfoSystem::with('users')->where('id', $id)->first();

        //uuid pake yang sebelumnya
        $update->id = $update->id;

        $update->nip = $request->get('nip');
        $update->user_id = $request->get('user_id');
        $update->operator_kedua = $request->get('operator_kedua');
        $update->operator_shift = $request->get('operator_shift');
        $update->atasan = $request->get('atasan');
        $update->unit = $request->get('unit');
        $update->tanggal_update = $request->get('tanggal_update');
        $update->jam_update = $request->get('jam_update');
        $update->arus_HP_A = $request->get('arus_HP_A');
        $update->arus_HP_B = $request->get('arus_HP_B');
        $update->press_HP_A = $request->get('press_HP_A');
        $update->press_HP_B = $request->get('press_HP_B');
        $update->status_HP_A = $request->get('status_HP_A');
        $update->status_HP_B = $request->get('status_HP_B');
        $update->info_HP = $request->get('info_HP');
        $update->DP_High = $request->get('DP_High');
        $update->status_equipment_id = $request->get('status_equipment_id');
        $update->forwarding_id = $request->get('forwarding_id');
        $update->catatan = $request->get('catatan');


        $update->save();

        return redirect()->route('admin.index.lfo')->with('success', 'Updated Data LFO Successfully');
    }

    public function update_forwarding($id, Request $request)
    {
        $update = forwarding::where('id', $id)->first();

        $update->id = $update->id;

        $update->update_ke= $request->get('update_ke');
        $update->arus_FP_A = $request->get('arus_FP_A');
        $update->arus_FP_B = $request->get('arus_FP_B');
        $update->press_FP_A = $request->get('press_FP_A');
        $update->press_FP_B = $request->get('press_FP_B');
        $update->status_FP_A = $request->get('status_FP_A');
        $update->status_FP_B = $request->get('status_FP_B');
        $update->info_FP = $request->get('info_FP');

        $update->save();

        return redirect()->route('admin.index.lfo')->with('success', 'Updated Data Forwarding Successfully');;
    }

    
    public function delete($id)
    {
        LfoSystem::find($id)->delete();
        
        return back();
    }

    public function delete_permanent($id)
    {
        $burner = LfoSystem::where('id',$id)->onlyTrashed();
    	$burner->forceDelete();
        return back()->with('success', 'Deleted Data Successfully');
    }

    public function trash()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = LfoSystem::with(['users','forwardings'])->onlyTrashed()->get();
        return view('pages.admin.laporan.lfo.data_trash_lfo', compact('data','user'));
    }

    public function restore($id) 
    {
        $lfo = LfoSystem::onlyTrashed()->where('id',$id);
    	$lfo->restore();

        return redirect()->route('admin.index.lfo')->with('succes', 'burner restored successfully');
    }

    public function download($id)
    {
        // $shift_reports = BurnerSystem::with('users')->get();
        $reports = LfoSystem::with(['users','status_equipments'])->where('id', $id)->get();
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
            ->setPaper('a4', 'potrait')
            ->loadView('prints.admin.Burner.DownloadBurner', [
                'img' => $img,
                'date_now' => $date_now,
                'reports' => $reports,
                'date' => date('d-m-Y'),
            ]);

        // return $pdf->stream();
        // return $pdf->download($date_now.'.pdf');
        return $pdf->stream();
    }
}
