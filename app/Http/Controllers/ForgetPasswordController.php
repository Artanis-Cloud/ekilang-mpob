<?php

namespace App\Http\Controllers;

use App\Mail\CustomForgetPassword\ResetPasswordMail;
use App\Models\PasswordReset;
use App\Models\User;
use App\Notifications\Pelesen\HantarTukarPasswordPelesenNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class ForgetPasswordController extends Controller
{
    public function forgetPassword(){
        return view('auth.passwords.email');
    }

    public function forgetPasswordSubmit(Request $request){
        // dd($request->all());
        $kat = $request->kat;

        if ($kat == 'pelesen') {
            $user = User::where('username', $request->lesen)->first();
            $custom_pass = Str::random(8);

            $user = User::where('username', $request->lesen)->first();
            $user->password = Hash::make($custom_pass);
            $user->save();

        } else {
            $user = User::where('username', $request->admin)->first();
            $custom_pass = Str::random(8);

            $user = User::where('username', $request->admin)->first();
            $user->password = Hash::make($custom_pass);
            $user->save();

        }
        if (!$user) {
            return redirect()->back()->with('error', 'Lesen tidak berdaftar dalam sistem ini.');
        }

        // $password_reset = PasswordReset::create([
        //     'email' => $user->email,
        //     'token' => $request->_token,
        // ]);

        // Mail::send(new ResetPasswordMail($user, $custom_pass));
        $user->notify((new HantarTukarPasswordPelesenNotification($custom_pass)));


        return redirect()->route('login')->with('success', 'Sistem telah menghantar pautan tetapan semula kata laluan anda melalui emel!');
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
