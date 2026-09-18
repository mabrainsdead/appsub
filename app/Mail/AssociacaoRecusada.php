<?php

namespace App\Mail;

use App\Models\Solicitacao;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AssociacaoRecusada extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Solicitacao $solicitacao
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Sua solicitação de associação - APPS',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.associacao-recusada',
        );
    }
}
