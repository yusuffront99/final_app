<?php

namespace App\Http\Controllers\Admin\CRUD;

use Barryvdh\DomPDF\Facade\Pdf as PDF;
use App\Models\BurnerSystem;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\StatusEquipment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CrudBurner extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = BurnerSystem::with('users')->orderBy('tanggal_update', 'desc')->get();
        return view('pages.admin.laporan.burner.data_laporan_burner', compact('data','user'));
    }

    public function edit($id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $users = User::where('jabatan', ['Operator Boiler'])->orderBy('nama_lengkap', 'asc')->get();
        $status = StatusEquipment::get();
        $data_id = BurnerSystem::with(['users','status_equipments'])->where('id', $id)->first();
        return view('pages.admin.laporan.burner.data_validasi_burner', compact('data_id','users','user', 'status'));
    }

    public function update(Request $request)
    {
        $update = BurnerSystem::with('users')->where('id', $request->id)->first();

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
        $update->nip = $request->get('nip');
        $update->user_id = $request->get('user_id');
        $update->operator_kedua = $request->get('operator_kedua');
        $update->operator_shift = $request->get('operator_shift');
        $update->atasan = $request->get('atasan');
        $update->unit = $request->get('unit');
        $update->tanggal_update = $request->get('tanggal_update');
        $update->jam_update = $request->get('jam_update');
        $update->status_burner1 = $request->get('status_burner1');
        $update->status_burner2 = $request->get('status_burner2');
        $update->status_burner3 = $request->get('status_burner3');
        $update->status_burner4 = $request->get('status_burner4');
        $update->ket_burner1 = $request->get('ket_burner1');
        $update->ket_burner2 = $request->get('ket_burner2');
        $update->ket_burner3 = $request->get('ket_burner3');
        $update->ket_burner4 = $request->get('ket_burner4');
        $update->status_equipment_id = $request->get('status_equipment_id');
        $update->catatan = $request->get('catatan');

        $update->save();

        return redirect()->route('admin.index.burner')->with('success', 'Data Updated Successfully');
    }

    
    public function delete($id)
    {
        BurnerSystem::find($id)->delete();
        
        return back();
    }

    public function delete_permanent($id)
    {
        $burner = BurnerSystem::where('id',$id)->onlyTrashed();
    	$burner->forceDelete();
        return back()->with('success', 'Deleted Data Successfully');
    }

    public function trash()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = BurnerSystem::with('users')->onlyTrashed()->get();
        return view('pages.admin.laporan.burner.data_trash_burner', compact('data','user'));
    }

    public function restore($id) 
    {
        $burner = BurnerSystem::onlyTrashed()->where('id',$id);
    	$burner->restore();

        return redirect()->route('admin.index.burner')->with('succes', 'burner restored successfully');
    }

    public function download($id)
    {
        // $shift_reports = BurnerSystem::with('users')->get();
        $reports = BurnerSystem::with(['users','status_equipments'])->where('id', $id)->get();
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
