<?php

namespace App\Mail\CustomForgetPassword;

use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = $this->user;
        $password = $this->password;


        $route = route('login');
        $users = User::where('username', $user->username)->first();
        if($users->category == 'PL91'){
            $route = route('buah.tukarpassword');
        }
        elseif($users->category == 'PL101'){
            $route = route('penapis.tukarpassword');
        }
        elseif($users->category == 'PL102'){
            $route = route('isirung.tukarpassword');
        }
        elseif($users->category == 'PL104'){
            $route = route('oleo.tukarpassword');
        }
        elseif($users->category == 'PL111'){
            $route = route('pusatsimpan.tukarpassword');
        }
        elseif($users->category == 'PLBIO'){
            $route = route('bio.tukarpassword');
        }


        $pw_reset = PasswordReset::where('email', $user->email)->first();

        $token = $pw_reset->token;

        return $this->to($this->user->email, $this->user->name)
            ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
            ->subject('Tetapan Semula Kata Laluan')
            ->view('email.password.reset-password', compact('user', 'token'));
    }
}
