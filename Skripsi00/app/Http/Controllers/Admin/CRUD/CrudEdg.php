<?php

namespace App\Http\Controllers\Admin\CRUD;

use App\Http\Controllers\Controller;
use App\Models\EdgSystem;
use App\Models\Leader;
use App\Models\Leaders;
use App\Models\StatusEquipment;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CrudEdg extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = EdgSystem::latest()->get();
        return view('pages.admin.laporan.edg.data_laporan_edg', compact('data','user'));
    }

    public function edit($id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $leaders = Leader::get();
        $users = User::whereIn('jabatan', ['Operator Turbine'])->orderBy('nama_lengkap', 'asc')->get();
        $status = StatusEquipment::get();
        $data_id = EdgSystem::with(['users','status_equipments'])->where('id', $id)->first();
        return view('pages.admin.laporan.edg.data_validasi_edg', compact('data_id', 'status','users','user','leaders'));
    }

    public function update($id, Request  $request)
    {
        $update = EdgSystem::with('users')->where('id', $request->id)->first();

        $update->id = $update->id;

        $update->nip = $request->get('nip');
        $update->user_id = $request->get('user_id');
        $update->operator_kedua = $request->get('operator_kedua');
        $update->operator_shift = $request->get('operator_shift');
        $update->atasan = $request->get('atasan');
        $update->tanggal_update = $request->get('tanggal_update');
        $update->lev_bbm_awal = $request->get('lev_bbm_awal');
        $update->lev_oli = $request->get('lev_oli');
        $update->teg_battery = $request->get('teg_battery');
        $update->jam_start = $request->get('jam_start');
        $update->teg_out = $request->get('teg_out');
        $update->frekuensi = $request->get('frekuensi');
        $update->putaran = $request->get('putaran');
        $update->temp_coolant = $request->get('temp_coolant');
        $update->press_oli = $request->get('press_oli');
        $update->jam_stop = $request->get('jam_stop');
        $update->lev_bbm_akhir = $request->get('lev_bbm_akhir');
        $update->status_equipment_id = $request->get('status_equipment_id');
        $update->keterangan = $request->get('keterangan');
        $update->catatan_spv = $request->get('catatan_spv');

        $update->save();

        return redirect()->route('admin.index.edg')->with('success', 'Updated Data Successfully');
    }

    public function delete($id)
    {
        EdgSystem::find($id)->delete();
        
        return back();
    }

    public function delete_permanent($id)
    {
        $edg = EdgSystem::where('id',$id)->onlyTrashed();
    	$edg->forceDelete();
        return back()->with('success', 'Deleted Data Successfully');
    }

    public function trash()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = EdgSystem::with('users')->onlyTrashed()->get();
        return view('pages.admin.laporan.edg.data_trash_edg', compact('data','user'));
    }

    public function restore($id) 
    {
        $burner = EdgSystem::onlyTrashed()->where('id',$id);
    	$burner->restore();

        return redirect()->route('admin.index.edg')->with('succes', 'Data restored successfully');
    }
    public function download($id)
    {
        // $shift_reports = EdgSystem::with('users')->get();
        $reports = EdgSystem::with(['users','status_equipments'])->where('id', $id)->get();
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
            ->loadView('prints.admin.edg.Downloadedg', [
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
