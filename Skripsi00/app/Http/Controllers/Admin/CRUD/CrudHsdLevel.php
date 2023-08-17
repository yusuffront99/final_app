<?php

namespace App\Http\Controllers\Admin\CRUD;

use App\Http\Controllers\Controller;
use App\Models\HsdLevel;
use App\Models\StatusEquipment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CrudHsdLevel extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = HsdLevel::with('users')->latest()->get();
        return view('pages.admin.laporan.hsdlevel.data_laporan_hsd', compact('data','user'));
    }

    public function edit($id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $operators = User::where('jabatan', 'Operator Boiler')->orderBy('nama_lengkap', 'asc')->get();
        $leaders = User::where('jabatan', 'Supervisor Operasi')->orderBy('nama_lengkap', 'asc')->get();
        // $forwarding = forwarding::get();
        $status_equipments = StatusEquipment::get();

        $data_id = HsdLevel::with('users','status_equipments')->where('id', $id)->first();
        return view('pages.admin.laporan.hsdlevel.data_validasi_hsd', compact('data_id', 'status_equipments','operators','leaders','user'));
    }

    // public function edit_forwarding($id)
    // {
    //     $user = User::where('id', Auth::user()->id)->first();
    //     $operators = User::where('jabatan', 'Operator Boiler')->orderBy('nama_lengkap', 'asc')->get();
    //     $status_equipments = StatusEquipment::get();
    //     $forwarding = forwarding::where('id', $id)->first();
    //     return view('pages.admin.laporan.hppump.data_validasi_forwarding', compact('forwarding', 'status_equipments','operators','user'));
    // }

    public function update($id, Request $request)
    {
        $update = HsdLevel::with('users')->where('id', $id)->first();

        //uuid pake yang sebelumnya
        $update->id = $update->id;

        $update->user_id = $request->get('user_id');
        $update->operator_shift = $request->get('operator_shift');
        $update->storage_level = $request->get('storage_level');
        $update->daily_level = $request->get('daily_level');
        $update->status_peralatan = $request->get('status_peralatan');
        $update->info_hsd = $request->get('info_hsd');
        $update->status_equipment_id = $request->get('status_equipment_id');
        $update->catatan_spv = $request->get('catatan_spv');


        $update->save();

        return redirect()->route('admin.index.hsdlevel')->with('success', 'Updated Data Successfully');
    }
    
    public function delete($id)
    {
        HsdLevel::find($id)->delete();
        
        return back();
    }

    public function delete_permanent($id)
    {
        $burner = HsdLevel::where('id',$id)->onlyTrashed();
    	$burner->forceDelete();
        return back()->with('success', 'Deleted Data Successfully');
    }

    public function trash()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = HsdLevel::with('users')->onlyTrashed()->get();
        return view('pages.admin.laporan.hppump.data_trash_hppump', compact('data','user'));
    }

    public function restore($id) 
    {
        $hppump = HsdLevel::onlyTrashed()->where('id',$id);
    	$hppump->restore();

        return redirect()->route('admin.index.hppump')->with('succes', 'Data restored successfully');
    }

    // public function download($id)
    // {
    //     // $shift_reports = BurnerSystem::with('users')->get();
    //     $reports = HsdLevel::with(['users','status_equipments'])->where('id', $id)->get();
    //     $date_now = Carbon::now()->format('Y-m-d');

    //     $path = base_path('public/frontends/assets/img/logo/pln.png');
    //     $type = pathinfo($path, PATHINFO_EXTENSION);
    //     $data = file_get_contents($path);
    //     $img = 'data:image/' . $type . ';base64,' . base64_encode($data);

    //     $pdf = PDF::setOptions(
    //         ['isHtml5ParserEnabled' => true, 
    //         'isRemoteEnabled' => true,
    //         ])
    //         ->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif'])
    //         ->setPaper('a4', 'potrait')
    //         ->loadView('prints.admin.Burner.DownloadBurner', [
    //             'img' => $img,
    //             'date_now' => $date_now,
    //             'reports' => $reports,
    //             'date' => date('d-m-Y'),
    //         ]);

    //     // return $pdf->stream();
    //     // return $pdf->download($date_now.'.pdf');
    //     return $pdf->stream();
    // }
}
