<?php

namespace App\Notifications\Pelesen;

use App\Mail\Pelesen\HantarEmelMail;
use App\Mail\Pelesen\HantarEmelMail2;
use App\Mail\Pelesen\HantarPendaftaranPelesenMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class HantarEmelNotification2 extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($emel, $tajuk, $mesej, $kepada, $daripada)
    {
        // $this->name = auth()->users->name;
        // $this->email = auth()->users->email;
        $this->emel = $emel;
        $this->kepada = $kepada;
        $this->daripada = $daripada;
        // dd($this->emel);
        $this->tajuk = $tajuk;
        $this->mesej = $mesej;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // dd($notifiable);
        return (new HantarEmelMail2($notifiable, $this->emel, $this->tajuk, $this->mesej))->to($notifiable->email);
    }
    public function toDatabase($notifiable)
    {
    // dd($notifiable);

    if ($this->emel == 'pindaan') {
        $emel = 'Pindaan';
    } elseif($this->emel == 'cadangan')  {
        $emel = 'Cadangan';
    }   else {
        $emel = 'Pertanyaan';

    }

    // $route = redirect()->back();


        return [
            'kepada' => $this->kepada,
            'daripada' => $this->daripada,
            'tajuk' => "Emel {$emel} Sudah Dihantar",
            'created_at' => $notifiable->created_at,
            'route' => [],
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
