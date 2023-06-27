<?php

namespace App\Http\Controllers\ChangeOver;

use App\Http\Controllers\Controller;
use App\Models\CoCommon;
use App\Models\commons;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class COCommonController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $date = Carbon::now()->format('Y-m-d');
        $data = CoCommon::with('users')->latest()->where('operator_shift', Auth::user()->tim_divisi)->get();
        $data_latest = CoCommon::with('users')->orderBy('tanggal_update','desc')->take(1)->get();
        return view('pages.ChangeOvers.common.index', compact('data','date', 'user','data_latest'));
    }

    public function create()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $commons = commons::where('code_equipment','Common')->get();
        $users = User::where('tim_divisi', Auth::user()->tim_divisi)
        ->Where('jabatan', Auth::user()->jabatan)
        ->get();
        return view('pages.ChangeOvers.common.create', compact('users','user','commons'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'operator_shift' => 'required',
            'unit' => 'required',
            'nama_peralatan' => 'required',
            'tanggal_update' => 'required',
            'jam_update' => 'required',
            'operasi_awal' => 'required',
            'rencana_operasi' => 'required',
            'operasi_akhir' => 'required',
            'status_kegiatan' => 'required',
            'status_peralatan' => 'required',
            'status_equipment_id' => 'required',
            'keterangan' => 'required',
            'catatan_spv' => 'required',
        ]);

        $cocommon = new CoCommon();

        $cocommon->id = Uuid::generate();
        $cocommon->user_id = $request->get('user_id');
        $cocommon->operator_shift = $request->get('operator_shift');
        $cocommon->nama_peralatan = $request->get('nama_peralatan');
        $cocommon->unit = $request->get('unit');
        $cocommon->jam_update = $request->get('jam_update');
        $cocommon->tanggal_update = $request->get('tanggal_update');
        $cocommon->operasi_awal = Str::upper($request->get('operasi_awal'));
        $cocommon->rencana_operasi = Str::upper($request->get('rencana_operasi'));
        $cocommon->operasi_akhir = Str::upper($request->get('operasi_akhir'));
        $cocommon->status_kegiatan = $request->get('status_kegiatan');
        $cocommon->status_peralatan = $request->get('status_peralatan');
        $cocommon->status_equipment_id = $request->get('status_equipment_id');
        $cocommon->keterangan = $request->get('keterangan');
        $cocommon->catatan_spv = $request->get('catatan_spv');

        $cocommon->save();

        return response()->json([
            'success' => 'Added Data Successfully'
        ], 200);
    }

    public function edit($id)
    {
        $commons = commons::where('code_equipment','Common')->get();
        $user = User::where('id', Auth::user()->id)->first();
        $users = User::get();
        $data_id = CoCommon::with('users')->where('id', $id)->first();
        return view('pages.ChangeOvers.common.edit', compact('data_id', 'users','user','commons'));
    }


    public function update(Request $request)
    {
        $update = CoCommon::with('users')->where('id', $request->id)->first();

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
        $update->catatan_spv = $request->get('catatan_spv');

        $update->save();

        return redirect()->route('cocommon.index')->with('success', 'Data Updated Successfully');
        
    }
    public function shift_data_cocommon()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = CoCommon::where('operator_shift', Auth::user()->tim_divisi)->orderBy('tanggal_update', 'desc')->get();
        return view('pages.reports.all_data.shift_data_cocommon', compact('data','user'));
    }

    public function all_view_cocommon()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = CoCommon::with(['users','status_equipments'])->orderBy('tanggal_update','desc')->get();

        return view('pages.reports.all_data.all_data_cocommon', compact('data','user'));
    }

    public function print()
    {
        $reports = CoCommon::with(['users','status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->orderBy('tanggal_update','desc')->get();
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
            ->setPaper('a4', 'landscape')
            ->loadView('prints.data_cocommon_shift', [
                'img' => $img,
                'date_now' => $date_now,
                'reports' => $reports,
                'date' => date('d-m-Y'),
            ]);

        // return $pdf->stream();
        return $pdf->stream();

    }
    
    public function one_print($id)
    {
        $reports = CoCommon::with(['users','status_equipments'])->where('id', $id)->get();
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
            ->setPaper('a4', 'landscape')
            ->loadView('prints.one_report_cocommon', [
                'img' => $img,
                'date_now' => $date_now,
                'reports' => $reports,
                'date' => date('d-m-Y'),
            ]);

        // return $pdf->stream();
        return $pdf->stream();
    }

}
