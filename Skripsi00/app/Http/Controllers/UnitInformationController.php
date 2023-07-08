<?php

namespace App\Http\Controllers;

use App\Models\AboutEquipment;
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
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnitInformationController extends Controller
{
    public function detail_about_equipment($id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $equipment_id = AboutEquipment::find($id);

        return view('detail_equipment', compact('equipment_id','user'));
    }

    public function unit_information()
    {

        $data = AboutEquipment::get();
        $user = User::where('id', Auth::user()->id)->first();
        $mon = Carbon::now()->isoFormat('MMMM Y');

        // SHIFT E **************************************************************************************************************
        $wa_burner_e = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 1)->count();
        $fw_burner_e = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 2)->count();
        $rj_burner_e = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 3)->count();
        $wo_burner_e = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 4)->count();
        $wm_burner_e = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 5)->count();

        $rs_burner_e = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 6)->count();
        $nm_burner_e = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 7)->count();
        $resolved_burner_e = $rs_burner_e + $nm_burner_e;

        $wa_sbl_e = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 1)->count();
        $fw_sbl_e = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 2)->count();
        $rj_sbl_e = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 3)->count();
        $wo_sbl_e = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 4)->count();
        $wm_sbl_e = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 5)->count();

        $rs_sbl_e = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 6)->count();
        $nm_sbl_e = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 7)->count();
        $resolved_sbl_e = $rs_sbl_e + $nm_sbl_e;

        $wa_edg_e = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 1)->count();
        $fw_edg_e = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 2)->count();
        $rj_edg_e = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 3)->count();
        $wo_edg_e = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 4)->count();
        $wm_edg_e = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 5)->count();

        $rs_edg_e = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 6)->count();
        $nm_edg_e = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 7)->count();
        $resolved_edg_e = $rs_edg_e + $nm_edg_e;

        $wa_hp_e = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 1)->count();
        $fw_hp_e = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 2)->count();
        $rj_hp_e = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 3)->count();
        $wo_hp_e = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 4)->count();
        $wm_hp_e = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 5)->count();

        $rs_hp_e = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 6)->count();
        $nm_hp_e = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 7)->count();
        $resolved_hp_e = $rs_hp_e + $nm_hp_e;
        
        $wa_fp_e = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 1)->count();
        $fw_fp_e = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 2)->count();
        $rj_fp_e = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 3)->count();
        $wo_fp_e = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 4)->count();
        $wm_fp_e = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 5)->count();

        $rs_fp_e = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 6)->count();
        $nm_fp_e = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 7)->count();
        $resolved_fp_e = $rs_fp_e + $nm_fp_e;

        $wa_hsd_e = HsdLevel::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 1)->count();
        $fw_hsd_e = HsdLevel::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 2)->count();
        $rj_hsd_e = HsdLevel::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 3)->count();
        $wo_hsd_e = HsdLevel::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 4)->count();
        $wm_hsd_e = HsdLevel::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 5)->count();

        $rs_hsd_e = HsdLevel::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 6)->count();
        $nm_hsd_e = HsdLevel::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 7)->count();
        $resolved_hsd_e = $rs_hsd_e + $nm_hsd_e;

        $wa_cob_e = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 1)->count();
        $fw_cob_e = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 2)->count();
        $rj_cob_e = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 3)->count();
        $wo_cob_e = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 4)->count();
        $wm_cob_e = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 5)->count();

        $rs_cob_e = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 6)->count();
        $nm_cob_e = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 7)->count();
        $resolved_cob_e = $rs_cob_e + $nm_cob_e;

        $wa_cot_e = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 1)->count();
        $fw_cot_e = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 2)->count();
        $rj_cot_e = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 3)->count();
        $wo_cot_e = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 4)->count();
        $wm_cot_e = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 5)->count();

        $rs_cot_e = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 6)->count();
        $nm_cot_e = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 7)->count();
        $resolved_cot_e = $rs_cot_e + $nm_cot_e;

        $wa_coc_e = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 1)->count();
        $fw_coc_e = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 2)->count();
        $rj_coc_e = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 3)->count();
        $wo_coc_e = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 4)->count();
        $wm_coc_e = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 5)->count();

        $rs_coc_e = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 6)->count();
        $nm_coc_e = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', 'Shift E')->where('status_equipment_id', 7)->count();
        $resolved_coc_e = $rs_coc_e + $nm_coc_e;

         // Shift F **************************************************************************************************************
        // Shift F **************************************************************************************************************
        $wa_burner_f = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 1)->count();
        $fw_burner_f = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 2)->count();
        $rj_burner_f = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 3)->count();
        $wo_burner_f = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 4)->count();
        $wm_burner_f = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 5)->count();

        $rs_burner_f = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 6)->count();
        $nm_burner_f = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 7)->count();
        $resolved_burner_f = $rs_burner_f + $nm_burner_f;

        $wa_sbl_f = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 1)->count();
        $fw_sbl_f = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 2)->count();
        $rj_sbl_f = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 3)->count();
        $wo_sbl_f = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 4)->count();
        $wm_sbl_f = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 5)->count();

        $rs_sbl_f = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 6)->count();
        $nm_sbl_f = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 7)->count();
        $resolved_sbl_f = $rs_sbl_f + $nm_sbl_f;

        $wa_edg_f = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 1)->count();
        $fw_edg_f = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 2)->count();
        $rj_edg_f = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 3)->count();
        $wo_edg_f = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 4)->count();
        $wm_edg_f = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 5)->count();

        $rs_edg_f = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 6)->count();
        $nm_edg_f = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 7)->count();
        $resolved_edg_f = $rs_edg_f + $nm_edg_f;

        $wa_hp_f = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 1)->count();
        $fw_hp_f = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 2)->count();
        $rj_hp_f = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 3)->count();
        $wo_hp_f = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 4)->count();
        $wm_hp_f = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 5)->count();

        $rs_hp_f = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 6)->count();
        $nm_hp_f = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 7)->count();
        $resolved_hp_f = $rs_hp_f + $nm_hp_f;
        
        $wa_fp_f = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 1)->count();
        $fw_fp_f = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 2)->count();
        $rj_fp_f = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 3)->count();
        $wo_fp_f = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 4)->count();
        $wm_fp_f = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 5)->count();

        $rs_fp_f = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 6)->count();
        $nm_fp_f = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 7)->count();
        $resolved_fp_f = $rs_fp_f + $nm_fp_f;

        $wa_hsd_f = HsdLevel::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 1)->count();
        $fw_hsd_f = HsdLevel::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 2)->count();
        $rj_hsd_f = HsdLevel::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 3)->count();
        $wo_hsd_f = HsdLevel::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 4)->count();
        $wm_hsd_f = HsdLevel::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 5)->count();

        $rs_hsd_f = HsdLevel::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 6)->count();
        $nm_hsd_f = HsdLevel::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 7)->count();
        $resolved_hsd_f = $rs_hsd_f + $nm_hsd_f;

        $wa_cob_f = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 1)->count();
        $fw_cob_f = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 2)->count();
        $rj_cob_f = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 3)->count();
        $wo_cob_f = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 4)->count();
        $wm_cob_f = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 5)->count();

        $rs_cob_f = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 6)->count();
        $nm_cob_f = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 7)->count();
        $resolved_cob_f = $rs_cob_f + $nm_cob_f;

        $wa_cot_f = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 1)->count();
        $fw_cot_f = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 2)->count();
        $rj_cot_f = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 3)->count();
        $wo_cot_f = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 4)->count();
        $wm_cot_f = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 5)->count();

        $rs_cot_f = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 6)->count();
        $nm_cot_f = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 7)->count();
        $resolved_cot_f = $rs_cot_f + $nm_cot_f;

        $wa_coc_f = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 1)->count();
        $fw_coc_f = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 2)->count();
        $rj_coc_f = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 3)->count();
        $wo_coc_f = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 4)->count();
        $wm_coc_f = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 5)->count();

        $rs_coc_f = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 6)->count();
        $nm_coc_f = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', 'Shift F')->where('status_equipment_id', 7)->count();
        $resolved_coc_f = $rs_coc_f + $nm_coc_f;

         // Shift F **************************************************************************************************************
        
        
         // Shift F **************************************************************************************************************
        $wa_burner_g = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 1)->count();
        $fw_burner_g = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 2)->count();
        $rj_burner_g = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 3)->count();
        $wo_burner_g = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 4)->count();
        $wm_burner_g = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 5)->count();

        $rs_burner_g = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 6)->count();
        $nm_burner_g = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 7)->count();
        $resolved_burner_g = $rs_burner_g + $nm_burner_g;

        $wa_sbl_g = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 1)->count();
        $fw_sbl_g = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 2)->count();
        $rj_sbl_g = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 3)->count();
        $wo_sbl_g = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 4)->count();
        $wm_sbl_g = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 5)->count();

        $rs_sbl_g = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 6)->count();
        $nm_sbl_g = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 7)->count();
        $resolved_sbl_g = $rs_sbl_g + $nm_sbl_g;

        $wa_edg_g = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 1)->count();
        $fw_edg_g = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 2)->count();
        $rj_edg_g = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 3)->count();
        $wo_edg_g = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 4)->count();
        $wm_edg_g = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 5)->count();

        $rs_edg_g = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 6)->count();
        $nm_edg_g = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 7)->count();
        $resolved_edg_g = $rs_edg_g + $nm_edg_g;

        $wa_hp_g = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 1)->count();
        $fw_hp_g = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 2)->count();
        $rj_hp_g = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 3)->count();
        $wo_hp_g = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 4)->count();
        $wm_hp_g = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 5)->count();

        $rs_hp_g = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 6)->count();
        $nm_hp_g = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 7)->count();
        $resolved_hp_g = $rs_hp_g + $nm_hp_g;
        
        $wa_fp_g = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 1)->count();
        $fw_fp_g = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 2)->count();
        $rj_fp_g = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 3)->count();
        $wo_fp_g = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 4)->count();
        $wm_fp_g = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 5)->count();

        $rs_fp_g = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 6)->count();
        $nm_fp_g = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 7)->count();
        $resolved_fp_g = $rs_fp_g + $nm_fp_g;

        $wa_hsd_g = HsdLevel::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 1)->count();
        $fw_hsd_g = HsdLevel::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 2)->count();
        $rj_hsd_g = HsdLevel::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 3)->count();
        $wo_hsd_g = HsdLevel::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 4)->count();
        $wm_hsd_g = HsdLevel::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 5)->count();

        $rs_hsd_g = HsdLevel::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 6)->count();
        $nm_hsd_g = HsdLevel::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 7)->count();
        $resolved_hsd_g = $rs_hsd_g + $nm_hsd_g;

        $wa_cob_g = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 1)->count();
        $fw_cob_g = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 2)->count();
        $rj_cob_g = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 3)->count();
        $wo_cob_g = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 4)->count();
        $wm_cob_g = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 5)->count();

        $rs_cob_g = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 6)->count();
        $nm_cob_g = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 7)->count();
        $resolved_cob_g = $rs_cob_g + $nm_cob_g;

        $wa_cot_g = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 1)->count();
        $fw_cot_g = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 2)->count();
        $rj_cot_g = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 3)->count();
        $wo_cot_g = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 4)->count();
        $wm_cot_g = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 5)->count();

        $rs_cot_g = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 6)->count();
        $nm_cot_g = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 7)->count();
        $resolved_cot_g = $rs_cot_g + $nm_cot_g;

        $wa_coc_g = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 1)->count();
        $fw_coc_g = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 2)->count();
        $rj_coc_g = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 3)->count();
        $wo_coc_g = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 4)->count();
        $wm_coc_g = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 5)->count();

        $rs_coc_g = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 6)->count();
        $nm_coc_g = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', 'Shift G')->where('status_equipment_id', 7)->count();
        $resolved_coc_g = $rs_coc_g + $nm_coc_g;

         // Shift G **************************************************************************************************************
        
        
        
         // Shift H **************************************************************************************************************
        $wa_burner_h = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 1)->count();
        $fw_burner_h = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 2)->count();
        $rj_burner_h = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 3)->count();
        $wo_burner_h = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 4)->count();
        $wm_burner_h = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 5)->count();

        $rs_burner_h = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 6)->count();
        $nm_burner_h = BurnerSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 7)->count();
        $resolved_burner_h = $rs_burner_h + $nm_burner_h;

        $wa_sbl_h = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 1)->count();
        $fw_sbl_h = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 2)->count();
        $rj_sbl_h = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 3)->count();
        $wo_sbl_h = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 4)->count();
        $wm_sbl_h = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 5)->count();

        $rs_sbl_h = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 6)->count();
        $nm_sbl_h = Sootblower::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 7)->count();
        $resolved_sbl_h = $rs_sbl_h + $nm_sbl_h;

        $wa_edg_h = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 1)->count();
        $fw_edg_h = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 2)->count();
        $rj_edg_h = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 3)->count();
        $wo_edg_h = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 4)->count();
        $wm_edg_h = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 5)->count();

        $rs_edg_h = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 6)->count();
        $nm_edg_h = EdgSystem::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 7)->count();
        $resolved_edg_h = $rs_edg_h + $nm_edg_h;

        $wa_hp_h = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 1)->count();
        $fw_hp_h = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 2)->count();
        $rj_hp_h = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 3)->count();
        $wo_hp_h = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 4)->count();
        $wm_hp_h = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 5)->count();

        $rs_hp_h = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 6)->count();
        $nm_hp_h = Hp_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 7)->count();
        $resolved_hp_h = $rs_hp_h + $nm_hp_h;
        
        $wa_fp_h = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 1)->count();
        $fw_fp_h = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 2)->count();
        $rj_fp_h = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 3)->count();
        $wo_fp_h = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 4)->count();
        $wm_fp_h = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 5)->count();

        $rs_fp_h = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 6)->count();
        $nm_fp_h = Fw_Pump::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 7)->count();
        $resolved_fp_h = $rs_fp_h + $nm_fp_h;

        $wa_hsd_h = HsdLevel::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 1)->count();
        $fw_hsd_h = HsdLevel::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 2)->count();
        $rj_hsd_h = HsdLevel::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 3)->count();
        $wo_hsd_h = HsdLevel::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 4)->count();
        $wm_hsd_h = HsdLevel::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 5)->count();

        $rs_hsd_h = HsdLevel::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 6)->count();
        $nm_hsd_h = HsdLevel::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 7)->count();
        $resolved_hsd_h = $rs_hsd_h + $nm_hsd_h;

        $wa_cob_h = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 1)->count();
        $fw_cob_h = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 2)->count();
        $rj_cob_h = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 3)->count();
        $wo_cob_h = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 4)->count();
        $wm_cob_h = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 5)->count();

        $rs_cob_h = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 6)->count();
        $nm_cob_h = CoBoiler::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 7)->count();
        $resolved_cob_h = $rs_cob_h + $nm_cob_h;

        $wa_cot_h = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 1)->count();
        $fw_cot_h = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 2)->count();
        $rj_cot_h = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 3)->count();
        $wo_cot_h = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 4)->count();
        $wm_cot_h = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 5)->count();

        $rs_cot_h = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 6)->count();
        $nm_cot_h = CoTurbine::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 7)->count();
        $resolved_cot_h = $rs_cot_h + $nm_cot_h;

        $wa_coc_h = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 1)->count();
        $fw_coc_h = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 2)->count();
        $rj_coc_h = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 3)->count();
        $wo_coc_h = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 4)->count();
        $wm_coc_h = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 5)->count();

        $rs_coc_h = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 6)->count();
        $nm_coc_h = CoCommon::with(['users', 'status_equipments'])->where('operator_shift', 'Shift H')->where('status_equipment_id', 7)->count();
        $resolved_coc_h = $rs_coc_h + $nm_coc_h;

         // Shift H **************************************************************************************************************

        return view('track_reports', [
            'user' => $user,
            'mon' => $mon,
            'data' => $data,

            // DATA SHIFT E
            // ===== TOTAL STATISTIK STATUS EQUIPMENT
            'tot_wa_e' => $wa_burner_e + $wa_sbl_e + $wa_edg_e + $wa_fp_e + $wa_hp_e + $wa_hsd_e + $wa_cot_e + $wa_cob_e + $wa_coc_e, 
            'tot_fw_e' => $fw_burner_e + $fw_sbl_e + $fw_edg_e + $fw_fp_e + $fw_hp_e + $fw_hsd_e + $fw_cot_e + $fw_cob_e + $fw_coc_e, 
            'tot_rj_e' => $rj_burner_e + $rj_sbl_e + $rj_edg_e + $rj_fp_e + $rj_hp_e + $rj_hsd_e + $rj_cot_e + $rj_cob_e + $rj_coc_e, 
            'tot_wo_e' => $wo_burner_e + $wo_sbl_e + $wo_edg_e + $wo_fp_e + $wo_hp_e + $wo_hsd_e + $wo_cot_e + $wo_cob_e + $wo_coc_e, 
            'tot_wm_e' => $wm_burner_e + $wm_sbl_e + $wm_edg_e + $wm_fp_e + $wm_hp_e + $wm_hsd_e + $wm_cot_e + $wm_cob_e + $wm_coc_e, 
            'tot_rs_e' => $resolved_burner_e + $resolved_sbl_e + $resolved_edg_e + $resolved_fp_e + $resolved_hp_e + $resolved_cob_e + $resolved_cot_e +$resolved_coc_e + $resolved_hsd_e, 

            // ===== TOTAL STATISTIK PER ITEM PERALATAN
            'tot_wa_burner_e' => $wa_burner_e,
            'tot_fw_burner_e' => $fw_burner_e,
            'tot_rj_burner_e' => $rj_burner_e,
            'tot_wo_burner_e' => $wo_burner_e,
            'tot_wm_burner_e' => $wm_burner_e,
            'tot_rs_burner_e' => $resolved_burner_e,
            'total_burner_e' => $wa_burner_e + $fw_burner_e + $rj_burner_e + $wo_burner_e + $wm_burner_e + $resolved_burner_e,

            'tot_wa_sbl_e' => $wa_sbl_e,
            'tot_fw_sbl_e' => $fw_sbl_e,
            'tot_rj_sbl_e' => $rj_sbl_e,
            'tot_wo_sbl_e' => $wo_sbl_e,
            'tot_wm_sbl_e' => $wm_sbl_e,
            'tot_rs_sbl_e' => $resolved_sbl_e,
            'total_sbl_e' => $wa_sbl_e + $fw_sbl_e + $rj_sbl_e + $wo_sbl_e + $wm_sbl_e + $resolved_sbl_e,

            'tot_wa_edg_e' => $wa_edg_e,
            'tot_fw_edg_e' => $fw_edg_e,
            'tot_rj_edg_e' => $rj_edg_e,
            'tot_wo_edg_e' => $wo_edg_e,
            'tot_wm_edg_e' => $wm_edg_e,
            'tot_rs_edg_e' => $resolved_edg_e,
            'total_edg_e' => $wa_edg_e + $fw_edg_e + $rj_edg_e + $wo_edg_e + $wm_edg_e + $resolved_edg_e,

            'tot_wa_hp_e' => $wa_hp_e,
            'tot_fw_hp_e' => $fw_hp_e,
            'tot_rj_hp_e' => $rj_hp_e,
            'tot_wo_hp_e' => $wo_hp_e,
            'tot_wm_hp_e' => $wm_hp_e,
            'tot_rs_hp_e' => $resolved_hp_e,
            'total_hp_e' => $wa_hp_e + $fw_hp_e + $rj_hp_e + $wo_hp_e + $wm_hp_e + $resolved_hp_e,

            'tot_wa_fp_e' => $wa_fp_e,
            'tot_fw_fp_e' => $fw_fp_e,
            'tot_rj_fp_e' => $rj_fp_e,
            'tot_wo_fp_e' => $wo_fp_e,
            'tot_wm_fp_e' => $wm_fp_e,
            'tot_rs_fp_e' => $resolved_fp_e,
            'total_fp_e' => $wa_fp_e + $fw_fp_e + $rj_fp_e + $wo_fp_e + $wm_fp_e + $resolved_fp_e,

            'tot_wa_hsd_e' => $wa_hsd_e,
            'tot_fw_hsd_e' => $fw_hsd_e,
            'tot_rj_hsd_e' => $rj_hsd_e,
            'tot_wo_hsd_e' => $wo_hsd_e,
            'tot_wm_hsd_e' => $wm_hsd_e,
            'tot_rs_hsd_e' => $resolved_hsd_e,
            'total_hsd_e' => $wa_hsd_e + $fw_hsd_e + $rj_hsd_e + $wo_hsd_e + $wm_hsd_e + $resolved_hsd_e,

            'tot_wa_cot_e' => $wa_cot_e,
            'tot_fw_cot_e' => $fw_cot_e,
            'tot_rj_cot_e' => $rj_cot_e,
            'tot_wo_cot_e' => $wo_cot_e,
            'tot_wm_cot_e' => $wm_cot_e,
            'tot_rs_cot_e' => $resolved_cot_e,
            'total_cot_e' => $wa_cot_e + $fw_cot_e + $rj_cot_e + $wo_cot_e + $wm_cot_e + $resolved_cot_e,

            'tot_wa_cob_e' => $wa_cob_e,
            'tot_fw_cob_e' => $fw_cob_e,
            'tot_rj_cob_e' => $rj_cob_e,
            'tot_wo_cob_e' => $wo_cob_e,
            'tot_wm_cob_e' => $wm_cob_e,
            'tot_rs_cob_e' => $resolved_cob_e,
            'total_cob_e' => $wa_cob_e + $fw_cob_e + $rj_cob_e + $wo_cob_e + $wm_cob_e + $resolved_cob_e,

            'tot_wa_coc_e' => $wa_coc_e,
            'tot_fw_coc_e' => $fw_coc_e,
            'tot_rj_coc_e' => $rj_coc_e,
            'tot_wo_coc_e' => $wo_coc_e,
            'tot_wm_coc_e' => $wm_coc_e,
            'tot_rs_coc_e' => $resolved_coc_e,
            'total_coc_e' => $wa_coc_e + $fw_coc_e + $rj_coc_e + $wo_coc_e + $wm_coc_e + $resolved_coc_e,
            // DATA SHIFT E



            // DATA SHIFT F
            // ===== TOTAL STATISTIK STATUS EQUIPMENT
            'tot_wa_f' => $wa_burner_f + $wa_sbl_f + $wa_edg_f + $wa_fp_f + $wa_hp_f + $wa_hsd_f + $wa_cot_f + $wa_cob_f + $wa_coc_f, 
            'tot_fw_f' => $fw_burner_f + $fw_sbl_f + $fw_edg_f + $fw_fp_f + $fw_hp_f + $fw_hsd_f + $fw_cot_f + $fw_cob_f + $fw_coc_f, 
            'tot_rj_f' => $rj_burner_f + $rj_sbl_f + $rj_edg_f + $rj_fp_f + $rj_hp_f + $rj_hsd_f + $rj_cot_f + $rj_cob_f + $rj_coc_f, 
            'tot_wo_f' => $wo_burner_f + $wo_sbl_f + $wo_edg_f + $wo_fp_f + $wo_hp_f + $wo_hsd_f + $wo_cot_f + $wo_cob_f + $wo_coc_f, 
            'tot_wm_f' => $wm_burner_f + $wm_sbl_f + $wm_edg_f + $wm_fp_f + $wm_hp_f + $wm_hsd_f + $wm_cot_f + $wm_cob_f + $wm_coc_f, 
            'tot_rs_f' => $resolved_burner_f + $resolved_sbl_f + $resolved_edg_f + $resolved_fp_f + $resolved_hp_f + $resolved_cob_f + $resolved_cot_f +$resolved_coc_f + $resolved_hsd_f, 

            // ===== TOTAL STATISTIK PER ITEM PERALATAN
            'tot_wa_burner_f' => $wa_burner_f,
            'tot_fw_burner_f' => $fw_burner_f,
            'tot_rj_burner_f' => $rj_burner_f,
            'tot_wo_burner_f' => $wo_burner_f,
            'tot_wm_burner_f' => $wm_burner_f,
            'tot_rs_burner_f' => $resolved_burner_f,
            'total_burner_f' => $wa_burner_f + $fw_burner_f + $rj_burner_f + $wo_burner_f + $wm_burner_f + $resolved_burner_f,

            'tot_wa_sbl_f' => $wa_sbl_f,
            'tot_fw_sbl_f' => $fw_sbl_f,
            'tot_rj_sbl_f' => $rj_sbl_f,
            'tot_wo_sbl_f' => $wo_sbl_f,
            'tot_wm_sbl_f' => $wm_sbl_f,
            'tot_rs_sbl_f' => $resolved_sbl_f,
            'total_sbl_f' => $wa_sbl_f + $fw_sbl_f + $rj_sbl_f + $wo_sbl_f + $wm_sbl_f + $resolved_sbl_f,

            'tot_wa_edg_f' => $wa_edg_f,
            'tot_fw_edg_f' => $fw_edg_f,
            'tot_rj_edg_f' => $rj_edg_f,
            'tot_wo_edg_f' => $wo_edg_f,
            'tot_wm_edg_f' => $wm_edg_f,
            'tot_rs_edg_f' => $resolved_edg_f,
            'total_edg_f' => $wa_edg_f + $fw_edg_f + $rj_edg_f + $wo_edg_f + $wm_edg_f + $resolved_edg_f,

            'tot_wa_hp_f' => $wa_hp_f,
            'tot_fw_hp_f' => $fw_hp_f,
            'tot_rj_hp_f' => $rj_hp_f,
            'tot_wo_hp_f' => $wo_hp_f,
            'tot_wm_hp_f' => $wm_hp_f,
            'tot_rs_hp_f' => $resolved_hp_f,
            'total_hp_f' => $wa_hp_f + $fw_hp_f + $rj_hp_f + $wo_hp_f + $wm_hp_f + $resolved_hp_f,

            'tot_wa_fp_f' => $wa_fp_f,
            'tot_fw_fp_f' => $fw_fp_f,
            'tot_rj_fp_f' => $rj_fp_f,
            'tot_wo_fp_f' => $wo_fp_f,
            'tot_wm_fp_f' => $wm_fp_f,
            'tot_rs_fp_f' => $resolved_fp_f,
            'total_fp_f' => $wa_fp_f + $fw_fp_f + $rj_fp_f + $wo_fp_f + $wm_fp_f + $resolved_fp_f,

            'tot_wa_hsd_f' => $wa_hsd_f,
            'tot_fw_hsd_f' => $fw_hsd_f,
            'tot_rj_hsd_f' => $rj_hsd_f,
            'tot_wo_hsd_f' => $wo_hsd_f,
            'tot_wm_hsd_f' => $wm_hsd_f,
            'tot_rs_hsd_f' => $resolved_hsd_f,
            'total_hsd_f' => $wa_hsd_f+ $fw_hsd_f+ $rj_hsd_f+ $wo_hsd_f+ $wm_hsd_f+ $resolved_hsd_f,

            'tot_wa_cot_f' => $wa_cot_f,
            'tot_fw_cot_f' => $fw_cot_f,
            'tot_rj_cot_f' => $rj_cot_f,
            'tot_wo_cot_f' => $wo_cot_f,
            'tot_wm_cot_f' => $wm_cot_f,
            'tot_rs_cot_f' => $resolved_cot_f,
            'total_cot_f' => $wa_cot_f + $fw_cot_f + $rj_cot_f + $wo_cot_f + $wm_cot_f + $resolved_cot_f,

            'tot_wa_cob_f' => $wa_cob_f,
            'tot_fw_cob_f' => $fw_cob_f,
            'tot_rj_cob_f' => $rj_cob_f,
            'tot_wo_cob_f' => $wo_cob_f,
            'tot_wm_cob_f' => $wm_cob_f,
            'tot_rs_cob_f' => $resolved_cob_f,
            'total_cob_f' => $wa_cob_f + $fw_cob_f + $rj_cob_f + $wo_cob_f + $wm_cob_f + $resolved_cob_f,

            'tot_wa_coc_f' => $wa_coc_f,
            'tot_fw_coc_f' => $fw_coc_f,
            'tot_rj_coc_f' => $rj_coc_f,
            'tot_wo_coc_f' => $wo_coc_f,
            'tot_wm_coc_f' => $wm_coc_f,
            'tot_rs_coc_f' => $resolved_coc_f,
            'total_coc_f' => $wa_coc_f + $fw_coc_f + $rj_coc_f + $wo_coc_f + $wm_coc_f + $resolved_coc_f,
            // DATA SHIFT F

            // DATA SHIFT G
            // ===== TOTAL STATISTIK STATUS EQUIPMENT
            'tot_wa_g' => $wa_burner_g + $wa_sbl_g + $wa_edg_g + $wa_fp_g + $wa_hp_g + $wa_hsd_g + $wa_cot_g + $wa_cob_g + $wa_coc_g, 
            'tot_fw_g' => $fw_burner_g + $fw_sbl_g + $fw_edg_g + $fw_fp_g + $fw_hp_g + $fw_hsd_g + $fw_cot_g + $fw_cob_g + $fw_coc_g, 
            'tot_rj_g' => $rj_burner_g + $rj_sbl_g + $rj_edg_g + $rj_fp_g + $rj_hp_g + $rj_hsd_g + $rj_cot_g + $rj_cob_g + $rj_coc_g, 
            'tot_wo_g' => $wo_burner_g + $wo_sbl_g + $wo_edg_g + $wo_fp_g + $wo_hp_g + $wo_hsd_g + $wo_cot_g + $wo_cob_g + $wo_coc_g, 
            'tot_wm_g' => $wm_burner_g + $wm_sbl_g + $wm_edg_g + $wm_fp_g + $wm_hp_g + $wm_hsd_g + $wm_cot_g + $wm_cob_g + $wm_coc_g, 
            'tot_rs_g' => $resolved_burner_g + $resolved_sbl_g + $resolved_edg_g + $resolved_fp_g + $resolved_hp_g + $resolved_cob_g + $resolved_cot_g +$resolved_coc_g + $resolved_hsd_g, 

            // ===== TOTAL STATISTIK PER ITEM PERALATAN
            'tot_wa_burner_g' => $wa_burner_g,
            'tot_fw_burner_g' => $fw_burner_g,
            'tot_rj_burner_g' => $rj_burner_g,
            'tot_wo_burner_g' => $wo_burner_g,
            'tot_wm_burner_g' => $wm_burner_g,
            'tot_rs_burner_g' => $resolved_burner_g,
            'total_burner_g' => $wa_burner_g + $fw_burner_g + $rj_burner_g + $wo_burner_g + $wm_burner_g + $resolved_burner_g,

            'tot_wa_sbl_g' => $wa_sbl_g,
            'tot_fw_sbl_g' => $fw_sbl_g,
            'tot_rj_sbl_g' => $rj_sbl_g,
            'tot_wo_sbl_g' => $wo_sbl_g,
            'tot_wm_sbl_g' => $wm_sbl_g,
            'tot_rs_sbl_g' => $resolved_sbl_g,
            'total_sbl_g' => $wa_sbl_g + $fw_sbl_g + $rj_sbl_g + $wo_sbl_g + $wm_sbl_g + $resolved_sbl_g,

            'tot_wa_edg_g' => $wa_edg_g,
            'tot_fw_edg_g' => $fw_edg_g,
            'tot_rj_edg_g' => $rj_edg_g,
            'tot_wo_edg_g' => $wo_edg_g,
            'tot_wm_edg_g' => $wm_edg_g,
            'tot_rs_edg_g' => $resolved_edg_g,
            'total_edg_g' => $wa_edg_g + $fw_edg_g + $rj_edg_g + $wo_edg_g + $wm_edg_g + $resolved_edg_g,

            'tot_wa_hp_g' => $wa_hp_g,
            'tot_fw_hp_g' => $fw_hp_g,
            'tot_rj_hp_g' => $rj_hp_g,
            'tot_wo_hp_g' => $wo_hp_g,
            'tot_wm_hp_g' => $wm_hp_g,
            'tot_rs_hp_g' => $resolved_hp_g,
            'total_hp_g' => $wa_hp_g + $fw_hp_g + $rj_hp_g + $wo_hp_g + $wm_hp_g + $resolved_hp_g,

            'tot_wa_fp_g' => $wa_fp_g,
            'tot_fw_fp_g' => $fw_fp_g,
            'tot_rj_fp_g' => $rj_fp_g,
            'tot_wo_fp_g' => $wo_fp_g,
            'tot_wm_fp_g' => $wm_fp_g,
            'tot_rs_fp_g' => $resolved_fp_g,
            'total_fp_g' => $wa_fp_g + $fw_fp_g + $rj_fp_g + $wo_fp_g + $wm_fp_g + $resolved_fp_g,

            'tot_wa_hsd_g' => $wa_hsd_g,
            'tot_fw_hsd_g' => $fw_hsd_g,
            'tot_rj_hsd_g' => $rj_hsd_g,
            'tot_wo_hsd_g' => $wo_hsd_g,
            'tot_wm_hsd_g' => $wm_hsd_g,
            'tot_rs_hsd_g' => $resolved_hsd_g,
            'total_hsd_g' => $wa_hsd_g+ $fw_hsd_g+ $rj_hsd_g+ $wo_hsd_g+ $wm_hsd_g+ $resolved_hsd_g,

            'tot_wa_cot_g' => $wa_cot_g,
            'tot_fw_cot_g' => $fw_cot_g,
            'tot_rj_cot_g' => $rj_cot_g,
            'tot_wo_cot_g' => $wo_cot_g,
            'tot_wm_cot_g' => $wm_cot_g,
            'tot_rs_cot_g' => $resolved_cot_g,
            'total_cot_g' => $wa_cot_g + $fw_cot_g + $rj_cot_g + $wo_cot_g + $wm_cot_g + $resolved_cot_g,

            'tot_wa_cob_g' => $wa_cob_g,
            'tot_fw_cob_g' => $fw_cob_g,
            'tot_rj_cob_g' => $rj_cob_g,
            'tot_wo_cob_g' => $wo_cob_g,
            'tot_wm_cob_g' => $wm_cob_g,
            'tot_rs_cob_g' => $resolved_cob_g,
            'total_cob_g' => $wa_cob_g + $fw_cob_g + $rj_cob_g + $wo_cob_g + $wm_cob_g + $resolved_cob_g,

            'tot_wa_coc_g' => $wa_coc_g,
            'tot_fw_coc_g' => $fw_coc_g,
            'tot_rj_coc_g' => $rj_coc_g,
            'tot_wo_coc_g' => $wo_coc_g,
            'tot_wm_coc_g' => $wm_coc_g,
            'tot_rs_coc_g' => $resolved_coc_g,
            'total_coc_g' => $wa_coc_g + $fw_coc_g + $rj_coc_g + $wo_coc_g + $wm_coc_g + $resolved_coc_g,
            // DATA SHIFT F
            
                 // DATA SHIFT H
            // ===== TOTAL STATISTIK STATUS EQUIPMENT
            'tot_wa_h' => $wa_burner_h + $wa_sbl_h + $wa_edg_h + $wa_fp_h + $wa_hp_h + $wa_hsd_h + $wa_cot_h + $wa_cob_h + $wa_coc_h, 
            'tot_fw_h' => $fw_burner_h + $fw_sbl_h + $fw_edg_h + $fw_fp_h + $fw_hp_h + $fw_hsd_h + $fw_cot_h + $fw_cob_h + $fw_coc_h, 
            'tot_rj_h' => $rj_burner_h + $rj_sbl_h + $rj_edg_h + $rj_fp_h + $rj_hp_h + $rj_hsd_h + $rj_cot_h + $rj_cob_h + $rj_coc_h, 
            'tot_wo_h' => $wo_burner_h + $wo_sbl_h + $wo_edg_h + $wo_fp_h + $wo_hp_h + $wo_hsd_h + $wo_cot_h + $wo_cob_h + $wo_coc_h, 
            'tot_wm_h' => $wm_burner_h + $wm_sbl_h + $wm_edg_h + $wm_fp_h + $wm_hp_h + $wm_hsd_h + $wm_cot_h + $wm_cob_h + $wm_coc_h, 
            'tot_rs_h' => $resolved_burner_h + $resolved_sbl_h + $resolved_edg_h + $resolved_fp_h + $resolved_hp_h + $resolved_cob_h + $resolved_cot_h +$resolved_coc_h + $resolved_hsd_h,

            
            // ===== TOTAL STATISTIK PER ITEM PERALATAN
            'tot_wa_burner_h' => $wa_burner_h,
            'tot_fw_burner_h' => $fw_burner_h,
            'tot_rj_burner_h' => $rj_burner_h,
            'tot_wo_burner_h' => $wo_burner_h,
            'tot_wm_burner_h' => $wm_burner_h,
            'tot_rs_burner_h' => $resolved_burner_h,
            'total_burner_h' => $wa_burner_h + $fw_burner_h + $rj_burner_h + $wo_burner_h + $wm_burner_h + $resolved_burner_h,

            'tot_wa_sbl_h' => $wa_sbl_h,
            'tot_fw_sbl_h' => $fw_sbl_h,
            'tot_rj_sbl_h' => $rj_sbl_h,
            'tot_wo_sbl_h' => $wo_sbl_h,
            'tot_wm_sbl_h' => $wm_sbl_h,
            'tot_rs_sbl_h' => $resolved_sbl_h,
            'total_sbl_h' => $wa_sbl_h + $fw_sbl_h + $rj_sbl_h + $wo_sbl_h + $wm_sbl_h + $resolved_sbl_h,

            'tot_wa_edg_h' => $wa_edg_h,
            'tot_fw_edg_h' => $fw_edg_h,
            'tot_rj_edg_h' => $rj_edg_h,
            'tot_wo_edg_h' => $wo_edg_h,
            'tot_wm_edg_h' => $wm_edg_h,
            'tot_rs_edg_h' => $resolved_edg_h,
            'total_edg_h' => $wa_edg_h + $fw_edg_h + $rj_edg_h + $wo_edg_h + $wm_edg_h + $resolved_edg_h,

            'tot_wa_hp_h' => $wa_hp_h,
            'tot_fw_hp_h' => $fw_hp_h,
            'tot_rj_hp_h' => $rj_hp_h,
            'tot_wo_hp_h' => $wo_hp_h,
            'tot_wm_hp_h' => $wm_hp_h,
            'tot_rs_hp_h' => $resolved_hp_h,
            'total_hp_h' => $wa_hp_h + $fw_hp_h + $rj_hp_h + $wo_hp_h + $wm_hp_h + $resolved_hp_h,

            'tot_wa_fp_h' => $wa_fp_h,
            'tot_fw_fp_h' => $fw_fp_h,
            'tot_rj_fp_h' => $rj_fp_h,
            'tot_wo_fp_h' => $wo_fp_h,
            'tot_wm_fp_h' => $wm_fp_h,
            'tot_rs_fp_h' => $resolved_fp_h,
            'total_fp_h' => $wa_fp_h + $fw_fp_h + $rj_fp_h + $wo_fp_h + $wm_fp_h + $resolved_fp_h,

            'tot_wa_hsd_h' => $wa_hsd_h,
            'tot_fw_hsd_h' => $fw_hsd_h,
            'tot_rj_hsd_h' => $rj_hsd_h,
            'tot_wo_hsd_h' => $wo_hsd_h,
            'tot_wm_hsd_h' => $wm_hsd_h,
            'tot_rs_hsd_h' => $resolved_hsd_h,
            'total_hsd_h' => $wa_hsd_h + $fw_hsd_h + $rj_hsd_h + $wo_hsd_h + $wm_hsd_h + $resolved_hsd_h,

            'tot_wa_cot_h' => $wa_cot_h,
            'tot_fw_cot_h' => $fw_cot_h,
            'tot_rj_cot_h' => $rj_cot_h,
            'tot_wo_cot_h' => $wo_cot_h,
            'tot_wm_cot_h' => $wm_cot_h,
            'tot_rs_cot_h' => $resolved_cot_h,
            'total_cot_h' => $wa_cot_h + $fw_cot_h + $rj_cot_h + $wo_cot_h + $wm_cot_h + $resolved_cot_h,

            'tot_wa_cob_h' => $wa_cob_h,
            'tot_fw_cob_h' => $fw_cob_h,
            'tot_rj_cob_h' => $rj_cob_h,
            'tot_wo_cob_h' => $wo_cob_h,
            'tot_wm_cob_h' => $wm_cob_h,
            'tot_rs_cob_h' => $resolved_cob_h,
            'total_cob_h' => $wa_cob_h + $fw_cob_h + $rj_cob_h + $wo_cob_h + $wm_cob_h + $resolved_cob_h,

            'tot_wa_coc_h' => $wa_coc_h,
            'tot_fw_coc_h' => $fw_coc_h,
            'tot_rj_coc_h' => $rj_coc_h,
            'tot_wo_coc_h' => $wo_coc_h,
            'tot_wm_coc_h' => $wm_coc_h,
            'tot_rs_coc_h' => $resolved_coc_h,
            'total_coc_h' => $wa_coc_h + $fw_coc_h + $rj_coc_h + $wo_coc_h + $wm_coc_h + $resolved_coc_h,
        ]);
            
    }
}
