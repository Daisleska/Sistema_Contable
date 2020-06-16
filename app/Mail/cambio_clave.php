<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class cambio_clave extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $clave_nueva;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $clave_nueva)
    {
        $this->user = $user;
        $this->clave_nueva = $clave_nueva;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $asunto="Blatt! | Cambio de clave de acceso";
     return $this->view('mails.cambio_clave')->subject($asunto);
    }
}
