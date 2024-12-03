<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmacionCita extends Mailable
{
    use Queueable, SerializesModels;

    public $appointment;
    public $services;

    /**
     * Create a new message instance.
     *
     * @param  mixed $appointment
     * @param  mixed $services
     * @return void
     */
    public function __construct($appointment, $services)
    {
        $this->appointment = $appointment;
        $this->services = $services;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.Confirmacion')
                    ->subject('Confirmación de tu cita')
                    ->with([
                        'appointment' => $this->appointment,
                        'services' => $this->services,
                    ]);
    }
}
