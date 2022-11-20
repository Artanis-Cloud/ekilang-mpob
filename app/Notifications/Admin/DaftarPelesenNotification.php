<?php

namespace App\Notifications\Admin;

use App\Mail\Admin\DaftarPentadbirMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DaftarPelesenNotification extends Notification
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


    }

    public function toDatabase($notifiable)
    {
    // dd($notifiable);
    // dd($this->daripada);
        if ($this->daripada->category == 'PL91') {
            $route = route('admin.senaraipelesenbuah');

        }
        elseif ($this->daripada->category == 'PL101'){
            $route = route('admin.senaraipelesenpenapis');

        }
        elseif ($this->daripada->category == 'PL102'){
            $route = route('admin.senaraipelesenisirung');

        }
        elseif ($this->daripada->category == 'PL104'){
            $route = route('admin.senaraipelesenoleokimia');

        }
        elseif ($this->daripada->category == 'PL111'){
            $route = route('admin.senaraipelesensimpanan');

        }
        elseif ($this->daripada->category == 'PLBIO'){
            $route = route('admin.senaraipelesenbio');

        }

        return [
            'kepada' => $this->kepada,
            'daripada' => $this->daripada,
            'tajuk' => 'Terdapat Pelesen Baharu Sudah Berdaftar',
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
