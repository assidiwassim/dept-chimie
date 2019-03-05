<?php

namespace App\Notifications;
use Auth;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class confirme extends Notification
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
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
 

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    { 
        if($this->annonce->typeannonce=="Demande")
        {
            return [

            'type' => 'demande',
            'annonce_id' =>$this->annonce->id,
            'user_id'  => Auth::user()->id,
            'avatar' => Auth::user()->logo,
            'type' => 'demande',
            'text' => 'votre annonce est demandeé  par  '.Auth::user()->name           
        ];
    }
        else
                {
            return [

                'type' => 'confirme',
                'annonce_id' =>$this->annonce->id,
                'user_id'  => Auth::user()->id,
                'avatar' => Auth::user()->logo,
                'text' => 'votre annonce est confirmé par  '.Auth::user()->name           
            ]; 
        }
        
    }
}
