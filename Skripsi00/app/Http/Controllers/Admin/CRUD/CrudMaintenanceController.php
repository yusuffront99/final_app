<?php

namespace App\Http\Controllers\Admin\CRUD;

use App\Http\Controllers\Controller;
use App\Models\BurnerSystem;
use App\Models\Maintenance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CrudMaintenanceController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data_burner = BurnerSystem::where('status_equipment_id', 6)->count();
        $tburner_repaired = Maintenance::count();
        
        return view('pages.admin.laporan.maintenance.index', [
            'user' => $user,
            'data_burner' => $data_burner,
            'tburner_repaired' => $tburner_repaired
        ]);
    }

    // === BURNER
    public function index_burner()
    {
        $data_burner_resolved = BurnerSystem::where('status_equipment_id', 6)->get(); 
        return view('pages.admin.laporan.maintenance.burner.index', compact('data_burner_resolved'));
    }
    public function create()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $code = BurnerSystem::where('status_equipment_id', 6)->get(); 
        return view('pages.admin.laporan.maintenance.burner.create', compact('user', 'code'));
    }

    // === SOOTBLOWER
    // === EDG
    // === CO TURBINE
    // === CO BOILER
    // === CO COMMON
    // === FORWARDING PUMP
    // === HP PUMP
    // === HSD LEVEL

    public function store(Request $request)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request)
    {

    }

    public function delete($id)
    {
        Maintenance::find($id)->delete();
        
        return back();
    }

    public function delete_permanent($id)
    {
        $burner = Maintenance::where('id',$id)->onlyTrashed();
    	$burner->forceDelete();
        return back()->with('success', 'Deleted Data Successfully');
    }

    public function trash()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = Maintenance::with('users')->onlyTrashed()->get();
        return view('pages.admin.laporan.burner.data_trash_burner', compact('data','user'));
    }

}
