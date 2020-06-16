<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class Reset extends Mailable{
    use Queueable, SerializesModels;
   
    public $user;
    public $codigo;

    public function __construct(User $user, $codigo){
        
        $this->user = $user;
        $this->codigo = $codigo;
    }

    public function build(){
         $asunto="Blatt! | Recuperacion de clave";
     return $this->view('auth.passwords.recuperar_clave')->subject($asunto);
    }
}