<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecuperarPasswordMail extends Mailable
{
    use SerializesModels;

    public $signedUrl;

    public function __construct($signedUrl)
    {
        $this->signedUrl = $signedUrl;
    }

    public function build()
    {
        return $this->subject('Restablecer tu Contraseña')
                    ->view('emails.password-reset')  
                    ->with([
                        'url' => $this->signedUrl,
                    ]);
    }
}