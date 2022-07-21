<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Lista;

class EnviarLista extends Mailable
{
    use Queueable, SerializesModels;

    public $lista;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Lista $lista)
    {
        $this->lista = $lista;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.lista');
    }
}
