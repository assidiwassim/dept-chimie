<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class accepte extends Notification
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

    public function toDatabase($notifiable)
    { 
        return [
            'type' => 'addannonce',
            'annonce_id' => $this->annonce->id,
            'user_id'  => Auth::user()->id,
            'avatar' => Auth::user()->logo,
            'text' => 'Le labo '.Auth::user()->name.' à publier une nouvelle annonce'
            
        ];
    }
}
