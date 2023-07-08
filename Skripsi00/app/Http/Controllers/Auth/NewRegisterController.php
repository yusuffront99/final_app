<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Leader;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NewRegisterController extends Controller
{
    public function new_register()
    {
        $leaders = Leader::orderBy('nama_lengkap','asc')->get();
        return view('auth.register', compact('leaders'));
    }

    public function processRegistration(Request $request)
    {
        // Validasi input
        $this->validate($request, [
            'nama_lengkap' => 'required',
            'nip' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'nama_panggilan' => 'required',
            'divisi' => 'required',
            'tim_divisi' => 'required',
            'jabatan' => 'required',
            'atasan' => 'required',
        ]);

        // Buat pengguna baru
        $user = new User();
        $user->nip = $request->nip;
        $user->nama_lengkap = $request->nama_lengkap;
        $user->nama_panggilan = $request->nama_panggilan;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->divisi = $request->divisi;
        $user->tim_divisi = $request->tim_divisi;
        $user->jabatan = $request->jabatan;
        $user->atasan = $request->atasan;
        $user->profile_img = $request->profile_img;
        $user->save();

        // Redirect atau berikan respons sesuai kebutuhan
        return response()->json([
            'success' => 'Added Data Successfully'
        ], 200);

    }
}
