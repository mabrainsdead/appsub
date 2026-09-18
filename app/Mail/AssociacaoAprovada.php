<?php

namespace App\Mail;

use App\Models\Associacao;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AssociacaoAprovada extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Associacao $associacao
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Sua associação à APPS foi aprovada!',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.associacao-aprovada',
        );
    }
}
