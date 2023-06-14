<?php

namespace App\Http\Controllers\Report\Alls;

use App\Models\EdgSystem;
use App\Models\LfoSystem;
use App\Models\BurnerSystem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AllValidasiController extends Controller
{
    // ============== VALIDASI OP

    public function op_validasi_burner()
    {
        $data = BurnerSystem::with(['users','status_equipments'])->where('status_equipment_id', 1)->orderBy('created_at','asc')->get();
        return view('pages.supervisor.lmasuk_op.all_validasi_burner', compact('data'));
    }

    public function op_validasi_lfo()
    {
        $data = LfoSystem::with(['users','status_equipments', 'forwardings'])->where('status_equipment_id', 1)->orderBy('created_at','asc')->get();
        return view('pages.supervisor.lmasuk_op.all_validasi_lfo', compact('data'));
    }
    public function op_validasi_edg()
    {
        $data = EdgSystem::with(['users','status_equipments'])->where('status_equipment_id', 1)->orderBy('created_at','asc')->get();
        return view('pages.supervisor.lmasuk_op.all_validasi_edg', compact('data'));
    }

    // ============ VALIDASI HAR

    public function har_validasi_burner()
    {
        $data = BurnerSystem::with(['users','status_equipments'])->whereBetween('status_equipment_id', [6,7])->orderBy('created_at','asc')->get();
        return view('pages.supervisor.lmasuk_har.all_validasi_burner', compact('data'));
    }

    public function har_validasi_lfo()
    {
        $data = LfoSystem::with(['users','status_equipments', 'forwardings'])->whereBetween('status_equipment_id', [6,7])->orderBy('created_at','asc')->get();
        return view('pages.supervisor.lmasuk_har.all_validasi_lfo', compact('data'));
    }
    public function har_validasi_edg()
    {
        $data = EdgSystem::with(['users','status_equipments'])->whereBetween('status_equipment_id', [6,7])->orderBy('created_at','asc')->get();
        return view('pages.supervisor.lmasuk_har.all_validasi_edg', compact('data'));
    }
}
