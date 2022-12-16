<?php

namespace App\Http\Controllers;

use App\Mail\CustomForgetPassword\ResetPasswordMail;
use App\Models\PasswordReset;
use App\Models\User;
use App\Notifications\Pelesen\HantarPendaftaranPelesenNotification;
use App\Notifications\Pelesen\HantarTukarPasswordPelesenNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use stdClass;

class ForgetPasswordController extends Controller
{
    public function forgetPassword()
    {
        return view('auth.passwords.email');
    }

    public function forgetPasswordSubmit(Request $request)
    {
        // dd($request->all());
        $kat = $request->kat;

        if ($kat == 'pelesen') {
            $emel = User::where('username', $request->lesen)->get();
        } else {
            $emel = User::where('username', $request->admin)->first();
        }
        // dd($emel);

        if (count($emel) > 1) {
            foreach ($emel as $key => $cat) {
                $cat2[$key] = $cat->category;
            }
            // dd($cat2);
            $lesen = $request->lesen;
            return view('auth.passwords.email_2_sect', compact('cat2', 'lesen'));
        } else {

            foreach ($emel as $emel2) {
                # code...
                if ($emel2->email == NULL || $emel2->email == '' || $emel2->email == '-') {
                    return redirect()->back()->with('error', 'Pengguna tiada emel. Sila hubungi administator untuk penetapan emel pengguna');
                } else {
                    if ($kat == 'pelesen') {
                        $custom_pass = Str::random(8);

                        $pelesen = User::where('username', $request->lesen)->first();
                        $pelesen->password = Hash::make($custom_pass);
                        $pelesen->crypted_pass = Crypt::encryptString($custom_pass);

                        $pelesen->save();
                    } else {
                        $custom_pass = Str::random(8);
                        $pelesen = User::where('username', $request->admin)->first();
                        $pelesen->password = Hash::make($custom_pass);
                        $pelesen->save();
                    }
                }
                if (!$pelesen) {
                    return redirect()->back()->with('error', 'Lesen tidak berdaftar dalam sistem ini.');
                }
                $pelesen->notify((new HantarTukarPasswordPelesenNotification($custom_pass)));




                return redirect()->route('login')->with('success', 'Tukar kata laluan BERJAYA. Kata laluan sementara telah dihantar ke emel kilang anda.');
            }
        }
    }

    public function forgetPasswordSubmit2(Request $request)
    {
        // dd($request->all());
        $kat = $request->kat;
        $lesen = $request->nolesen;


        $emel = User::where('username', $lesen)->where('category', $kat)->first();


        if ($emel->email == NULL || $emel->email == '' || $emel->email == '-') {
            return redirect()->back()->with('error', 'Pengguna tiada emel. Sila hubungi administator untuk penetapan emel pengguna');
        } else {
            // if ($kat == 'pelesen') {
            $custom_pass = Str::random(8);

            $pelesen = User::where('username', $lesen)->where('category', $kat)->first();
            $pelesen->password = Hash::make($custom_pass);
            $pelesen->crypted_pass = Crypt::encryptString($custom_pass);

            $pelesen->save();

            if (!$pelesen) {
                return redirect()->back()->with('error', 'Lesen tidak berdaftar dalam sistem ini.');
            }
            $pelesen->notify((new HantarTukarPasswordPelesenNotification($custom_pass)));


            return redirect()->route('login')->with('success', 'Tukar kata laluan BERJAYA. Kata laluan sementara telah dihantar ke emel kilang anda.');
        }
    }



    public function customChangePassword(Request $request)
    {
        // dd($request->all());
        if ($request->password != $request->password_confirmation) {
            return redirect()->back()->with('error', 'Kata laluan pengesahan tidak sama.');
        }

        if (strlen($request->password) < 8) {
            return redirect()->back()->with('error', 'Kata laluan perlu mempunyai 8 huruf atau lebih.');
        }

        //save password
        $hashed_password = Hash::make($request->password);

        $user = User::where('email', $request->email)->first();

        $user->password = $hashed_password;

        $user->save();

        //delete token from password reset
        $delete_token = PasswordReset::where('token', $request->token)->delete();

        return redirect()->route('login')->with('success', 'Kata laluan baru telah dikemaskini.');
    }
}
