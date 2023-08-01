<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $waSendLink;

    public function __construct($waSendLink)
    {
        $this->waSendLink = $waSendLink;
    }

    public function build()
    {
        return $this->view('emails.walink')
            ->with(['waSendLink' => $this->waSendLink])
            ->subject('Whatsapp Link');
    }

}
