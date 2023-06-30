<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $spv_op = User::where('jabatan', 'Supervisor Operasi')->latest()->get();
        $spv_har = User::where('jabatan', 'Supervisor Pemeliharaan')->latest()->get();

        // WAITING
        $ab = BurnerSystem::with('users')->where('status_equipment_id', 1)->count();
        $asbl = Sootblower::with('users')->where('status_equipment_id', 1)->count();
        $afp = Fw_Pump::with('users')->where('status_equipment_id', 1)->count();
        $ahp = Hp_Pump::with('users')->where('status_equipment_id', 1)->count();
        $ae = EdgSystem::with('users')->where('status_equipment_id', 1)->count();
        $acot = CoTurbine::with('users')->where('status_equipment_id', 1)->count();
        $acob = CoBoiler::with('users')->where('status_equipment_id', 1)->count();
        $acoc = CoCommon::with('users')->where('status_equipment_id', 1)->count();

        // FORWARDING
        $bb = BurnerSystem::with('users')->where('status_equipment_id', 2)->count();
        $bsbl = Sootblower::with('users')->where('status_equipment_id', 2)->count();
        $bfp = Fw_Pump::with('users')->where('status_equipment_id', 2)->count();
        $bhp = Hp_Pump::with('users')->where('status_equipment_id', 2)->count();
        $be = EdgSystem::with('users')->where('status_equipment_id', 2)->count();
        $bcot = CoTurbine::with('users')->where('status_equipment_id', 2)->count();
        $bcob = CoBoiler::with('users')->where('status_equipment_id', 2)->count();
        $bcoc = CoCommon::with('users')->where('status_equipment_id', 2)->count();

        // === REJECTED
        $cb = BurnerSystem::with('users')->where('status_equipment_id', 3)->count();
        $csbl = Sootblower::with('users')->where('status_equipment_id', 3)->count();
        $cfp = Fw_Pump::with('users')->where('status_equipment_id', 3)->count();
        $chp = Hp_Pump::with('users')->where('status_equipment_id', 3)->count();
        $ce = EdgSystem::with('users')->where('status_equipment_id', 3)->count();
        $ccot = CoTurbine::with('users')->where('status_equipment_id', 3)->count();
        $ccob = CoBoiler::with('users')->where('status_equipment_id', 3)->count();
        $ccoc = CoCommon::with('users')->where('status_equipment_id', 3)->count();

        // === WAITING MATERIAL
        $db = BurnerSystem::with('users')->where('status_equipment_id', 4)->count();
        $dsbl = Sootblower::with('users')->where('status_equipment_id', 4)->count();
        $dfp = Fw_Pump::with('users')->where('status_equipment_id', 4)->count();
        $dhp = Hp_Pump::with('users')->where('status_equipment_id', 4)->count();
        $de = EdgSystem::with('users')->where('status_equipment_id', 4)->count();
        $dcot = CoTurbine::with('users')->where('status_equipment_id', 4)->count();
        $dcob = CoBoiler::with('users')->where('status_equipment_id', 4)->count();
        $dcoc = CoCommon::with('users')->where('status_equipment_id', 4)->count();

        // === WORKING
        $eb = BurnerSystem::with('users')->where('status_equipment_id', 5)->count();
        $esbl = Sootblower::with('users')->where('status_equipment_id', 5)->count();
        $efp = Fw_Pump::with('users')->where('status_equipment_id', 5)->count();
        $ehp = Hp_Pump::with('users')->where('status_equipment_id', 5)->count();
        $ee = EdgSystem::with('users')->where('status_equipment_id', 5)->count();
        $ecot = CoTurbine::with('users')->where('status_equipment_id', 5)->count();
        $ecob = CoBoiler::with('users')->where('status_equipment_id', 5)->count();
        $ecoc = CoCommon::with('users')->where('status_equipment_id', 5)->count();

        // === RESOLVED
        $fb = BurnerSystem::with('users')->where('status_equipment_id', 6)->count();
        $fsbl = Sootblower::with('users')->where('status_equipment_id', 6)->count();
        $ffp = Fw_Pump::with('users')->where('status_equipment_id', 6)->count();
        $fhp = Hp_Pump::with('users')->where('status_equipment_id', 6)->count();
        $fe = EdgSystem::with('users')->where('status_equipment_id', 6)->count();
        $fcot = CoTurbine::with('users')->where('status_equipment_id', 6)->count();
        $fcob = CoBoiler::with('users')->where('status_equipment_id', 6)->count();
        $fcoc = CoCommon::with('users')->where('status_equipment_id', 6)->count();


        $wr = $ab + $asbl + $afp + $ahp + $ae + $acot + $acob + $acoc;
        $fr = $bb + $bsbl + $bfp + $bhp + $be + $bcot + $bcob + $bcoc;
        $rr = $cb + $csbl + $cfp + $chp + $ce + $ccot + $ccob + $ccoc;
        $wmr = $db + $dsbl + $dfp + $dhp + $de + $dcot + $dcob + $dcoc;
        $wor =$eb + $esbl + $efp + $ehp + $ee + $ecot + $ecob + $ecoc;
        $wrs = $fb + $asbl + $afp + $ahp + $fe + $fcot + $fcob + $fcoc;


        // === PERCENTAGES
        $pb = BurnerSystem::with('users')->count();
        $perbun= $pb * 0.01;

        $psbl = Sootblower::with('users')->count();
        $persbl = $psbl * 0.01;

        $pfp = Fw_Pump::with('users')->count();
        $perfp = $pfp * 0.01;
        
        $php = Hp_Pump::with('users')->count();
        $perhp = $php * 0.01;

        $phsd = HsdLevel::with('users')->count();
        $perhsd = $phsd * 0.01;

        $pe = EdgSystem::with('users')->count();
        $peredg = $pe * 0.01;

        $pcot = CoTurbine::count();
        $percot = $pcot * 0.01;

        $pcob = CoBoiler::count();
        $percob = $pcob * 0.01;

        $pcoc = CoCommon::count();
        $percoc = $pcoc * 0.01;

        return view('pages.admin.dashboard', compact('user','spv_op','spv_har','wr','rr','fr','wmr','wor','wrs', 'perbun','peredg','perhsd','pb','pe','psbl','pfp','php','pcoc','pcot','pcob','phsd','percot','percob','percoc','persbl','perhp','perfp'));
    }
}
