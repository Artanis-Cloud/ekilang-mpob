<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DaftarPentadbirMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $daripada, $kepada, $status, $created_at;

    public function __construct($daripada, $kepada, $created_at)
    {
        $this->daripada = $daripada;
        $this->kepada = $kepada;
        $this->created_at = $created_at;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $route = route('admin.senarai.pentadbir');

        $tajuk = "Terdapat Pengguna Baharu Sudah Berdaftar";
        $perenggan_1 = $tajuk;
        $perenggan_2 = "<br>";
        $perenggan_3 = "<br>";
        $perenggan_4 = "<br>";

        $returnArr = [
            'user' => $this->daripada,
            'tajuk' => $tajuk,

            'perenggan_1' => $perenggan_1,
            'perenggan_2' => $perenggan_2,
            'perenggan_3' => $perenggan_3,
            'perenggan_4' => $perenggan_4,

            'route' => $route,
        ];
        // dd($this->kepada);
        return $this->to($this->kepada->email, $this->kepada->name)
            ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
            ->subject($tajuk)
            ->view('email.admin.daftar-pentadbir-mail', $returnArr);
    }
}
