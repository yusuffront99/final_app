<?php

namespace App\Http\Controllers\Report\Alls;

use App\Models\BurnerSystem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EdgSystem;
use App\Models\LfoSystem;
use Illuminate\Support\Facades\Auth;

class AllDataController extends Controller
{
    public function burner_data_shift()
    {
        $data = BurnerSystem::where('operator_shift', Auth::user()->orderBy('tanggal_update','asc')->tim_divisi)->get();
        return view('pages.reports.all_data.shift_data_burner', compact('data'));
    }

    public function lfo_data_shift()
    {
        $data = LfoSystem::where('operator_shift', Auth::user()->tim_divisi)->orderBy('tanggal_update','asc')->get();
        return view('pages.reports.all_data.shift_data_lfo', compact('data'));
    }

    public function edg_data_shift()
    {
        $data = EdgSystem::where('operator_shift', Auth::user()->tim_divisi)->orderBy('tanggal_update','asc')->get();
        return view('pages.reports.all_data.shift_data_edg', compact('data'));
    }

    public function laporan_data()
    {
        $burner = BurnerSystem::where('status_equipment_id' ,8)->orWhereBetween('status_equipment_id',[3,4])->count();
        $lfo = LfoSystem::where('status_equipment_id' ,8)->orWhereBetween('status_equipment_id',[3,4])->count();
        $edg = EdgSystem::where('status_equipment_id' ,8)->orWhereBetween('status_equipment_id',[3,4])->count();

        return view('pages.reports.all_data.laporan_data', compact('burner','lfo','edg'));
    }

    public function all_data_burner()
    {
        $data = BurnerSystem::where('status_equipment_id' ,8)->orderBy('tanggal_update','asc')->orWhereBetween('status_equipment_id',[3,4])->get();

        return view('pages.reports.all_data.all_data_burner', compact('data'));
    }

    public function all_data_lfo()
    {
        $data = LfoSystem::where('status_equipment_id' ,8)->orderBy('tanggal_update','asc')->orWhereBetween('status_equipment_id',[3,4])->get();

        return view('pages.reports.all_data.all_data_lfo', compact('data'));
    }

    public function all_data_edg()
    {
        $data = EdgSystem::where('status_equipment_id' ,8)->orderBy('tanggal_update','asc')->orWhereBetween('status_equipment_id',[3,4])->get();

        return view('pages.reports.all_data.all_data_edg', compact('data'));
    }
}
