<?php

namespace App\Http\Controllers\Sootblower;

use App\Http\Controllers\Controller;
use App\Models\Sootblower;
use App\Models\User;
use Webpatser\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class SootblowerController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $date = Carbon::now()->format('Y-m-d');
        $data = Sootblower::with('users')->latest()->where('operator_shift', Auth::user()->tim_divisi)->get();
        $data_latest = Sootblower::with('users')->orderBy('tanggal_update','desc')->take(2)->get();
        return view('pages.Sootblowers.index', compact('data','date', 'user','data_latest'));
    }

    public function create()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $users = User::where('tim_divisi', Auth::user()->tim_divisi)
        ->Where('jabatan', Auth::user()->jabatan)
        ->get();
        return view('pages.Sootblowers.create', compact('users', 'user'));
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
            'user_id' => 'required',
            'operator_kedua' => 'required',
            'atasan' => 'required',
            'tanggal_update' => 'required',
            'jam_update' => 'required',
            'unit' => 'required',
            'sbl_type' => 'required',
            'arus' => 'required',
            'status_equipment_id' => 'required',
            'catatan' => 'required',
        ]);

        $sbl = new Sootblower();

        $sbl->id = Uuid::generate();
        $sbl->user_id = $request->get('user_id');
        $sbl->operator_kedua = $request->get('operator_kedua');
        $sbl->operator_shift = $request->get('operator_shift');
        $sbl->atasan = $request->get('atasan');
        $sbl->tanggal_update = $request->get('tanggal_update');
        $sbl->jam_update = $request->get('jam_update');
        $sbl->sbl_type = $request->get('sbl_type');
        $sbl->arus = $request->get('arus');
        $sbl->status_equipment_id = $request->get('status_equipment_id');
        $sbl->catatan = $request->get('catatan');

        $sbl->save();

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
        $data_id = Sootblower::with('users')->where('id', $id)->first();
        return view('pages.Sootblower.edit', compact('data_id', 'users', 'user'));
    }

    public function shift_data_sbl()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = Sootblower::where('operator_shift', Auth::user()->tim_divisi)->orderBy('tanggal_update','desc')->get();
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
        $data_id = Sootblower::with('users')->where('id', $id)->first();
        return view('pages.Sootblowers.edit', compact('data_id', 'users', 'user'));
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
        $update = Sootblower::with('users')->where('id', $request->id)->first();

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
        $update->catatan = $request->get('catatan');

        $update->save();

        return redirect()->route('sbl_system.index')->with('success', 'Updated Data Successfully');
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
        $reports = Sootblower::with(['users','status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->orderBy('tanggal_update','desc')->get();
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
        $reports = Sootblower::with(['users','status_equipments'])->where('id', $id)->get();
        $date_now = Carbon::now()->format('Y-m-d');

        $path = base_path('public/frontends/assets/img/logo/pln.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $img = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $pdf = Pdf::setOptions(
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
        $data = Sootblower::with('users','status_equipments')->orderBy('tanggal_update','desc')->get();

        return view('pages.reports.all_data.all_data_edg', compact('data','user'));
    }
}
