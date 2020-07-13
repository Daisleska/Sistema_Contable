<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App;
use App\cotizacion;
use App\cliente;

class email_Cotizacion extends Mailable{
    use Queueable, SerializesModels;


    public $cotizacion;
    public $pdf;

    public function __construct($cotizacion, $pdf){
        $this->cotizacion=$cotizacion;
         $this->pdf=$pdf;
    }

    public function build(){
        ini_set('max_execution_time', 360); //3 minutes 
        $cotizaciones=cotizacion::find($this->cotizacion);
         $email = $this->view('mails.email_cotizacion',compact('cotizaciones'))->subject('Cotizacion')->attachData($this->pdf, 'cotizacion.pdf', [
            'mime' => 'aplication/pdf', 
        ]);

        // $archivosadjuntos es una matriz con rutas de archivos de archivos adjuntos
        /* $archivosadjuntos = Files::where('quotation_id',$this->sector)->get();
        foreach($archivosadjuntos as $rutaArchivo){
            $email->attach(public_path().'/'.$rutaArchivo->url_file);
        }*/
        return $email;
    }
}