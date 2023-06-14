<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BurnerSystem;
use App\Models\CoBoiler;
use App\Models\CoCommon;
use App\Models\CoTurbine;
use App\Models\EdgSystem;
use App\Models\LfoSystem;
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
        // $al = LfoSystem::with('users')->where('status_equipment_id', 1)->count();
        $ae = EdgSystem::with('users')->where('status_equipment_id', 1)->count();
        $acot = CoTurbine::with('users')->where('status_equipment_id', 1)->count();
        $acob = CoBoiler::with('users')->where('status_equipment_id', 1)->count();
        $acoc = CoCommon::with('users')->where('status_equipment_id', 1)->count();

        // FORWARDING
        $bb = BurnerSystem::with('users')->where('status_equipment_id', 2)->count();
        // $bl = LfoSystem::with('users')->where('status_equipment_id', 2)->count();
        $be = EdgSystem::with('users')->where('status_equipment_id', 2)->count();
        $bcot = CoTurbine::with('users')->where('status_equipment_id', 1)->count();
        $bcob = CoBoiler::with('users')->where('status_equipment_id', 1)->count();
        $bcoc = CoCommon::with('users')->where('status_equipment_id', 1)->count();

        // === REJECTED
        $cb = BurnerSystem::with('users')->where('status_equipment_id', 3)->count();
        // $cl = LfoSystem::with('users')->where('status_equipment_id', 3)->count();
        $ce = EdgSystem::with('users')->where('status_equipment_id', 3)->count();
        $ccot = CoTurbine::with('users')->where('status_equipment_id', 1)->count();
        $ccob = CoBoiler::with('users')->where('status_equipment_id', 1)->count();
        $ccoc = CoCommon::with('users')->where('status_equipment_id', 1)->count();

        // === WAITING MATERIAL
        $db = BurnerSystem::with('users')->where('status_equipment_id', 4)->count();
        // $dl = LfoSystem::with('users')->where('status_equipment_id', 4)->count();
        $de = EdgSystem::with('users')->where('status_equipment_id', 4)->count();
        $dcot = CoTurbine::with('users')->where('status_equipment_id', 1)->count();
        $dcob = CoBoiler::with('users')->where('status_equipment_id', 1)->count();
        $dcoc = CoCommon::with('users')->where('status_equipment_id', 1)->count();

        // === WORKING
        $eb = BurnerSystem::with('users')->where('status_equipment_id', 5)->count();
        // $el = LfoSystem::with('users')->where('status_equipment_id', 5)->count();
        $ee = EdgSystem::with('users')->where('status_equipment_id', 5)->count();
        $ecot = CoTurbine::with('users')->where('status_equipment_id', 1)->count();
        $ecob = CoBoiler::with('users')->where('status_equipment_id', 1)->count();
        $ecoc = CoCommon::with('users')->where('status_equipment_id', 1)->count();

        // === RESOLVED
        $fb = BurnerSystem::with('users')->where('status_equipment_id', 6)->count();
        // $fl = LfoSystem::with('users')->where('status_equipment_id', 6)->count();
        $fe = EdgSystem::with('users')->where('status_equipment_id', 6)->count();
        $fcot = CoTurbine::with('users')->where('status_equipment_id', 1)->count();
        $fcob = CoBoiler::with('users')->where('status_equipment_id', 1)->count();
        $fcoc = CoCommon::with('users')->where('status_equipment_id', 1)->count();


        $wr = $ab + $ae + $acot + $acob + $acoc;
        $fr = $bb + $be + $bcot + $bcob + $bcoc;
        $rr = $cb + $ce + $ccot + $ccob + $ccoc;
        $wmr = $db + $de + $dcot + $dcob + $dcoc;
        $wor =$eb + $ee + $ecot + $ecob + $ecoc;
        $wrs = $fb + $fe + $fcot + $fcob + $fcoc;


        // === PERCENTAGES
        $pb = BurnerSystem::with('users')->count();
        $perbun= $pb * 0.01;

        // $pl = LfoSystem::with('users')->count();
        // $perlfo = $pl * 0.01;

        $pe = EdgSystem::with('users')->count();
        $peredg = $pe * 0.01;

        $pcot = CoTurbine::count();
        $percot = $pcot * 0.01;

        $pcob = CoBoiler::count();
        $percob = $pcob * 0.01;

        $pcoc = CoCommon::count();
        $percoc = $pcoc * 0.01;

        return view('pages.admin.dashboard', compact('user','spv_op','spv_har','wr','rr','fr','wmr','wor','wrs', 'perbun','peredg', 'pb','pe','pcoc','pcot','pcob', 'percot','percob','percoc'));
    }
}
