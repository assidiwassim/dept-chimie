<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class accepte extends Notification
{
    use Queueable;
    private $type;
    private $Reponseannonce;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($Reponseannonce ,$type)
    {   
        $this->Reponseannonce =$Reponseannonce;
        $this->type =$type;
      
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
         if($this->type=="confirmer")
        {
        return [
            'type' => 'confirmer',
            'annonce_id' => $this->Reponseannonce->id,
            'user_id'  => Auth::user()->id,
            'avatar' => Auth::user()->logo,
            'text' => 'Le labo '.Auth::user()->name.' est confirmer notre demande'
            
        ];
    }
        else
        {
            return [
                'type' => 'annuler',
                'annonce_id' => $this->annonce->id,
                'user_id'  => Auth::user()->id,
                'avatar' => Auth::user()->logo,
                'text' => 'Le labo '.Auth::user()->name.' à publier une nouvelle annonce'
                
            ];
        }

    }
}
