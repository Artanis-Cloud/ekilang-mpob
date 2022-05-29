<?php

namespace App\Notifications\Admin;

use App\Mail\Admin\DaftarPentadbirMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DaftarPentadbirNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($kepada, $daripada)
    {
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
        $daripada = $this->daripada;
        $kepada = $this->kepada;

        return (new DaftarPentadbirMail($daripada, $kepada, $notifiable->created_at))->to($kepada['email']);
    }

    public function toDatabase($notifiable)
    {
        $route = route('admin.senarai.pentadbir');
        return [
            'kepada' => $this->kepada,
            'daripada' => $this->daripada,
            'tajuk' => 'Terdapat Pengguna Baharu Sudah Berdaftar',
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
