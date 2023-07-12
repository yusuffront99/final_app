<?php

namespace App\Http\Controllers\Admin\CRUD;

use App\Http\Controllers\Controller;
use App\Models\Sootblower;
use App\Models\StatusEquipment;
use App\Models\User;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CrudSootblower extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = Sootblower::with('users')->orderBy('tanggal_update', 'desc')->get();
        return view('pages.admin.laporan.sootblower.data_laporan_sootblower', compact('data','user'));
    }

    public function edit($id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $users = User::where('jabatan', ['Operator Boiler'])->orderBy('nama_lengkap', 'asc')->get();
        $status = StatusEquipment::get();
        $data_id = Sootblower::with(['users','status_equipments'])->where('id', $id)->first();
        return view('pages.admin.laporan.sootblower.data_validasi_sootblower', compact('data_id','users','user', 'status'));
    }

    public function update(Request $request)
    {
        $update = Sootblower::with('users')->where('id', $request->id)->first();

        //uuid pake yang sebelumnya
        $update->id = $update->id;

        $update->user_id = $request->get('user_id');
        $update->operator_kedua = $request->get('operator_kedua');
        $update->operator_shift = $request->get('operator_shift');
        $update->unit = $request->get('unit');
        $update->atasan = $request->get('atasan');
        $update->tanggal_update = $request->get('tanggal_update');
        $update->status_sbl1 = $request->get('status_sbl1');
        $update->status_sbl2 = $request->get('status_sbl2');
        $update->status_sbl3 = $request->get('status_sbl3');
        $update->status_sbl4 = $request->get('status_sbl4');
        $update->status_sbl5 = $request->get('status_sbl5');
        $update->status_sbl6 = $request->get('status_sbl6');
        $update->status_sbl7 = $request->get('status_sbl7');
        $update->status_sbl8 = $request->get('status_sbl8');
        $update->status_sbl9 = $request->get('status_sbl9');
        $update->status_sbl11 = $request->get('status_sbl11');
        $update->status_sbl12 = $request->get('status_sbl12');
        $update->status_sbl13 = $request->get('status_sbl13');
        $update->status_sbl14 = $request->get('status_sbl14');
        $update->status_sbl15 = $request->get('status_sbl15');
        $update->status_sbl16 = $request->get('status_sbl16');
        $update->status_sbl17 = $request->get('status_sbl17');
        $update->status_sbl18 = $request->get('status_sbl18');
        $update->status_sbl19 = $request->get('status_sbl19');
        $update->status_sbl20 = $request->get('status_sbl20');
        $update->status_sbl21 = $request->get('status_sbl21');
        $update->status_sbl22 = $request->get('status_sbl22');
        $update->status_sbl23 = $request->get('status_sbl23');
        $update->status_sbl24 = $request->get('status_sbl24');
        $update->status_sbl25 = $request->get('status_sbl25');
        $update->status_sbl26 = $request->get('status_sbl26');
        $update->status_sbl27 = $request->get('status_sbl27');
        $update->status_sbl28 = $request->get('status_sbl28');
        $update->status_sbl29 = $request->get('status_sbl29');
        $update->status_sbl30 = $request->get('status_sbl30');
        $update->status_sbl31 = $request->get('status_sbl31');
        $update->status_sbl32 = $request->get('status_sbl32');
        $update->status_sbl33 = $request->get('status_sbl33');
        $update->status_sbl34 = $request->get('status_sbl34');
        $update->status_sbl35 = $request->get('status_sbl35');
        $update->status_sbl36 = $request->get('status_sbl36');
        $update->status_equipment_id = $request->get('status_equipment_id');
        $update->keterangan = $request->get('keterangan');
        $update->catatan_spv = $request->get('catatan_spv');

        $update->save();

        return redirect()->route('admin.index.sootblower')->with('success', 'Data Updated Successfully');
    }

    
    public function delete($id)
    {
        Sootblower::find($id)->delete();
        
        return back();
    }

    public function delete_permanent($id)
    {
        $sootblower = Sootblower::where('id',$id)->onlyTrashed();
    	$sootblower->forceDelete();
        return back()->with('success', 'Deleted Data Successfully');
    }

    public function trash()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = Sootblower::with('users')->onlyTrashed()->get();
        return view('pages.admin.laporan.sootblower.data_trash_sootblower', compact('data','user'));
    }

    public function restore($id) 
    {
        $sootblower = Sootblower::onlyTrashed()->where('id',$id);
    	$sootblower->restore();

        return redirect()->route('admin.index.sootblower')->with('succes', 'sootblower restored successfully');
    }

    public function download($id)
    {
        // $shift_reports = Sootblower::with('users')->get();
        $reports = Sootblower::with(['users','status_equipments'])->where('id', $id)->get();
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
            ->loadView('prints.admin.sootblower.Downloadsootblower', [
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

