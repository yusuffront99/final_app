<?php

namespace App\Http\Controllers\Admin\CRUD;

use App\Http\Controllers\Controller;
use App\Models\BurnerSystem;
use App\Models\Maintenance;
use App\Models\Sootblower;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class CrudMaintenanceController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $startDate = Carbon::now()->subWeek(); // Mengambil tanggal satu minggu yang lalu
        $endDate = Carbon::now();
        $data_burner = BurnerSystem::where('status_equipment_id', 6)->orderBy('updated_at','desc')->whereBetween('updated_at', [$startDate, $endDate])->count();
        $data_sootblower = Sootblower::where('status_equipment_id', 6)->orderBy('updated_at','desc')->whereBetween('updated_at', [$startDate, $endDate])->count();

        // ============================================
        $tburner_repaired = Maintenance::where('category', 'BURNER SYSTEM')->count();
        $tsootblower_repaired = Maintenance::where('category', 'SOOTBLOWER SYSTEM')->count();
        
        return view('pages.admin.laporan.maintenance.index', [
            'user' => $user,
            'data_burner' => $data_burner,
            'data_sootblower' => $data_sootblower,
            'tburner_repaired' => $tburner_repaired,
            'tsootblower_repaired' => $tsootblower_repaired
        ]);
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

    public function histories()
    {
        $histories = Maintenance::orderBy('created_at','desc')->get();

    
        return view('pages.admin.laporan.maintenance.histories', compact('histories'));
    }

    public function histories_edit($id)
    {
        return view('pages.admin.laporan.maintenance.index');
    }

    public function histories_update(Request $request)
    {

    }

}
