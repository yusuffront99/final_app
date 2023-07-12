<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        return view('pages.Profile.index', compact('user','nb','nedg','ncb','ncc','nct','nfw','nhp','nhsd','nsbl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $leaders = Leader::get();
        
        $user = User::where('id', Auth::user()->id)->first();
        $data_id = User::where('id', $id)->first();
        return view('pages.Profile.update', compact('data_id', 'leaders','user','nb','nsbl','nhsd','nfw','nhp','nedg','ncb','ncc','nct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $data = $request->all();

        if($request->file('profile_img')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $data['profile_img'] = $request->file('profile_img')->store('uploads');
        }

        $item = User::findOrFail($id);
        $item->update($data);

        return redirect()->route('profile.index')->with('success', 'Data Updated Successfully');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
