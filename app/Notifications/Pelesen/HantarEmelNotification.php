<?php

namespace App\Notifications\Pelesen;

use App\Mail\Pelesen\HantarEmelMail;
use App\Mail\Pelesen\HantarPendaftaranPelesenMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class HantarEmelNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($emel, $tajuk, $mesej)
    {
        // $this->name = auth()->users->name;
        // $this->email = auth()->users->email;
        $this->emel = $emel;
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
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new HantarEmelMail($notifiable, $this->emel, $this->tajuk, $this->mesej))->to($notifiable->email);
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
