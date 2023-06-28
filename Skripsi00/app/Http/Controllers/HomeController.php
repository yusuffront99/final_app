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
        // $dl = LfoSystem::with('users')->latest()->take(1)->get();
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

        // $lfo_e = LfoSystem::with(['users','forwardings','status_equipments'])->where('operator_shift', 'Shift E')->whereIn('status_equipment_id', [6,7])->count();
        // $lfo_f = LfoSystem::with(['users','forwardings','status_equipments'])->where('operator_shift', 'Shift F')->whereIn('status_equipment_id', [6,7])->count();
        // $lfo_g = LfoSystem::with(['users','forwardings','status_equipments'])->where('operator_shift', 'Shift G')->whereIn('status_equipment_id', [6,7])->count();
        // $lfo_h = LfoSystem::with(['users','forwardings','status_equipments'])->where('operator_shift', 'Shift H')->whereIn('status_equipment_id', [6,7])->count();

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

        $tot_e = $burner_e  + $edg_e + $coturbine_e + $coboiler_e + $cocommon_e;
        $tot_f = $burner_f  + $edg_f + $coturbine_f + $coboiler_f + $cocommon_f;
        $tot_g = $burner_g  + $edg_g + $coturbine_g + $coboiler_g + $cocommon_g;
        $tot_h = $burner_h  + $edg_h + $coturbine_h + $coboiler_h + $cocommon_h;

        $burner = BurnerSystem::with('users')->whereIn('status_equipment_id', [6,7])->count();
        $edg = EdgSystem::with('users')->whereIn('status_equipment_id', [6,7])->count();
        $cot = CoTurbine::with('users')->whereIn('status_equipment_id', [6,7])->count();
        $cob = CoBoiler::with('users')->whereIn('status_equipment_id', [6,7])->count();
        $coc = CoCommon::with('users')->whereIn('status_equipment_id', [6,7])->count();

        return view('home', [
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
            // 'dl' => $dl,
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
            'edg' => $edg,
            'cot' => $cot,
            'cob' => $cob,
            'coc' => $coc,

            'mon' => $mon,
            'user' => $user,
        ]);
    }
}
