<?php

namespace App\Notifications\Pelesen;

use App\Mail\Pelesen\HantarPendaftaranPelesenMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class HantarPendaftaranPelesenNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($password, $kepada)
    {
        $this->password = $password;
        $this->kepada = $kepada;
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
        return (new HantarPendaftaranPelesenMail($notifiable, $this->password))->to($notifiable->email);
    }
    public function toDatabase($notifiable)
    {
    // dd($notifiable);
    // dd($this->kepada);
        if ($this->kepada->category == 'PL91') {
            $route = route('admin.senaraipelesenbuah');

        }
        elseif ($this->kepada->category == 'PL101'){
            $route = route('admin.senaraipelesenpenapis');

        }
        elseif ($this->kepada->category == 'PL102'){
            $route = route('admin.senaraipelesenisirung');

        }
        elseif ($this->kepada->category == 'PL104'){
            $route = route('admin.senaraipelesenoleokimia');

        }
        elseif ($this->kepada->category == 'PL111'){
            $route = route('admin.senaraipelesensimpanan');

        }
        elseif ($this->kepada->category == 'PLBIO'){
            $route = route('admin.senaraipelesenbio');

        }

        return [
            'kepada' => $this->kepada,
            'daripada' => $this->kepada,
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
