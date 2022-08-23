<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TuMensajeFueRecibido extends Mailable
{
    use Queueable, SerializesModels;

    public $data; // es necesario que esta propiedad sea pública para que podamos tener acceso a cualquier variable que le pasemos al constructor, desde dentro de la vista

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contact');
    }
}
