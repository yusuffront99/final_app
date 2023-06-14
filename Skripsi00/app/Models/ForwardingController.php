<?php

namespace App\Http\Controllers\LFOSystem;

use App\Models\User;
use Webpatser\Uuid\Uuid;
use App\Models\forwarding;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;



class ForwardingController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('pages.LFOSystem.ForwardingPump.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $history = forwarding::take(1)->latest()->get();
        $user = User::where('id', Auth::user()->id)->first();
        $users = User::where('jabatan', Auth::user()->jabatan)->where('tim_divisi', Auth::user()->tim_divisi)->get();
        $forwarding = 1;
        return view('pages.ForwardingPump.create', compact('users', 'forwarding', 'user','history'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'update_ke' => 'required',
            'arus_FP_A' => 'required',
            'arus_FP_B' => 'required',
            'status_FP_A' => 'required',
            'status_FP_B' => 'required',
            'press_FP_A' => 'required',
            'press_FP_B' => 'required',         
            'info_FP' => 'required',                    
        ]);


        $forwarding = new forwarding();

        $forwarding->id = Uuid::generate();
        $forwarding->update_ke= $request->get('update_ke');
        $forwarding->arus_FP_A = $request->get('arus_FP_A');
        $forwarding->arus_FP_B = $request->get('arus_FP_B');
        $forwarding->press_FP_A = $request->get('press_FP_A');
        $forwarding->press_FP_B = $request->get('press_FP_B');
        $forwarding->status_FP_A = $request->get('status_FP_A');
        $forwarding->status_FP_B = $request->get('status_FP_B');
        $forwarding->info_FP = $request->get('info_FP');


        $forwarding->save();

        return response()->json([
            'success' => 'Added Data Successfully'
        ], 200);
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
        $user = User::where('id', Auth::user()->id)->first();
        $users = User::get();
        $data_id = forwarding::where('id', $id)->first();

        return view('pages.ForwardingPump.edit', compact('data_id', 'users','user'));
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
        $update = forwarding::where('id', $id)->first();

        $update->id = $update->id;
        
        $update->update_ke= $request->get('update_ke');
        $update->arus_FP_A = $request->get('arus_FP_A');
        $update->arus_FP_B = $request->get('arus_FP_B');
        $update->press_FP_A = $request->get('press_FP_A');
        $update->press_FP_B = $request->get('press_FP_B');
        $update->status_FP_A = $request->get('status_FP_A');
        $update->status_FP_B = $request->get('status_FP_B');
        $update->info_FP = $request->get('info_FP');

        $update->save();

        return redirect()->route('lfo_system.index');
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
