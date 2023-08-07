<?php

namespace App\Http\Controllers\EDGSystem;

use App\Models\User;
use Webpatser\Uuid\Uuid;
use App\Models\EdgSystem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class EDGSystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $date = Carbon::now()->format('Y-m-d');
        $data = EdgSystem::with('users')->where('operator_shift', Auth::user()->tim_divisi)->latest()->get();
        $data_latest = EdgSystem::with('users')->orderBy('tanggal_update', 'desc')->take(1)->latest()->get();
        return view('pages.EDGSystem.index', compact('data','date','user', 'data_latest'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $users = User::where('tim_divisi', Auth::user()->tim_divisi)
        ->Where('jabatan', Auth::user()->jabatan)
        ->get();
        return view('pages.EDGSystem.create', compact('users', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nip' => 'required',
            'user_id' => 'required',
            'operator_kedua' => 'required',
            'atasan' => 'required',
            'tanggal_update' => 'required',
            'lev_bbm_awal' => 'required',
            'lev_oli' => 'required',
            'teg_battery' => 'required',
            'jam_start' => 'required',
            'teg_out' => 'required',
            'frekuensi' => 'required',
            'putaran' => 'required',
            'temp_coolant' => 'required',
            'press_oli' => 'required',
            'jam_stop' => 'required',
            'lev_bbm_akhir' => 'required',
            'kondisi_peralatan' => 'required',
            'status_equipment_id' => 'required',
            'catatan_spv' => 'required',
        ]);

        $edg = new EdgSystem();

        $edg->id = Uuid::generate();
        $edg->nip = $request->get('nip');
        $edg->user_id = $request->get('user_id');
        $edg->operator_kedua = $request->get('operator_kedua');
        $edg->operator_shift = $request->get('operator_shift');
        $edg->atasan = $request->get('atasan');
        $edg->tanggal_update = $request->get('tanggal_update');
        $edg->lev_bbm_awal = $request->get('lev_bbm_awal');
        $edg->lev_oli = $request->get('lev_oli');
        $edg->teg_battery = $request->get('teg_battery');
        $edg->jam_start = $request->get('jam_start');
        $edg->teg_out = $request->get('teg_out');
        $edg->frekuensi = $request->get('frekuensi');
        $edg->putaran = $request->get('putaran');
        $edg->temp_coolant = $request->get('temp_coolant');
        $edg->press_oli = $request->get('press_oli');
        $edg->jam_stop = $request->get('jam_stop');
        $edg->lev_bbm_akhir = $request->get('lev_bbm_akhir');
        $edg->status_equipment_id = $request->get('status_equipment_id');
        $edg->kondisi_peralatan = $request->get('kondisi_peralatan');
        $edg->keterangan = $request->get('keterangan');
        $edg->catatan_spv = $request->get('catatan_spv');

        $edg->save();

        return response()->json([
            'success' => 'Added Data Successfully'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $users = User::get();
        $data_id = EdgSystem::with('users')->where('id', $id)->first();
        return view('pages.EDGSystem.edit', compact('data_id', 'users', 'user'));
    }

    public function shift_data_edg()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = EdgSystem::where('operator_shift', Auth::user()->tim_divisi)->orderBy('tanggal_update','desc')->get();
        return view('pages.reports.all_data.shift_data_edg', compact('data','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $users = User::get();
        $data_id = EdgSystem::with('users')->where('id', $id)->first();
        return view('pages.EDGSystem.edit', compact('data_id', 'users', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        $update->kondisi_peralatan = $request->get('kondisi_peralatan');
        $update->keterangan = $request->get('keterangan');
        $update->catatan_spv = $request->get('catatan_spv');

        $update->save();

        return redirect()->route('edg_system.index')->with('success', 'Updated Data Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function print()
    {
        $reports = EdgSystem::with(['users','status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->orderBy('tanggal_update','desc')->get();
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
            ->loadView('prints.data_edg_shift', [
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
            ->setPaper('a4', 'landscape')
            ->loadView('prints.one_report_edg', [
                'img' => $img,
                'date_now' => $date_now,
                'reports' => $reports,
                'date' => date('d-m-Y'),
            ]);

        // return $pdf->stream();
        return $pdf->stream();
    }

    public function all_view_edg()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = EdgSystem::with('users','status_equipments')->orderBy('tanggal_update','desc')->get();

        return view('pages.reports.all_data.all_data_edg', compact('data','user'));
    }
}
