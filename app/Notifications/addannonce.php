<?php

namespace App\Notifications;
use Auth;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class addannonce extends Notification
{
    use Queueable;
   private $annonce;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($annonce)
    {   
        $this->annonce =$annonce;
      
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
    public function toDatabase($notifiable)
    {
        return [
            'id' => $this->annonce->id,
            'avatar' => Auth::user()->logo,
            'text' => 'ilya une nouvelle annonce '
            
        ];
    }
}
