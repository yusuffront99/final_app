<?php

namespace App\Http\Controllers\Supervisor;

use App\Models\User;
use App\Models\BurnerSystem;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\CoBoiler;
use App\Models\CoCommon;
use App\Models\CoTurbine;
use App\Models\EdgSystem;
use App\Models\forwarding;
use App\Models\Fw_Pump;
use App\Models\Hp_Pump;
use App\Models\HsdLevel;
use App\Models\Sootblower;
use App\Models\StatusEquipment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SupervisorOpController extends Controller
{
    
    public function supervisor_op()
    {

        $month = Carbon::now()->isoFormat('MMMM Y');
        $user = User::where('id', Auth::user()->id)->first();

        $burner_notif = BurnerSystem::with('users')->latest()
            ->where('operator_shift', Auth::user()->tim_divisi)
            ->where('status', 'Waiting')
            ->count();

        $data = BurnerSystem::with('users')->latest()
            ->where('operator_shift', Auth::user()->tim_divisi)
            ->where('status', 'Waiting')->get();

        return view('pages.supervisor.operasi.index', [
            'data' => $data,
            'mon' => $month,
            'burner_notif' => $burner_notif,
            'user' => $user
        ]);
    }

    protected function burner_validation($id)
    {
        $nb = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nsbl = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nfw = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhp = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhsd = HsdLevel::with(['users','status_equipment'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nedg = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncb = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nct = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncc = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();

        $user = User::where('id', Auth::user()->id)->first();
        $users = User::get();
        $status_equipments = StatusEquipment::whereIn('id', [2,3,7])->get();
        $data_id = BurnerSystem::with(['users', 'status_equipments'])->where('id', $id)->first();

        return view('pages.supervisor.lmasuk_op.burner.validation_burner', compact('data_id', 'users', 'status_equipments','user','nb','nfw','nhp','nhsd','nedg','nct','ncb','ncc','nsbl'));
    }

    protected function sootblower_validation($id)
    {
        $nb = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nsbl = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nfw = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhp = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhsd = HsdLevel::with(['users','status_equipment'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nedg = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncb = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nct = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncc = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();

        $user = User::where('id', Auth::user()->id)->first();
        $users = User::get();
        $status_equipments = StatusEquipment::whereIn('id', [2,3,7])->get();
        $data_id = Sootblower::with(['users', 'status_equipments'])->where('id', $id)->first();

        return view('pages.supervisor.lmasuk_op.sootblower.validation_sootblower', compact('data_id', 'users', 'status_equipments','user','nb','nfw','nhp','nhsd','nedg','nct','ncb','ncc','nsbl'));
    }

    protected function hsdlevel_validation($id)
    {
        $nb = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nsbl = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nfw = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhp = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhsd = HsdLevel::with(['users','status_equipment'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nedg = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncb = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nct = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncc = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();;


        $users = User::get();
        $user = User::where('id', Auth::user()->id)->first();
        $status_equipments = StatusEquipment::whereIn('id', [2,3,7])->get();
        $data_id = HsdLevel::with(['users', 'status_equipments'])->where('id', $id)->first();

        return view('pages.supervisor.lmasuk_op.lfo_system.hsd_level.validation_hsd', compact('data_id', 'users','status_equipments','user', 'nb','nfw','nhp','nhsd','nedg','nct','ncb','ncc','nsbl'));
    }

    protected function fwpump_validation($id)
    {
        $nb = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nsbl = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nfw = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhp = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhsd = HsdLevel::with(['users','status_equipment'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nedg = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncb = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nct = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncc = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();;


        $users = User::get();
        $user = User::where('id', Auth::user()->id)->first();
        $status_equipments = StatusEquipment::whereIn('id', [2,3,7])->get();
        $data_id = Fw_Pump::with(['users', 'status_equipments'])->where('id', $id)->first();

        return view('pages.supervisor.lmasuk_op.lfo_system.fw_pump.validation_fwp', compact('data_id', 'users','status_equipments','user', 'nb','nfw','nhp','nhsd','nedg','nct','ncb','ncc','nsbl'));
    }

    protected function hppump_validation($id)
    {
        $nb = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nsbl = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nfw = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhp = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhsd = HsdLevel::with(['users','status_equipment'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nedg = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncb = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nct = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncc = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();;


        $users = User::get();
        $user = User::where('id', Auth::user()->id)->first();
        $status_equipments = StatusEquipment::whereIn('id', [2,3,7])->get();
        $data_id = Hp_Pump::with(['users', 'status_equipments'])->where('id', $id)->first();

        return view('pages.supervisor.lmasuk_op.lfo_system.hp_pump.validation_hpp', compact('data_id', 'users','status_equipments','user', 'nb','nfw','nhp','nhsd','nedg','nct','ncb','ncc','nsbl'));
    }


    protected function edg_validation($id)
    {
        $nb = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nsbl = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nfw = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhp = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhsd = HsdLevel::with(['users','status_equipment'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nedg = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncb = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nct = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncc = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();

        $user = User::where('id', Auth::user()->id)->first();
        $users = User::get();
        $status_equipments = StatusEquipment::whereIn('id', [2,3,7])->get();
        $data_id = EdgSystem::with('users')->where('id', $id)->first();

        return view('pages.supervisor.lmasuk_op.edg.validation_edg', compact('data_id', 'users','status_equipments','user', 'nb','nfw','nhp','nhsd','nedg','nct','ncb','ncc','nsbl'));
    }

    protected function coturbine_validation($id)
    {
        $nb = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nsbl = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nfw = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhp = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhsd = HsdLevel::with(['users','status_equipment'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nedg = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncb = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nct = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncc = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();

        $user = User::where('id', Auth::user()->id)->first();
        $users = User::get();
        $status_equipments = StatusEquipment::whereIn('id', [2,3,7])->get();
        $data_id = CoTurbine::with('users')->where('id', $id)->first();

        return view('pages.supervisor.lmasuk_op.co_turbine.validation_coturbine', compact('data_id', 'users','status_equipments','user', 'nb','nfw','nhp','nhsd','nedg','nct','ncb','ncc','nsbl'));
    }

    protected function coboiler_validation($id)
    {
        $nb = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nsbl = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nfw = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhp = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhsd = HsdLevel::with(['users','status_equipment'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nedg = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncb = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nct = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncc = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();

        $user = User::where('id', Auth::user()->id)->first();
        $users = User::get();
        $status_equipments = StatusEquipment::whereIn('id', [2,3,7])->get();
        $data_id = CoBoiler::with('users')->where('id', $id)->first();

        return view('pages.supervisor.lmasuk_op.co_boiler.validation_coboiler', compact('data_id', 'users','status_equipments','user', 'nb','nfw','nhp','nhsd','nedg','nct','ncb','ncc','nsbl'));
    }

    protected function cocommon_validation($id)
    {
        $nb = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nsbl = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nfw = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhp = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhsd = HsdLevel::with(['users','status_equipment'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nedg = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncb = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nct = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncc = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();

        $user = User::where('id', Auth::user()->id)->first();
        $users = User::get();
        $status_equipments = StatusEquipment::whereIn('id', [2,3,7])->get();
        $data_id = CoCommon::with('users')->where('id', $id)->first();

        return view('pages.supervisor.lmasuk_op.co_common.validation_cocommon', compact('data_id', 'users','status_equipments','user', 'nb','nfw','nhp','nhsd','nedg','nct','ncb','ncc','nsbl'));
    }

    protected function burner_updated(Request $request)
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
        $update->ket_burner1 = $request->get('ket_burner1');
        $update->ket_burner2 = $request->get('ket_burner2');
        $update->ket_burner3 = $request->get('ket_burner3');
        $update->ket_burner4 = $request->get('ket_burner4');
        $update->status_burner1 = $request->get('status_burner1');
        $update->status_burner2 = $request->get('status_burner2');
        $update->status_burner3 = $request->get('status_burner3');
        $update->status_burner4 = $request->get('status_burner4');
        $update->status_equipment_id = $request->get('status_equipment_id');
        $update->catatan = $request->get('catatan');

        $update->save();

        return redirect()->route('lmasuk.op.burner')->with('success', 'Updated Data Successfully');
    }

    protected function sootblower_updated(Request $request)
    {
        $update = Sootblower::with('users')->where('id', $request->id)->first();

        //uuid pake yang sebelumnya
        $update->id = $update->id;

        $update->user_id = $request->get('user_id');
        $update->operator_shift = $request->get('operator_shift');
        $update->atasan = $request->get('atasan');
        $update->unit = $request->get('unit');
        $update->tanggal_update = $request->get('tanggal_update');
        $update->jam_update = $request->get('jam_update');
        $update->status_sbl1 = $request->get('status_sbl1');
        $update->status_sbl2 = $request->get('status_sbl2');
        $update->status_sbl3 = $request->get('status_sbl3');
        $update->status_sbl4 = $request->get('status_sbl4');
        $update->status_sbl5 = $request->get('status_sbl5');
        $update->status_sbl6 = $request->get('status_sbl6');
        $update->status_sbl7 = $request->get('status_sbl7');
        $update->status_sbl8 = $request->get('status_sbl8');
        $update->status_sbl9 = $request->get('status_sbl9');
        $update->status_sbl10 = $request->get('status_sbl10');
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
        $update->catatan_spv = $request->get('catatan_spv');

        $update->save();

        return redirect()->route('lmasuk.op.sootblower')->with('success', 'Updated Data Successfully');
    }

    protected function hsdlevel_updated(Request $request)
    {
    
        $update = HsdLevel::with('users')->where('id', $request->id)->first();

        $update->id = $update->id;

        $update->user_id = $request->get('user_id');
        $update->operator_shift = $request->get('operator_shift');
        $update->storage_level = $request->get('storage_level');
        $update->daily_level = $request->get('daily_level');
        $update->status = $request->get('status');
        $update->status_equipment_id = $request->get('status_equipment_id');
        $update->info_hsd = $request->get('info_hsd');
        $update->catatan_spv = $request->get('catatan_spv');
        $update->save();

        return redirect()->route('lmasuk.op.hsdlevel')->with('success', 'Updated Data Successfully');
        
    }

    protected function fwpump_updated(Request $request)
    {
        $update = Fw_Pump::with('users')->where('id', $request->id)->first();

        $update->id = $update->id;

        $update->user_id = $request->get('user_id');
        $update->operator_kedua = $request->get('operator_kedua');
        $update->atasan = $request->get('atasan');
        $update->tanggal_update = $request->get('tanggal_update');
        $update->jam_update = $request->get('jam_update');
        $update->arus_FP_A = $request->get('arus_FP_A');
        $update->arus_FP_B = $request->get('arus_FP_A');
        $update->press_FP_A = $request->get('press_FP_A');
        $update->press_FP_B = $request->get('press_FP_A');
        $update->status_FP_A = $request->get('status_FP_A');
        $update->status_FP_B = $request->get('status_FP_B');
        $update->info_FP = $request->get('info_FP');
        // $update->DP_High = $request->get('DP_High');
        $update->status_equipment_id = $request->get('status_equipment_id');
        $update->catatan = $request->get('catatan');
        $update->save();

        return redirect()->route('lmasuk.op.fwpump')->with('success', 'Updated Data Successfully');
    }

    protected function hppump_updated(Request $request)
    {
        $update = Hp_Pump::with('users')->where('id', $request->id)->first();

        $update->id = $update->id;

        $update->user_id = $request->get('user_id');
        $update->operator_kedua = $request->get('operator_kedua');
        $update->atasan = $request->get('atasan');
        $update->unit = $request->get('unit');
        $update->tanggal_update = $request->get('tanggal_update');
        $update->jam_update = $request->get('jam_update');
        $update->arus_HP_A = $request->get('arus_HP_A');
        $update->arus_HP_B = $request->get('arus_HP_A');
        $update->press_HP_A = $request->get('press_HP_A');
        $update->press_HP_B = $request->get('press_HP_A');
        $update->status_HP_A = $request->get('status_HP_A');
        $update->status_HP_B = $request->get('status_HP_B');
        $update->info_HP = $request->get('info_HP');
        $update->DP_High = $request->get('DP_High');
        $update->status_equipment_id = $request->get('status_equipment_id');
        $update->catatan = $request->get('catatan');
        $update->save();

        return redirect()->route('lmasuk.op.hppump')->with('success', 'Updated Data Successfully');
    }

    protected function edg_updated(Request $request)
    {
        $update = EdgSystem::with('users')->where('id', $request->id)->first();

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

        return redirect()->route('lmasuk.op.edg')->with('success', 'Updated Data Successfully');
    }

    public function coturbine_updated(Request $request)
    {
        $update = CoTurbine::with('users')->where('id', $request->id)->first();

        //uuid pake yang sebelumnya
        $update->id = $update->id;

        $update->user_id = $request->get('user_id');
        $update->operator_shift = $request->get('operator_shift');
        $update->nama_peralatan = $request->get('nama_peralatan');
        $update->unit = $request->get('unit');
        $update->operasi_awal = Str::upper($request->get('operasi_awal'));
        $update->rencana_operasi = Str::upper($request->get('rencana_operasi'));
        $update->operasi_akhir = Str::upper($request->get('operasi_akhir'));
        $update->status_kegiatan = $request->get('status_kegiatan');
        $update->status_peralatan = $request->get('status_peralatan');
        $update->status_equipment_id = $request->get('status_equipment_id');
        $update->keterangan = $request->get('keterangan');
        $update->catatan = $request->get('catatan');

        $update->save();

        return redirect()->route('lmasuk.op.coturbine')->with('success', 'Data Updated Successfully');
    }

    public function coboiler_updated(Request $request)
    {
        $update = CoBoiler::with('users')->where('id', $request->id)->first();

        //uuid pake yang sebelumnya
        $update->id = $update->id;

        $update->user_id = $request->get('user_id');
        $update->operator_shift = $request->get('operator_shift');
        $update->nama_peralatan = $request->get('nama_peralatan');
        $update->unit = $request->get('unit');
        $update->operasi_awal = Str::upper($request->get('operasi_awal'));
        $update->rencana_operasi = Str::upper($request->get('rencana_operasi'));
        $update->operasi_akhir = Str::upper($request->get('operasi_akhir'));
        $update->status_kegiatan = $request->get('status_kegiatan');
        $update->status_peralatan = $request->get('status_peralatan');
        $update->status_equipment_id = $request->get('status_equipment_id');
        $update->keterangan = $request->get('keterangan');
        $update->catatan = $request->get('catatan');

        $update->save();

        return redirect()->route('lmasuk.op.coboiler')->with('success', 'Data Updated Successfully');
    }

    public function cocommon_updated(Request $request)
    {
        $update = CoCommon::with('users')->where('id', $request->id)->first();

        //uuid pake yang sebelumnya
        $update->id = $update->id;

        $update->user_id = $request->get('user_id');
        $update->operator_shift = $request->get('operator_shift');
        $update->nama_peralatan = $request->get('nama_peralatan');
        $update->unit = $request->get('unit');
        $update->operasi_awal = Str::upper($request->get('operasi_awal'));
        $update->rencana_operasi = Str::upper($request->get('rencana_operasi'));
        $update->operasi_akhir = Str::upper($request->get('operasi_akhir'));
        $update->status_kegiatan = $request->get('status_kegiatan');
        $update->status_peralatan = $request->get('status_peralatan');
        $update->status_equipment_id = $request->get('status_equipment_id');
        $update->keterangan = $request->get('keterangan');
        $update->catatan = $request->get('catatan');

        $update->save();

        return redirect()->route('lmasuk.op.cocommon')->with('success', 'Data Updated Successfully');
    }

    // ==============
    public function all_burner_validation()
    {
        $nb = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nsbl = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nfw = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhp = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhsd = HsdLevel::with(['users','status_equipment'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nedg = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncb = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nct = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncc = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();

        $user = User::where('id', Auth::user()->id)->first();
        $data = BurnerSystem::where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->where('operator_shift', Auth::user()->tim_divisi)->latest()->get();
        return view('pages.supervisor.lmasuk_op.burner.all_validasi_burner', compact('data','user','nb','nfw','nhp','nhsd','nedg','nct','ncb','ncc','nsbl'));
    }

    public function all_sootblower_validation()
    {
        $nb = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nsbl = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nfw = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhp = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhsd = HsdLevel::with(['users','status_equipment'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nedg = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncb = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nct = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncc = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();

        $user = User::where('id', Auth::user()->id)->first();
        $data = Sootblower::where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->where('operator_shift', Auth::user()->tim_divisi)->latest()->get();
        return view('pages.supervisor.lmasuk_op.sootblower.all_validasi_sootblower', compact('data','user','nb','nfw','nhp','nhsd','nedg','nct','ncb','ncc','nsbl'));
    }

    public function all_fwpump_validation()
    {
        $nb = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nsbl = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nfw = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhp = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhsd = HsdLevel::with(['users','status_equipment'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nedg = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncb = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nct = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncc = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();

        $user = User::where('id', Auth::user()->id)->first();
        $data = Fw_Pump::where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->where('operator_shift', Auth::user()->tim_divisi)->latest()->get();
        return view('pages.supervisor.lmasuk_op.lfo_system.fw_pump.all_validasi_fwp', compact('data','user','nb','nfw','nhp','nhsd','nedg','nct','ncb','ncc','nsbl'));
    }

    public function all_hppump_validation()
    {
        $nb = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nsbl = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nfw = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhp = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhsd = HsdLevel::with(['users','status_equipment'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nedg = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncb = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nct = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncc = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();

        $user = User::where('id', Auth::user()->id)->first();
        $data = Hp_Pump::where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->where('operator_shift', Auth::user()->tim_divisi)->latest()->get();
        return view('pages.supervisor.lmasuk_op.lfo_system.hp_pump.all_validasi_hpp', compact('data','user','nb','nfw','nhp','nhsd','nedg','nct','ncb','ncc','nsbl'));
    }

    public function all_edg_validation()
    {
        $nb = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nsbl = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nfw = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhp = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhsd = HsdLevel::with(['users','status_equipment'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nedg = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncb = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nct = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncc = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();

        $user = User::where('id', Auth::user()->id)->first();
        $data = EdgSystem::where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->where('operator_shift', Auth::user()->tim_divisi)->latest()->get();
        return view('pages.supervisor.lmasuk_op.edg.all_validasi_edg', compact('data','user','nb','nfw','nhp','nhsd','nedg','nct','ncb','ncc','nsbl'));
    }

    public function all_coturbine_validation()
    {
        $nb = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nsbl = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nfw = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhp = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhsd = HsdLevel::with(['users','status_equipment'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nedg = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncb = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nct = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncc = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();

        $user = User::where('id', Auth::user()->id)->first();
        $data = CoTurbine::where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->where('operator_shift', Auth::user()->tim_divisi)->latest()->get();
        return view('pages.supervisor.lmasuk_op.co_turbine.all_validasi_coturbine', compact('data','user','nb','nfw','nhp','nhsd','nedg','nct','ncb','ncc','nsbl'));
    }

    public function all_coboiler_validation()
    {
        $nb = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nsbl = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nfw = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhp = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhsd = HsdLevel::with(['users','status_equipment'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nedg = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncb = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nct = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncc = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();

        $user = User::where('id', Auth::user()->id)->first();
        $data = CoBoiler::where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->where('operator_shift', Auth::user()->tim_divisi)->latest()->get();
        return view('pages.supervisor.lmasuk_op.co_boiler.all_validasi_coboiler', compact('data','user','nb','nfw','nhp','nhsd','nedg','nct','ncb','ncc','nsbl'));
    }

    public function all_cocommon_validation()
    {
        $nb = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nsbl = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nfw = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhp = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhsd = HsdLevel::with(['users','status_equipment'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nedg = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncb = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nct = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncc = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();

        $user = User::where('id', Auth::user()->id)->first();
        $data = CoCommon::where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->where('operator_shift', Auth::user()->tim_divisi)->latest()->get();
        return view('pages.supervisor.lmasuk_op.co_common.all_validasi_cocommon', compact('data','user','nb','nfw','nhp','nhsd','nedg','nct','ncb','ncc','nsbl'));
    }


    // ========================

    public function burner_data_shift()
    {
        $nb = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nsbl = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nfw = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhp = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhsd = HsdLevel::with(['users','status_equipment'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nedg = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncb = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nct = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncc = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();

        $user = User::where('id', Auth::user()->id)->first();
        $data = BurnerSystem::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id', [6,7])->get();
        return view('pages.reports.all_data.all_data_burner', compact('data','user','nb','nfw','nhp','nhsd','nedg','nct','ncb','ncc','nsbl'));
    }

    public function fwpump_data_shift()
    {
        $nb = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nsbl = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nfw = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhp = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhsd = HsdLevel::with(['users','status_equipment'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nedg = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncb = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nct = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncc = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();

        $user = User::where('id', Auth::user()->id)->first();
        $data = Fw_Pump::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id', [6,7])->get();
        return view('pages.supervisor.lmasuk_op.lfo_system.fw_pump.all_validasi_fwp', compact('data','user','nb','nfw','nhp','nhsd','nedg','nct','ncb','ncc','nsbl'));
    }

    public function hppump_data_shift()
    {
        $nb = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nsbl = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nfw = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhp = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhsd = HsdLevel::with(['users','status_equipment'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nedg = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncb = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nct = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncc = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();

        $user = User::where('id', Auth::user()->id)->first();
        $data = Fw_Pump::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id', [6,7])->get();
        return view('pages.supervisor.lmasuk_op.lfo_system.hp_pump.all_validasi_hpp', compact('data','user','nb','nfw','nhp','nhsd','nedg','nct','ncb','ncc','nsbl'));
    }

    public function edg_data_shift()
    {
        $nb = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nsbl = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nfw = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhp = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhsd = HsdLevel::with(['users','status_equipment'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nedg = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncb = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nct = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncc = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();

        $user = User::where('id', Auth::user()->id)->first();
        $data = EdgSystem::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id', [6,7])->get();
        return view('pages.reports.all_data.all_data_edg', compact('data','user','nb','nfw','nhp','nhsd','nedg','nct','ncb','ncc','nsbl'));
    }


    public function coturbine_data_shift()
    {
        $nb = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nsbl = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nfw = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhp = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhsd = HsdLevel::with(['users','status_equipment'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nedg = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncb = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nct = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncc = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();

        $user = User::where('id', Auth::user()->id)->first();
        $data = CoTurbine::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id', [6,7])->get();
        return view('pages.reports.all_data.all_data_coturbine', compact('data','user','nb','nfw','nhp','nhsd','nedg','nct','ncb','ncc','nsbl'));
    }

    public function coboiler_data_shift()
    {
        $nb = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nsbl = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nfw = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhp = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhsd = HsdLevel::with(['users','status_equipment'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nedg = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncb = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nct = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncc = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();

        $user = User::where('id', Auth::user()->id)->first();
        $data = CoBoiler::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id', [6,7])->get();
        return view('pages.reports.all_data.all_data_coboiler', compact('data','user','nb','nfw','nhp','nhsd','nedg','nct','ncb','ncc','nsbl'));
    }

    public function cocommon_data_shift()
    {
        $nb = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nsbl = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nfw = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhp = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nhsd = HsdLevel::with(['users','status_equipment'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nedg = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncb = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $nct = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();
        $ncc = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', Auth::user()->tim_divisi)->where('status_equipment_id', 1)->count();

        $user = User::where('id', Auth::user()->id)->first();
        $data = CoCommon::where('operator_shift', Auth::user()->tim_divisi)->whereIn('status_equipment_id', [6,7])->get();
        return view('pages.reports.all_data.all_data_cocommon', compact('data','user','nb','nfw','nhp','nhsd','nedg','nct','ncb','ncc','nsbl'));
    }
}
