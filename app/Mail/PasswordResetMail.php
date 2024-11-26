<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordResetMail extends Mailable
{
    use SerializesModels;

    public $resetUrl; // Definimos la propiedad para recibir el enlace de restablecimiento

    /**
     * Crear una nueva instancia del mensaje.
     *
     * @param string $resetUrl
     */
    public function __construct($resetUrl)
    {
        $this->resetUrl = $resetUrl; // Asignamos el valor del enlace a la propiedad
    }

    /**
     * Construir el mensaje.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Restablecer tu contraseña') // Establecemos el asunto
                    ->view('emails.reset-password'); // Especificamos la vista que se utilizará para el correo
    }
}
