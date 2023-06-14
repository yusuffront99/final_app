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
use App\Models\Fw_Pump;
use App\Models\Hp_Pump;
use App\Models\HsdLevel;
use App\Models\StatusEquipment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class SupervisorHarController extends Controller
{
    public function index()
    {
        $month = Carbon::now()->isoFormat('MMMM Y');
        $user = User::where('id', Auth::user()->id)->first();

        $wb =BurnerSystem::with('users')->whereIn('status_equipment_id', [2,4,5])->count();
        $wfp = Fw_Pump::with('users')->whereIn('status_equipment_id', [2,4,5])->count();
        $whp = Hp_Pump::with('users')->whereIn('status_equipment_id', [2,4,5])->count();
        $we= EdgSystem::with('users')->whereIn('status_equipment_id', [2,4,5])->count();
        $wcot= CoTurbine::with('users')->whereIn('status_equipment_id', [2,4,5])->count();
        $wcob= CoBoiler::with('users')->whereIn('status_equipment_id', [2,4,5])->count();
        $wcoc= CoCommon::with('users')->whereIn('status_equipment_id', [2,4,5])->count();
        // // $waiting_bsd =::with('users')->latest()->where('status', 'Forwarding')->count();

        $data = BurnerSystem::with('users')->latest()->where('status_equipment_id', 2)->get();

        return view('pages.supervisor.lmasuk_har.lmasuk_har', compact('wb','wfp','whp','we','wcot','wcob','wcoc','data','user'));
    }

    protected function burner_validation($id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $users = User::get();
        $data_id = BurnerSystem::with('users')->where('id', $id)->first();
        $status_equipments = StatusEquipment::whereIn('id', [4,5,6])->get();

        return view('pages.supervisor.lmasuk_har.burner.validation_burner', compact('data_id', 'users','status_equipments','user'));
    }

    protected function hsdlevel_validation($id)
    {
        $users = User::get();
        $user = User::where('id', Auth::user()->id)->first();
        $data_id = HsdLevel::with('users')->where('id', $id)->first();
        $status_equipments = StatusEquipment::whereIn('id', [4,5,6])->get();

        return view('pages.supervisor.lmasuk_har.hsdlevel.validation_hsdlevel', compact('data_id', 'users','status_equipments','user'));
    }

    protected function fwpump_validation($id)
    {
        $users = User::get();
        $user = User::where('id', Auth::user()->id)->first();
        $data_id = Fw_Pump::with('users')->where('id', $id)->first();
        $status_equipments = StatusEquipment::whereIn('id', [4,5,6])->get();

        return view('pages.supervisor.lmasuk_har.fw_pump.validation_fwpump', compact('data_id', 'users','status_equipments','user'));
    }

    protected function hppump_validation($id)
    {
        $users = User::get();
        $user = User::where('id', Auth::user()->id)->first();
        $data_id = Hp_Pump::with('users')->where('id', $id)->first();
        $status_equipments = StatusEquipment::whereIn('id', [4,5,6])->get();

        return view('pages.supervisor.lmasuk_har.hp_pump.validation_hppump', compact('data_id', 'users','status_equipments','user'));
    }

    protected function edg_validation($id)
    {
        $users = User::get();
        $user = User::where('id', Auth::user()->id)->first();
        $data_id = EdgSystem::with('users')->where('id', $id)->first();
        $status_equipments = StatusEquipment::whereIn('id', [4,5,6])->get();

        return view('pages.supervisor.lmasuk_har.edg.validation_edg', compact('data_id', 'users','status_equipments','user'));
    }

    protected function coturbine_validation($id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $users = User::get();
        $data_id = CoTurbine::with('users')->where('id', $id)->first();
        $status_equipments = StatusEquipment::whereIn('id', [4,5,6])->get();

        return view('pages.supervisor.lmasuk_har.coturbine.validation_coturbine', compact('data_id', 'users','status_equipments','user'));
    }

    protected function coboiler_validation($id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $users = User::get();
        $data_id = CoBoiler::with('users')->where('id', $id)->first();
        $status_equipments = StatusEquipment::whereIn('id', [4,5,6])->get();

        return view('pages.supervisor.lmasuk_har.coboiler.validation_coboiler', compact('data_id', 'users','status_equipments','user'));
    }

    protected function cocommon_validation($id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $users = User::get();
        $data_id = CoCommon::with('users')->where('id', $id)->first();
        $status_equipments = StatusEquipment::whereIn('id', [4,5,6])->get();

        return view('pages.supervisor.lmasuk_har.cocommon.validation_cocommon', compact('data_id', 'users','status_equipments','user'));
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

        return redirect()->route('lmasuk.har.burner')->with('success', 'Updated Data Successfully');;
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

        return redirect()->route('lmasuk.har.hsdlevel')->with('success', 'Updated Data Successfully');

    }

    protected function fwpump_updated(Request $request)
    {
        $update = Fw_Pump::with('users')->where('id', $request->id)->first();

        $update->id = $update->id;

        $update->user_id = $request->get('user_id');
        $update->operator_kedua = $request->get('operator_kedua');
        $update->operator_shift = $request->get('operator_shift');
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
        $update->status_equipment_id = $request->get('status_equipment_id');
        $update->catatan = $request->get('catatan');
        $update->save();

        return redirect()->route('lmasuk.har.fwpump')->with('success', 'Updated Data Successfully');
    }

    protected function hppump_updated(Request $request)
    {
        $update = Hp_Pump::with('users')->where('id', $request->id)->first();

        $update->id = $update->id;

        $update->user_id = $request->get('user_id');
        $update->operator_kedua = $request->get('operator_kedua');
        $update->operator_shift = $request->get('operator_shift');
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

        return redirect()->route('lmasuk.har.hppump')->with('success', 'Updated Data Successfully');
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

        return redirect()->route('lmasuk.har.edg')->with('success', 'Updated Data Successfully');
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

        return redirect()->route('lmasuk.har.coturbine')->with('success', 'Data Updated Successfully');
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

        return redirect()->route('lmasuk.har.coboiler')->with('success', 'Data Updated Successfully');
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

        return redirect()->route('lmasuk.har.cocommon')->with('success', 'Data Updated Successfully');
    }

    // ==============

    public function all_burner_validation()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = BurnerSystem::whereIn('status_equipment_id', [2,4,5])->get();
        return view('pages.supervisor.lmasuk_har.burner.all_validasi_burner', compact('data','user'));
    }

    public function all_fwpump_validation()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = Fw_Pump::whereIn('status_equipment_id', [2,4,5])->get();
        return view('pages.supervisor.lmasuk_har.fw_pump.all_validasi_fwpump', compact('data','user'));
    }
    
    public function all_hppump_validation()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = Hp_Pump::whereIn('status_equipment_id', [2,4,5])->get();
        return view('pages.supervisor.lmasuk_har.hp_pump.all_validasi_hppump', compact('data','user'));
    }

    public function all_edg_validation()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = EdgSystem::whereIn('status_equipment_id', [2,4,5])->get();
        return view('pages.supervisor.lmasuk_har.edg.all_validasi_edg', compact('data','user'));
    }

    public function all_coturbine_validation()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = CoTurbine::whereIn('status_equipment_id', [2,4,5])->get();
        return view('pages.supervisor.lmasuk_har.coturbine.all_validasi_coturbine', compact('data','user'));
    }

    public function all_coboiler_validation()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = CoBoiler::whereIn('status_equipment_id', [2,4,5])->get();
        return view('pages.supervisor.lmasuk_har.coboiler.all_validasi_coboiler', compact('data','user'));
    }
    public function all_cocommon_validation()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = CoCommon::whereIn('status_equipment_id', [2,4,5])->get();
        return view('pages.supervisor.lmasuk_har.cocommon.all_validasi_cocommon', compact('data','user'));
    }
}
