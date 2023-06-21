<?php

namespace App\Http\Controllers\Supervisor\Laporan;

use App\Models\BurnerSystem;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\CoBoiler;
use App\Models\CoCommon;
use App\Models\CoTurbine;
use App\Models\EdgSystem;
use App\Models\Fw_Pump;
use App\Models\Hp_Pump;
use App\Models\HsdLevel;
use App\Models\Sootblower;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LaporanMasuk extends Controller
{
    public function lmasuk_op_burner()
    {
        $nb = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nedg = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncb = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nct = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhsd = HsdLevel::with(['users','status_equipment'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncc = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nfw = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhp = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
    

        $user = User::where('id', Auth::user()->id)->first();
        $data = BurnerSystem::with(['users', 'status_equipments'])->where('status_equipment_id', 1)->where('operator_shift', Auth::user()->tim_divisi)->latest()->get();
        $mon = Carbon::now()->isoFormat('MMMM Y');
        $totburner = BurnerSystem::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id', [6,7])->count();
        $tothsd = HsdLevel::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id',[6,7])->count();
        $totfw = Fw_Pump::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id', [6,7])->count();
        $tothp = Fw_Pump::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id', [6,7])->count();
        $totedg = EdgSystem::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id', [6,7])->count();

        return view('pages.supervisor.lmasuk_op.burner.lmasuk_burner', 
        compact('data','mon', 'totburner','totedg','totfw','tothp','tothsd','user','nb','nedg','nct','ncb','ncc','nfw','nhp','nhsd'));
    }

    public function lmasuk_op_sootblower()
    {
        $nb = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nsbl = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nedg = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncb = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nct = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhsd = HsdLevel::with(['users','status_equipment'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncc = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nfw = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhp = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
    

        $user = User::where('id', Auth::user()->id)->first();
        $data = Sootblower::with(['users', 'status_equipments'])->where('status_equipment_id', 1)->where('operator_shift', Auth::user()->tim_divisi)->latest()->get();
        $mon = Carbon::now()->isoFormat('MMMM Y');
        $totburner = BurnerSystem::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id', [6,7])->count();
        $totsbl = Sootblower::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id', [6,7])->count();
        $tothsd = HsdLevel::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id',[6,7])->count();
        $totfw = Fw_Pump::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id', [6,7])->count();
        $tothp = Fw_Pump::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id', [6,7])->count();
        $totedg = EdgSystem::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id', [6,7])->count();

        return view('pages.supervisor.lmasuk_op.sootblower.lmasuk_sootblower', 
        compact('data','mon', 'totburner','totsbl','totedg','totfw','tothp','tothsd','user','nb','nsbl','nedg','nct','ncb','ncc','nfw','nhp','nhsd'));
    }


    public function lmasuk_op_hsdlevel()
    {
        $nb = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nedg = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncb = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nct = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhsd = HsdLevel::with(['users','status_equipment'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncc = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nfw = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhp = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
    


        $user = User::where('id', Auth::user()->id)->first();
        $data = HsdLevel::with(['users', 'status_equipments'])->where('status_equipment_id', 1)->where('operator_shift', Auth::user()->tim_divisi)->latest()->get();
        $mon = Carbon::now()->isoFormat('MMMM Y');
        $tothsd = HsdLevel::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id',[6,7])->count();
        $totfw = Fw_Pump::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id', [6,7])->count();
        $tothp = Hp_Pump::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id', [6,7])->count();

        return view('pages.supervisor.lmasuk_op.lfo_system.hsd_level.lmasuk_hsd', compact('data','mon','totfw','tothp','tothsd','user', 'nb','nedg','nct','ncb','ncc','nfw','nhp','nhsd'));
    }

    public function lmasuk_op_fwpump()
    {
        $nb = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nedg = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncb = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nct = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhsd = HsdLevel::with(['users','status_equipment'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncc = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nfw = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhp = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
    


        $user = User::where('id', Auth::user()->id)->first();
        $data = Fw_Pump::with(['users', 'status_equipments'])->where('status_equipment_id', 1)->where('operator_shift', Auth::user()->tim_divisi)->latest()->get();
        $mon = Carbon::now()->isoFormat('MMMM Y');
        $tothsd = HsdLevel::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id',[6,7])->count();
        $totfw = Fw_Pump::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id', [6,7])->count();
        $tothp = Hp_Pump::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id', [6,7])->count();

        return view('pages.supervisor.lmasuk_op.lfo_system.fw_pump.lmasuk_fwp', compact('data','mon','totfw','tothp','tothsd','user', 'nb','nedg','nct','ncb','ncc','nfw','nhp','nhsd'));
    }

    public function lmasuk_op_hppump()
    {
        $nb = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nedg = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncb = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nct = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhsd = HsdLevel::with(['users','status_equipment'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncc = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nfw = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhp = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
    


        $user = User::where('id', Auth::user()->id)->first();
        $data = Hp_Pump::with(['users', 'status_equipments'])->where('status_equipment_id', 1)->where('operator_shift', Auth::user()->tim_divisi)->latest()->get();
        $mon = Carbon::now()->isoFormat('MMMM Y');
        $tothsd = HsdLevel::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id',[6,7])->count();
        $totfw = Fw_Pump::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id', [6,7])->count();
        $tothp = Hp_Pump::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id', [6,7])->count();

        return view('pages.supervisor.lmasuk_op.lfo_system.hp_pump.lmasuk_hpp', compact('data','mon','totfw','tothp','tothsd','user', 'nb','nedg','nct','ncb','ncc','nfw','nhp','nhsd'));
    }


    public function lmasuk_op_edg()
    {
        $nb = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nedg = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncb = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nct = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhsd = HsdLevel::with(['users','status_equipment'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncc = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nfw = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhp = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
    

        $user = User::where('id', Auth::user()->id)->first();
        $data = EdgSystem::with(['users', 'status_equipments'])->where('status_equipment_id', 1)->where('operator_shift', Auth::user()->tim_divisi)->get();
        $mon = Carbon::now()->isoFormat('MMMM Y');
        $totburner = BurnerSystem::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id', [6,7])->count();
        $tothsd = HsdLevel::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id',[6,7])->count();
        $totfw = Fw_Pump::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id', [6,7])->count();
        $tothp = Hp_Pump::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id', [6,7])->count();
        $totedg = EdgSystem::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id', [6,7])->count();

        return view('pages.supervisor.lmasuk_op.edg.lmasuk_edg', compact('data','mon', 'totburner','totedg','totfw','tothp','tothsd','user','nb','nedg','nct','ncb','ncc','nfw','nhp','nhsd'));
    }

    public function lmasuk_op_coturbine()
    {
        $nb = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nedg = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncb = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nct = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhsd = HsdLevel::with(['users','status_equipment'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncc = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nfw = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhp = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
    

        $user = User::where('id', Auth::user()->id)->first();
        $data = CoTurbine::with(['users', 'status_equipments'])->where('status_equipment_id', 1)->where('operator_shift', Auth::user()->tim_divisi)->get();
        $mon = Carbon::now()->isoFormat('MMMM Y');
        $totcot = CoTurbine::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id', [6,7])->count();
        $totcob = CoBoiler::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id', [6,7])->count();
        $totcoc = CoCommon::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id', [6,7])->count();

        return view('pages.supervisor.lmasuk_op.co_turbine.lmasuk_coturbine', compact('data','mon', 'totcob','totcot','totcoc','user','nb','nedg','nct','ncb','ncc','nfw','nhp','nhsd'));
    }
    
    public function lmasuk_op_coboiler()
    {
        $nb = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nedg = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncb = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nct = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhsd = HsdLevel::with(['users','status_equipment'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncc = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nfw = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhp = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
    

        $notif_cb = CoBoiler::with(['users', 'status_equipments'])->where('status_equipment_id', 1)->count();
        $user = User::where('id', Auth::user()->id)->first();
        $data = CoBoiler::with(['users', 'status_equipments'])->where('status_equipment_id', 1)->where('operator_shift', Auth::user()->tim_divisi)->get();
        $mon = Carbon::now()->isoFormat('MMMM Y');
        $totcot = CoTurbine::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id', [6,7])->count();
        $totcob = CoBoiler::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id', [6,7])->count();
        $totcoc = CoCommon::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id', [6,7])->count();

        return view('pages.supervisor.lmasuk_op.co_boiler.lmasuk_coboiler', compact('data','mon', 'totcob','totcot','totcoc','user', 'nb','nedg','nct','ncb','ncc','nfw','nhp','nhsd'));
    }

    public function lmasuk_op_cocommon()
    {
        $nb = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nedg = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncb = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nct = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhsd = HsdLevel::with(['users','status_equipment'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncc = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nfw = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhp = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
    

        $user = User::where('id', Auth::user()->id)->first();
        $data = CoCommon::with(['users', 'status_equipments'])->where('status_equipment_id', 1)->where('operator_shift', Auth::user()->tim_divisi)->get();
        $mon = Carbon::now()->isoFormat('MMMM Y');
        $totcot = CoTurbine::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id', [6,7])->count();
        $totcob = CoBoiler::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id', [6,7])->count();
        $totcoc = CoCommon::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id', [6,7])->count();

        return view('pages.supervisor.lmasuk_op.co_common.lmasuk_cocommon', compact('data','mon', 'totcob','totcot','totcoc','user','nb','nedg','nct','ncb','ncc','nfw','nhp','nhsd'));
    }



    // ================= HAR
    public function lmasuk_har_burner()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = BurnerSystem::with(['users', 'status_equipments'])->whereIn('status_equipment_id', [2,4,5])->latest()->get();
        $mon = Carbon::now()->isoFormat('MMMM Y');

        $wf = BurnerSystem::where('status_equipment_id', 2)->count();
        $wr = BurnerSystem::where('status_equipment_id', 5)->count();
        $wmr = BurnerSystem::where('status_equipment_id', 4)->count();
        $rr = BurnerSystem::where('status_equipment_id', 6)->count();

        return view('pages.supervisor.lmasuk_har.burner.lmasuk_burner', compact('data','mon','wr', 'wmr','wf', 'rr','user'));
    }

    public function lmasuk_har_hsdlevel()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = HsdLevel::with(['users', 'status_equipments'])->whereIn('status_equipment_id', [2,4,5])->latest()->get();
        $mon = Carbon::now()->isoFormat('MMMM Y');

        $wf = HsdLevel::where('status_equipment_id', 2)->count();
        $wr = HsdLevel::where('status_equipment_id', 5)->count();
        $wmr = HsdLevel::where('status_equipment_id', 4)->count();
        $rr = HsdLevel::where('status_equipment_id', 6)->count();

        return view('pages.supervisor.lmasuk_har.hsdlevel.lmasuk_hsdlevel', compact('data','mon', 'wr', 'wmr','wf', 'rr','user'));
    }

    public function lmasuk_har_fwpump()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = Fw_Pump::with(['users', 'status_equipments'])->whereIn('status_equipment_id', [2,4,5])->latest()->get();
        $mon = Carbon::now()->isoFormat('MMMM Y');

        $wf = Fw_Pump::where('status_equipment_id', 2)->count();
        $wr = Fw_Pump::where('status_equipment_id', 5)->count();
        $wmr = Fw_Pump::where('status_equipment_id', 4)->count();
        $rr = Fw_Pump::where('status_equipment_id', 6)->count();

        return view('pages.supervisor.lmasuk_har.fw_pump.lmasuk_fwpump', compact('data','mon', 'wr', 'wmr','wf', 'rr','user'));
    }

    public function lmasuk_har_hppump()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = Hp_Pump::with(['users', 'status_equipments'])->whereIn('status_equipment_id', [2,4,5])->latest()->get();
        $mon = Carbon::now()->isoFormat('MMMM Y');

        $wf = Hp_Pump::where('status_equipment_id', 2)->count();
        $wr = Hp_Pump::where('status_equipment_id', 5)->count();
        $wmr = Hp_Pump::where('status_equipment_id', 4)->count();
        $rr = Hp_Pump::where('status_equipment_id', 6)->count();

        return view('pages.supervisor.lmasuk_har.hp_pump.lmasuk_hppump', compact('data','mon', 'wr', 'wmr','wf', 'rr','user'));
    }

    public function lmasuk_har_edg()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = EdgSystem::with(['users', 'status_equipments'])->whereIn('status_equipment_id', [2,4,5])->latest()->get();
        $mon = Carbon::now()->isoFormat('MMMM Y');
        
        $wf = EdgSystem::where('status_equipment_id', 2)->count();
        $wr = EdgSystem::where('status_equipment_id', 5)->count();
        $wmr = EdgSystem::where('status_equipment_id', 4)->count();
        $rr = EdgSystem::where('status_equipment_id', 6)->count();

        return view('pages.supervisor.lmasuk_har.edg.lmasuk_edg', compact('data','mon', 'wr', 'wmr','wf', 'rr','user'));
    }

    public function lmasuk_har_coturbine()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = CoTurbine::with(['users', 'status_equipments'])->whereIn('status_equipment_id', [2,4,5])->latest()->get();
        $mon = Carbon::now()->isoFormat('MMMM Y');
        
        $wf = CoTurbine::where('status_equipment_id', 2)->count();
        $wr = CoTurbine::where('status_equipment_id', 5)->count();
        $wmr = CoTurbine::where('status_equipment_id', 4)->count();
        $rr = CoTurbine::where('status_equipment_id', 6)->count();

        return view('pages.supervisor.lmasuk_har.coturbine.lmasuk_coturbine', compact('data','mon', 'wr', 'wmr', 'wf','rr','user'));
    }

    public function lmasuk_har_coboiler()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = CoBoiler::with(['users', 'status_equipments'])->whereIn('status_equipment_id', [2,4,5])->latest()->get();
        $mon = Carbon::now()->isoFormat('MMMM Y');
        
        $wf = CoBoiler::where('status_equipment_id', 2)->count();
        $wr = CoBoiler::where('status_equipment_id', 5)->count();
        $wmr = CoBoiler::where('status_equipment_id', 4)->count();
        $rr = CoBoiler::where('status_equipment_id', 6)->count();

        return view('pages.supervisor.lmasuk_har.coboiler.lmasuk_coboiler', compact('data','mon', 'wr', 'wmr','wf', 'rr','user'));
    }
    public function lmasuk_har_cocommon()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = CoCommon::with(['users', 'status_equipments'])->whereIn('status_equipment_id', [2,4,5])->latest()->get();
        $mon = Carbon::now()->isoFormat('MMMM Y');
        
        $wf = CoCommon::where('status_equipment_id', 2)->count();
        $wr = CoCommon::where('status_equipment_id', 5)->count();
        $wmr = CoCommon::where('status_equipment_id', 4)->count();
        $rr = CoCommon::where('status_equipment_id', 6)->count();

        return view('pages.supervisor.lmasuk_har.cocommon.lmasuk_cocommon', compact('data','mon', 'wr', 'wmr','wf', 'rr','user'));
    }


}