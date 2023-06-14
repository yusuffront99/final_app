<?php

namespace App\Http\Controllers\Admin\CRUD;

use App\Http\Controllers\Controller;
use App\Models\Leader;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CrudLeader extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $members = User::whereIn('jabatan', ['Supervisor Operasi', 'Supervisor Pemeliharaan'])->get();
        $data = Leader::orderBy('nip','asc')->get();
        return view('pages.admin.laporan.leader.data_laporan_leader',compact('data','members','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'nip' => 'required',
            'nama_lengkap' => 'required',
            'jabatan' => 'required'
        ]);

        Leader::updateOrCreate(['id' => $request->id],
        [
            'nip' => Str::upper($request->nip),
            'nama_lengkap' => $request->nama_lengkap,
            'jabatan' => Str::upper($request->jabatan),
        ]);        

        return response()->json([
            'success' => 'Successfully'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function chooise($nip)
    {
        $data = DB::table('users')->where('nip', $nip)->first();

        return response()->json(
            [
                'data' => $data,
                'success' => true,
            ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Leader::find($id);
        return response()->json($post);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Leader::find($id)->delete();
     
        return back()->with('success',' Record Deleted Successfully');
    }
}
