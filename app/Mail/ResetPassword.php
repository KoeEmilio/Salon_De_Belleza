<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $signedUrl;

   
    public function __construct(User $user, $signedUrl)
    {
        $this->user = $user;
        $this->signedUrl = $signedUrl;
    }

 
    public function envelope()
    {
        return new Envelope(
            subject: 'Reset Password',
        );
    }

   
    public function content()
    {
        return new Content(
            view: 'emails.reset-password',
            with: [
                'nombre' => $this->user->name,
                'url' => $this->signedUrl
            ],
        );
    }


    public function attachments()
    {
        return [];
    }
}
