<?php

namespace App\Http\Controllers;


use App\Models\BurnerSystem;
use App\Models\CoBoiler;
use App\Models\CoCommon;
use App\Models\CoTurbine;
use App\Models\EdgSystem;
use App\Models\Fw_Pump;
use App\Models\Hp_Pump;
use App\Models\HsdLevel;
use App\Models\Leader;
use App\Models\Sootblower;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $mon = Carbon::now()->isoFormat('MMMM Y');

        $db = BurnerSystem::with('users')->latest()->take(1)->get();
        $dsbl = Sootblower::with('users')->latest()->take(1)->get();
        $dfp = Fw_Pump::with('users')->latest()->take(1)->get();
        $dhp = Hp_Pump::with('users')->latest()->take(1)->get();
        $dhsd = HsdLevel::with('users')->latest()->take(1)->get();
        $de = EdgSystem::with('users')->latest()->take(1)->get();
        $dcot = CoTurbine::with('users')->latest()->take(1)->get();
        $dcob = CoBoiler::with('users')->latest()->take(1)->get();
        $dcoc = CoCommon::with('users')->latest()->take(1)->get();

        $nburner = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', [1])->count();
        $nsbl = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', [1])->count();
        $nfw = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhp = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhsd = HsdLevel::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nedg = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncb = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nct = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncc = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();

        // ======================

        $burner_e = BurnerSystem::with(['users','status_equipments'])->where('operator_shift', 'Shift E')->whereIn('status_equipment_id', [6,7])->count();
        $burner_f = BurnerSystem::with(['users','status_equipments'])->where('operator_shift', 'Shift F')->whereIn('status_equipment_id', [6,7])->count();
        $burner_g = BurnerSystem::with(['users','status_equipments'])->where('operator_shift', 'Shift G')->whereIn('status_equipment_id', [6,7])->count();
        $burner_h = BurnerSystem::with(['users','status_equipments'])->where('operator_shift', 'Shift H')->whereIn('status_equipment_id', [6,7])->count();

        $sbl_e = Sootblower::with(['users','status_equipments'])->where('operator_shift', 'Shift E')->whereIn('status_equipment_id', [6,7])->count();
        $sbl_f = Sootblower::with(['users','status_equipments'])->where('operator_shift', 'Shift F')->whereIn('status_equipment_id', [6,7])->count();
        $sbl_g = Sootblower::with(['users','status_equipments'])->where('operator_shift', 'Shift G')->whereIn('status_equipment_id', [6,7])->count();
        $sbl_h = Sootblower::with(['users','status_equipments'])->where('operator_shift', 'Shift H')->whereIn('status_equipment_id', [6,7])->count();

        $fp_e = Fw_Pump::with(['users','status_equipments'])->where('operator_shift', 'Shift E')->whereIn('status_equipment_id', [6,7])->count();
        $fp_f = Fw_Pump::with(['users','status_equipments'])->where('operator_shift', 'Shift F')->whereIn('status_equipment_id', [6,7])->count();
        $fp_g = Fw_Pump::with(['users','status_equipments'])->where('operator_shift', 'Shift G')->whereIn('status_equipment_id', [6,7])->count();
        $fp_h = Fw_Pump::with(['users','status_equipments'])->where('operator_shift', 'Shift H')->whereIn('status_equipment_id', [6,7])->count();

        $hp_e = Hp_Pump::with(['users','status_equipments'])->where('operator_shift', 'Shift E')->whereIn('status_equipment_id', [6,7])->count();
        $hp_f = Hp_Pump::with(['users','status_equipments'])->where('operator_shift', 'Shift F')->whereIn('status_equipment_id', [6,7])->count();
        $hp_g = Hp_Pump::with(['users','status_equipments'])->where('operator_shift', 'Shift G')->whereIn('status_equipment_id', [6,7])->count();
        $hp_h = Hp_Pump::with(['users','status_equipments'])->where('operator_shift', 'Shift H')->whereIn('status_equipment_id', [6,7])->count();

        $hsd_e = HsdLevel::with(['users','status_equipments'])->where('operator_shift', 'Shift E')->whereIn('status_equipment_id', [6,7])->count();
        $hsd_f = HsdLevel::with(['users','status_equipments'])->where('operator_shift', 'Shift F')->whereIn('status_equipment_id', [6,7])->count();
        $hsd_g = HsdLevel::with(['users','status_equipments'])->where('operator_shift', 'Shift G')->whereIn('status_equipment_id', [6,7])->count();
        $hsd_h = HsdLevel::with(['users','status_equipments'])->where('operator_shift', 'Shift H')->whereIn('status_equipment_id', [6,7])->count();

        $edg_e = EdgSystem::with(['users, status_equipments'])->where('operator_shift', 'Shift E')->whereIn('status_equipment_id', [6,7])->count();
        $edg_f = EdgSystem::with(['users, status_equipments'])->where('operator_shift', 'Shift F')->whereIn('status_equipment_id', [6,7])->count();
        $edg_g = EdgSystem::with(['users, status_equipments'])->where('operator_shift', 'Shift G')->whereIn('status_equipment_id', [6,7])->count();
        $edg_h = EdgSystem::with(['users, status_equipments'])->where('operator_shift', 'Shift H')->whereIn('status_equipment_id', [6,7])->count();

        $coturbine_e = CoTurbine::with(['users, status_equipments'])->where('operator_shift', 'Shift E')->whereIn('status_equipment_id', [6,7])->count();
        $coturbine_f = CoTurbine::with(['users, status_equipments'])->where('operator_shift', 'Shift F')->whereIn('status_equipment_id', [6,7])->count();
        $coturbine_g = CoTurbine::with(['users, status_equipments'])->where('operator_shift', 'Shift G')->whereIn('status_equipment_id', [6,7])->count();
        $coturbine_h = CoTurbine::with(['users, status_equipments'])->where('operator_shift', 'Shift H')->whereIn('status_equipment_id', [6,7])->count();

        $coboiler_e = CoBoiler::with(['users, status_equipments'])->where('operator_shift', 'Shift E')->whereIn('status_equipment_id', [6,7])->count();
        $coboiler_f = CoBoiler::with(['users, status_equipments'])->where('operator_shift', 'Shift F')->whereIn('status_equipment_id', [6,7])->count();
        $coboiler_g = CoBoiler::with(['users, status_equipments'])->where('operator_shift', 'Shift G')->whereIn('status_equipment_id', [6,7])->count();
        $coboiler_h = CoBoiler::with(['users, status_equipments'])->where('operator_shift', 'Shift H')->whereIn('status_equipment_id', [6,7])->count();

        $cocommon_e = CoCommon::with(['users, status_equipments'])->where('operator_shift', 'Shift E')->whereIn('status_equipment_id', [6,7])->count();
        $cocommon_f = CoCommon::with(['users, status_equipments'])->where('operator_shift', 'Shift F')->whereIn('status_equipment_id', [6,7])->count();
        $cocommon_g = CoCommon::with(['users, status_equipments'])->where('operator_shift', 'Shift G')->whereIn('status_equipment_id', [6,7])->count();
        $cocommon_h = CoCommon::with(['users, status_equipments'])->where('operator_shift', 'Shift H')->whereIn('status_equipment_id', [6,7])->count();

        $tot_e = $burner_e  + $edg_e + $coturbine_e + $coboiler_e + $cocommon_e + $sbl_e + $fp_e + $hp_e + $hsd_e;
        $tot_f = $burner_f  + $edg_f + $coturbine_f + $coboiler_f + $cocommon_f + $sbl_f + $fp_f + $hp_f + $hsd_f;
        $tot_g = $burner_g  + $edg_g + $coturbine_g + $coboiler_g + $cocommon_g + $sbl_g + $fp_g + $hp_g + $hsd_g;
        $tot_h = $burner_h  + $edg_h + $coturbine_h + $coboiler_h + $cocommon_h + $sbl_h + $fp_h + $hp_h + $hsd_h;

        $burner = BurnerSystem::with('users')->whereIn('status_equipment_id', [6,7])->count();
        $sbl = Sootblower::with('users')->whereIn('status_equipment_id', [6,7])->count();
        $fp = Fw_Pump::with('users')->whereIn('status_equipment_id', [6,7])->count();
        $hp = Hp_Pump::with('users')->whereIn('status_equipment_id', [6,7])->count();
        $hsd = HsdLevel::with('users')->whereIn('status_equipment_id', [6,7])->count();
        $edg = EdgSystem::with('users')->whereIn('status_equipment_id', [6,7])->count();
        $cot = CoTurbine::with('users')->whereIn('status_equipment_id', [6,7])->count();
        $cob = CoBoiler::with('users')->whereIn('status_equipment_id', [6,7])->count();
        $coc = CoCommon::with('users')->whereIn('status_equipment_id', [6,7])->count();

        $leaders = Leader::get();

        return view('home', [
            'leaders' => $leaders,
            'nb' => $nburner,
            'nsbl' => $nsbl,
            'nfw' => $nfw,
            'nhp' => $nhp,
            'nhsd' => $nhsd,
            'nedg' => $nedg,
            'ncb' => $ncb,
            'nct' => $nct,
            'ncc' => $ncc,


            'db' => $db,
            'dsbl' => $dsbl,
            'dfp' => $dfp,
            'dhp' => $dhp,
            'dhsd' => $dhsd,
            'de' => $de,
            'dcot' => $dcot,
            'dcob' => $dcob,
            'dcoc' => $dcoc,

            // // ===== ACCUM BURNER
            'tot_e' => $tot_e,
            'tot_f' => $tot_f,
            'tot_g' => $tot_g,
            'tot_h' => $tot_h,

            // // ===== ACCUM LFO

            
            'burner' => $burner,
            'sbl' => $sbl,
            'edg' => $edg,
            'hp' => $hp,
            'fp' => $fp,
            'hsd' => $hsd,
            'edg' => $edg,
            'cot' => $cot,
            'cob' => $cob,
            'coc' => $coc,

            'mon' => $mon,
            'user' => $user,
        ]);
    }
}
