<?php

namespace App\Mail\Pelesen;

use App\Models\RegPelesen;
use DateTime;
use DateTimeZone;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class HantarEmelMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pelesen, $emel, $tajuk, $mesej)
    {
        // $this->name = auth()->users->name;
        // $this->email = auth()->users->email;
        $this->pelesen = $pelesen;
        $this->emel = $emel;
        $this->tajuk = $tajuk;
        $this->mesej = $mesej;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $pelesen = $this->pelesen;

        $time = new DateTime();
        $tz = new DateTimeZone('Asia/Kuala_Lumpur');
        $time->setTimezone($tz);
        $time->format('dd-mm-yyyy H:i:s');
        $time2 = $time;
        $jenis = $this->emel;
        $tajuk = $this->tajuk;
        $mesej = $this->mesej;
        $penyata1 = date('m') - 1;
        $penyata2 = date('Y');


        return $this->to($this->pelesen->email, $this->pelesen->name)
        ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
        ->subject('Penghantaran Emel Berjaya'. $this->pelesen->username)
        ->view('email.pelesen.emel', compact('pelesen', 'time', 'tz','tajuk','mesej', 'penyata1', 'penyata2','jenis','time2'));    }
}
