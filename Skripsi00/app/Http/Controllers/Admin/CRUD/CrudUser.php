<?php

namespace App\Http\Controllers\Admin\CRUD;

use App\Http\Controllers\Controller;
use App\Models\Leader;
use App\Models\Leaders;
use App\Models\StatusEquipment;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CrudUser extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = User::whereNotIn('divisi', ['Admin'])->orderBy('nama_lengkap', 'asc')->get();
        return view('pages.admin.laporan.user.data_laporan_user', compact('data','user'));
    }

    public function edit($id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $leaders = Leader::get();
        $users = User::whereNotIn('jabatan', ['Admin'])->orderBy('nip','desc')->get();
        $data_id = User::where('id', $id)->first();
        return view('pages.admin.laporan.user.data_validasi_user', compact('data_id', 'leaders','users','user'));
    }

    public function update($id, Request $request)
    {
        $update = User::where('id', $id)->first();

        $update->id = $update->id;
        
        $update->nip= Str::upper($request->get('nip'));
        $update->nama_lengkap= Str::upper($request->get('nama_lengkap'));
        $update->nama_panggilan= $request->get('nama_panggilan');
        $update->email = $request->get('email');
        $update->divisi = $request->get('divisi');
        $update->tim_divisi = $request->get('tim_divisi');
        $update->jabatan = $request->get('jabatan');
        $update->atasan = $request->get('atasan');

        $update->save();

        return redirect()->route('admin.index.user')->with('success', 'Data Updated Successfully');
    }

    public function delete($id)
    {
        User::find($id)->delete();
        
        return back();
    }

    public function delete_permanent($id)
    {
        $user = User::where('id',$id)->onlyTrashed();
    	$user->forceDelete();
        return back()->with('success', 'Deleted Data Successfully');
    }

    public function trash()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = User::onlyTrashed()->get();
        return view('pages.admin.laporan.user.data_trash_user', compact('data','user'));
    }

    public function restore($id) 
    {
        $user = User::onlyTrashed()->where('id',$id);
    	$user->restore();

        return redirect()->route('admin.index.user')->with('succes', 'User restored successfully');
    }

    public function download($id)
    {
        $reports = User::with(['users','status_equipments'])->where('id', $id)->get();
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