<?php

namespace App\Http\Controllers\Sootblower;

use App\Http\Controllers\Controller;
use App\Models\Sootblower;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class SootblowerController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $date = Carbon::now()->format('Y-m-d');
        $data = Sootblower::with('users')->latest()->where('operator_shift', Auth::user()->tim_divisi)->get();
        $data_latest = Sootblower::with('users')->orderBy('tanggal_update','desc')->take(2)->get();
        return view('pages.Sootblowers.index', compact('data','date', 'user','data_latest'));
    }
}
