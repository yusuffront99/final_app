<?php

namespace App\Http\Controllers\BurnerSystem;

use App\Models\User;
use Webpatser\Uuid\Uuid;
use App\Models\BurnerSystem;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class BurnerSystemController extends Controller
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
        $data = BurnerSystem::with('users')->latest()->where('operator_shift', Auth::user()->tim_divisi)->get();
        $data_latest = BurnerSystem::with('users')->orderBy('tanggal_update','desc')->take(2)->get();
        return view('pages.BurnerSystem.index', compact('data','date', 'user','data_latest'));
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
        
        return view('pages.BurnerSystem.create', compact('users','user'));
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
            'unit' => 'required',
            'tanggal_update' => 'required',
            'jam_update' => 'required',
            'status_burner1' => 'required',
            'status_burner2' => 'required',
            'status_burner3' => 'required',
            'status_burner4' => 'required',
            'ket_burner1' => 'required',
            'ket_burner2' => 'required',
            'ket_burner3' => 'required',
            'ket_burner4' => 'required',
            'status_equipment_id' => 'required',
            'catatan' => 'required',
        ]);

        $burner = new BurnerSystem();

        $burner->id = Uuid::generate();
        $burner->nip = $request->get('nip');
        $burner->user_id = $request->get('user_id');
        $burner->operator_kedua = $request->get('operator_kedua');
        $burner->operator_shift = $request->get('operator_shift');
        $burner->atasan = $request->get('atasan');
        $burner->unit = $request->get('unit');
        $burner->jam_update = $request->get('jam_update');
        $burner->tanggal_update = $request->get('tanggal_update');
        $burner->status_burner1 = $request->get('status_burner1');
        $burner->status_burner2 = $request->get('status_burner2');
        $burner->status_burner3 = $request->get('status_burner3');
        $burner->status_burner4 = $request->get('status_burner4');
        $burner->ket_burner1 = $request->get('ket_burner1');
        $burner->ket_burner2 = $request->get('ket_burner2');
        $burner->ket_burner3 = $request->get('ket_burner3');
        $burner->ket_burner4 = $request->get('ket_burner4');
        $burner->status_equipment_id = $request->get('status_equipment_id');
        $burner->catatan = $request->get('catatan');

        $burner->save();

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
        // $data = BurnerSystem::where('operator_shift', Auth::user()->tim_divisi)->get();

        // return view('pages.reports.all_data.shift_data_burner', compact('data'));
    }

    public function shift_data_burner()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = BurnerSystem::where('operator_shift', Auth::user()->tim_divisi)->orderBy('tanggal_update', 'desc')->get();
        return view('pages.reports.all_data.shift_data_burner', compact('data','user'));
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
        $data_id = BurnerSystem::with('users')->where('id', $id)->first();
        return view('pages.BurnerSystem.edit', compact('data_id', 'users','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

        return redirect()->route('burner_system.index')->with('success', 'Data Updated Successfully');
        
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
        $reports = BurnerSystem::with(['users','status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->orderBy('tanggal_update','desc')->get();
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
            ->loadView('prints.data_burner_shift', [
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
            ->setPaper('a4', 'landscape')
            ->loadView('prints.one_report_burner', [
                'img' => $img,
                'date_now' => $date_now,
                'reports' => $reports,
                'date' => date('d-m-Y'),
            ]);

        // return $pdf->stream();
        return $pdf->stream();
    }

    public function all_view_burner()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = BurnerSystem::with(['users','status_equipments'])->orderBy('tanggal_update','desc')->get();

        return view('pages.reports.all_data.all_data_burner', compact('data','user'));
    }
}
