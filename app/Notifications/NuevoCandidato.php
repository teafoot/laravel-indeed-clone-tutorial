<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoCandidato extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($vacante, $id_vacante) // titulo y id
    {
        $this->vacante = $vacante;
        $this->id_vacante = $id_vacante;
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
    public function toMail($notifiable) // estamos usando mailtrap
    {
        return (new MailMessage)
                    ->line('Has recibido un nuevo candidato en tu vacante.')
                    ->line('La vacante es: ' . $this->vacante)
                    ->action('Vísita devJobs', url('/'))
                    ->line('Gracias por utilizar devjobs');
    }

    // notificaciones en la BD
    public function toDatabase($notifiable) // estamos usando notifications migration
    {
        return [ // se almacena en la columna data como un objeto json string
            'vacante' => $this->vacante,
            'id_vacante' => $this->id_vacante
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
