<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DenunciaMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Información de la denuncia";
    public $mensaje;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($informacion)
    {
        $this->mensaje = $informacion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.denuncia.index');
    }
}
