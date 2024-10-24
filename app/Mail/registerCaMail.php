<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterCaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $url;
    public $expiresAt;

    public function __construct($url, $expiresAt)
    {
        $this->url = $url;
        $this->expiresAt = $expiresAt;
    }

    public function build()
    {
        return $this->view('emails.whatsapplink')
            ->with([
                'url' => route('verify.email', ['token' => $this->url]),
                'expiresAt' => $this->expiresAt,
            ])
            ->subject('Whatsapp link group');
    }
}
