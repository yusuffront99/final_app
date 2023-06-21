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
            'status_equipment_id' => 'required',
            'catatan_peralatan' => 'required',
        ]);

        $sbl = new Sootblower();

        $sbl->id = Uuid::generate();
        $sbl->user_id = $request->get('user_id');
        $sbl->operator_kedua = $request->get('operator_kedua');
        $sbl->operator_shift = $request->get('operator_shift');
        $sbl->atasan = $request->get('atasan');
        $sbl->tanggal_update = $request->get('tanggal_update');
        $sbl->jam_update = $request->get('jam_update');
        $sbl->status_sbl1 = $request->get('status_sbl1');
        $sbl->status_sbl2 = $request->get('status_sbl2');
        $sbl->status_sbl3 = $request->get('status_sbl3');
        $sbl->status_sbl4 = $request->get('status_sbl4');
        $sbl->status_sbl5 = $request->get('status_sbl5');
        $sbl->status_sbl6 = $request->get('status_sbl6');
        $sbl->status_sbl7 = $request->get('status_sbl7');
        $sbl->status_sbl8 = $request->get('status_sbl8');
        $sbl->status_sbl9 = $request->get('status_sbl9');
        $sbl->status_sbl10 = $request->get('status_sbl10');
        $sbl->status_sbl11 = $request->get('status_sbl11');
        $sbl->status_sbl12 = $request->get('status_sbl12');
        $sbl->status_sbl13 = $request->get('status_sbl13');
        $sbl->status_sbl14 = $request->get('status_sbl14');
        $sbl->status_sbl15 = $request->get('status_sbl15');
        $sbl->status_sbl16 = $request->get('status_sbl16');
        $sbl->status_sbl17 = $request->get('status_sbl17');
        $sbl->status_sbl18 = $request->get('status_sbl18');
        $sbl->status_sbl19 = $request->get('status_sbl19');
        $sbl->status_sbl20 = $request->get('status_sbl20');
        $sbl->status_sbl21 = $request->get('status_sbl21');
        $sbl->status_sbl22 = $request->get('status_sbl22');

        $sbl->status_sbl23 = $request->get('status_sbl34');
        $sbl->status_sbl24 = $request->get('status_sbl24');
        $sbl->status_sbl25 = $request->get('status_sbl25');
        $sbl->status_sbl26 = $request->get('status_sbl26');
        $sbl->status_sbl27 = $request->get('status_sbl27');
        $sbl->status_sbl28 = $request->get('status_sbl28');
        $sbl->status_sbl29 = $request->get('status_sbl29');
        $sbl->status_sbl30 = $request->get('status_sbl30');
        
        $sbl->status_sbl31 = $request->get('status_sbl31');
        $sbl->status_sbl32 = $request->get('status_sbl32');
        $sbl->status_sbl33 = $request->get('status_sbl33');
        $sbl->status_sbl34 = $request->get('status_sbl34');
        $sbl->status_sbl35 = $request->get('status_sbl35');
        $sbl->status_sbl36 = $request->get('status_sbl36');

        $sbl->status_equipment_id = $request->get('status_equipment_id');
        $sbl->catatan_peralatan = $request->get('catatan_peralatan');
        $sbl->catatan_spv = $request->get('catatan_spv');

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
        $users = User::where('tim_divisi', Auth::user()->tim_divisi)
        ->Where('jabatan', Auth::user()->jabatan)
        ->get();
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

        $update->user_id = $request->get('user_id');
        $update->operator_kedua = $request->get('operator_kedua');
        $update->operator_shift = $request->get('operator_shift');
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
        $update->catatan_peralatan = $request->get('catatan_peralatan');
        $update->catatan_spv = $request->get('catatan_spv');

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
