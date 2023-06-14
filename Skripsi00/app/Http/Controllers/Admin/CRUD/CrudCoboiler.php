<?php

namespace App\Http\Controllers\Admin\CRUD;

use Barryvdh\DomPDF\Facade\Pdf as PDF;
use App\Http\Controllers\Controller;
use App\Models\CoBoiler;
use App\Models\StatusEquipment;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CrudCoboiler extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = CoBoiler::with('users')->orderBy('tanggal_update', 'desc')->get();
        return view('pages.admin.laporan.coboiler.data_laporan_coboiler', compact('user','data'));
    }

    public function edit($id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $users = User::where('jabatan', ['Operator Boiler'])->orderBy('nama_lengkap', 'asc')->get();
        $status = StatusEquipment::get();
        $data_id = CoBoiler::with(['users','status_equipments'])->where('id', $id)->first();
        return view('pages.admin.laporan.coboiler.data_validasi_coboiler', compact('data_id','users','user', 'status'));
    }

    public function update(Request $request)
    {
        $update = CoBoiler::with('users')->where('id', $request->id)->first();

        //uuid pake yang sebelumnya
        $update->id = $update->id;

        $update->user_id = $request->get('user_id');
        $update->operator_shift = $request->get('operator_shift');
        $update->nama_peralatan = $request->get('nama_peralatan');
        $update->unit = $request->get('unit');
        $update->operasi_awal = Str::upper($request->get('operasi_awal'));
        $update->rencana_operasi = Str::upper($request->get('rencana_operasi'));
        $update->operasi_akhir = Str::upper($request->get('operasi_akhir'));
        $update->status_kegiatan = $request->get('status_kegiatan');
        $update->status_peralatan = $request->get('status_peralatan');
        $update->status_equipment_id = $request->get('status_equipment_id');
        $update->keterangan = $request->get('keterangan');
        $update->catatan = $request->get('catatan');

        $update->save();

        $update->save();

        return redirect()->route('admin.index.coboiler')->with('success', 'Data Updated Successfully');
    }

    
    public function delete($id)
    {
        CoBoiler::find($id)->delete();
        
        return back();
    }

    public function delete_permanent($id)
    {
        $coboiler = coboiler::where('id',$id)->onlyTrashed();
    	$coboiler->forceDelete();
        return back()->with('success', 'Deleted Data Successfully');
    }

    public function trash()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = CoBoiler::with('users')->onlyTrashed()->get();
        return view('pages.admin.laporan.coboiler.data_trash_coboiler', compact('data','user'));
    }

    public function restore($id) 
    {
        $coboiler = CoBoiler::onlyTrashed()->where('id',$id);
    	$coboiler->restore();

        return redirect()->route('admin.index.coboiler')->with('success', 'restored successfully');
    }

    public function download($id)
    {
        // $shift_reports = coboiler::with('users')->get();
        $reports = CoBoiler::with(['users','status_equipments'])->where('id', $id)->get();
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
            ->loadView('prints.admin.coboiler.Downloadcoboiler', [
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
