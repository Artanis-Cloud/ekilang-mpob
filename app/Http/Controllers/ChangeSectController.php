<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Daerah;
use App\Models\H91Init;
use App\Models\Ekmessage;
use App\Models\Negeri;
use App\Models\Pelesen;
use App\Models\Pengumuman;
use App\Models\RegPelesen;
use App\Models\User;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;
use DB;
use Illuminate\Support\Facades\Auth;

class ChangeSectController extends Controller
{

    public function login_multi(Request $request)
    {
        // $user = User::where('username', $request->username)->where('category', $request->category)->first();
        // Auth::loginUsingId($user->id);

        // if($request->category == 'PL102') {
        //     return redirect()->route('isirung.dashboard');
        // }

        // if($request->category == 'PL101') {
        //     return redirect()->route('penapis.dashboard');
        // }
        $users = User::where('username', auth()->user()->username)->get();

        return view('auth.login_multi', compact('users'));

    }

    public function multiLogin2(Request $request)
    {
        // dd($request->all());
        $user = User::where('username', $request->username)->where('category', $request->category)->first();
        Auth::loginUsingId($user->id);

        if($request->category == 'PL91') {
            return redirect()->route('buah.dashboard');
        }

        if($request->category == 'PL101') {
            return redirect()->route('penapis.dashboard');
        }

        if($request->category == 'PL102') {
            return redirect()->route('isirung.dashboard');
        }

        if($request->category == 'PL104') {
            return redirect()->route('oleo.dashboard');
        }

        if($request->category == 'PL111') {
            return redirect()->route('pusatsimpan.dashboard');
        }

        if($request->category == 'PLBIO') {
            return redirect()->route('bio.dashboard');
        }
    }
}
