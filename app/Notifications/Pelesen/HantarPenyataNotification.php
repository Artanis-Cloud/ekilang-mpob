<?php

namespace App\Notifications\Pelesen;

use App\Mail\Admin\DaftarPentadbirMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class HantarPenyataNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($kepada, $daripada)
    {
        // dd($daripada);
        $this->kepada = $kepada;
        $this->daripada = $daripada;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        // $daripada = $this->daripada;
        // $kepada = $this->kepada;

        // if ($kepada['email'] != '-') {
                // return (new DaftarPentadbirMail($daripada, $kepada, $notifiable->created_at))->to($kepada['email']);
        // }else{
        //     return redirect()->route('admin.senarai.pentadbir')
        //     ->with('error', 'Maklumat telah dikemaskini');
        // }



    }

    public function toDatabase($notifiable)
    {
    // dd($notifiable);

        $route = route('buah.hantar.penyata');
        $month = date('m') - 1;
        if ($month == 1) {
            $bulan = 'Januari';
        }
        elseif ($month == 2){
            $bulan = 'Februari';
        }
        elseif ($month == 3){
            $bulan = 'Mac';
        }
        elseif ($month == 4){
            $bulan = 'April';
        }
        elseif ($month == 5){
            $bulan = 'Mei';
        }
        elseif ($month == 6){
            $bulan = 'Jun';
        }
        elseif ($month == 7){
            $bulan = 'Julai';
        }
        elseif ($month == 8){
            $bulan = 'Ogos';
        }
        elseif ($month == 9){
            $bulan = 'September';
        }
        elseif ($month == 10){
            $bulan = 'Oktober';
        }
        elseif ($month == 11){
            $bulan = 'November';
        }
        else{
            $bulan = 'Disember';
        }

        return [
            'kepada' => $this->kepada,
            'daripada' => $this->daripada,
            'tajuk' => "Penyata Bulan {$bulan} Sudah Dihantar",
            'created_at' => $notifiable->created_at,
            'route' => $route
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
