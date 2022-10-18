<?php

namespace App\Mail\Pelesen;

use App\Models\RegPelesen;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class HantarTukarPasswordPelesenMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pelesen, $password)
    {
        $this->pelesen = $pelesen;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $pelesen = $this->pelesen;
        $password = $this->password;

        $route = route('login');
        $reg_pelesen = User::where('username', $pelesen->username)->first();
        if($reg_pelesen->category == 'PL91'){
            $route = route('buah.tukarpassword');
        }
        elseif($reg_pelesen->category == 'PL101'){
            $route = route('penapis.tukarpassword');
        }
        elseif($reg_pelesen->category == 'PL102'){
            $route = route('isirung.tukarpassword');
        }
        elseif($reg_pelesen->category == 'PL104'){
            $route = route('oleo.tukarpassword');
        }
        elseif($reg_pelesen->category == 'PL111'){
            $route = route('pusatsimpan.tukarpassword');
        }
        elseif($reg_pelesen->category == 'PLBIO'){
            $route = route('bio.tukarpassword');
        }
        elseif($reg_pelesen->category == 'admin'){
            $route = route('admin.tukarpassword');
        }

        return $this->to($this->pelesen->email, $this->pelesen->name)
        ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
        ->subject('Tukar Kata Laluan '. $this->pelesen->username)
        ->view('email.pelesen.pendaftaran', compact('pelesen', 'password', 'route'));    }
}
