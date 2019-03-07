<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Auth;
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
    public function __construct($Rep ,$tp)
    {   
        $this->Reponseannonce =$Rep;
        $this->type =$tp;
      
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
         if($this->type == "confirmer")
        {
                return [
                    'type' => $this->type,
                    'Reponseannonce_id' => $this->Reponseannonce->annonce_id,
                    'user_id'  => Auth::user()->id,
                    'avatar' => Auth::user()->logo,
                    'text' => 'Le labo '.Auth::user()->name.' est confirmer notre demande sur lannonce '.$this->Reponseannonce->id
                    
                ];
        }
        else
        {
                    return [
                        'type' => $this->type,
                        'Reponseannonce_id' =>$this->Reponseannonce->id,
                        'user_id'  => Auth::user()->id,
                        'avatar' => Auth::user()->logo,
                        'text' => 'Le labo '.Auth::user()->name.'est annuler notre demande sur lannonce '.$this->Reponseannonce->id
                    ];
        }

    }
}
