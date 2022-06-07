<?php

namespace App\Mail\Pelesen;

use App\Models\RegPelesen;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class HantarPendaftaranPelesenMail extends Mailable
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
        $reg_pelesen = RegPelesen::where('e_nl', $pelesen->username)->first();
        if($reg_pelesen->e_kat == 'PL91'){
            $route = route('buah.tukarpassword');
        }elseif($reg_pelesen->e_kat == 'PL101'){
            $route = route('buah.tukarpassword');
        }

        return $this->to($this->pelesen->email, $this->pelesen->name)
        ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
        ->subject('Pendaftaran Pelesen Berjaya '. $this->pelesen->username)
        ->view('email.pelesen.pendaftaran', compact('pelesen', 'password', 'route'));    }
}
