<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class IngresodeDatosMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Carga de Factura en el Sistema";
    public function __construct()
    {
        //
    }

    public function build()
    {
        return $this->view('emails.IngresodeDatos');
    }
}