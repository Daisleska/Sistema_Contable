<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class PasswordReset extends ResetPassword
{
    public function toMail($notifiable)
    {
        return (new MailMessage)
        
        ->subject('Recupera tu contraseña')
        ->greeting('Hola '. $notifiable->name)
        ->line('Estás recibiendo este correo porqué hiciste una solicitud de recuperación de contraseña para tu cuenta. Para elegir una nueva contraseña, has click en el botón de aquí abajo:')
        ->action('Recuperar contraseña', route('password.reset', $this->token))
        ->line('Si crees que tú no has creado esta cuenta, entonces,  no realices ninguna acción.')
        ->salutation('Un saludo de parte del equipo de Bienen');
    }
}