<?php

namespace App\Mail;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendEmailWithGames extends Mailable
{
    use Queueable, SerializesModels;


    public $games;
    
    public function __construct($products)
    {
        $this->games = $products;
    }


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Olha as novidades ! 10 jogos para você',
            tags: ['Jogos', 'Recomendações']
        );
    }


    public function content(): Content
    {
        return new Content(
            html: 'emails.ListWithTenGamesTemplate',
        );
    }


    public function attachments(): array
    {
        $pdf = Pdf::loadView('pdfs.ListWithTenGamesPdf', [ 'games' => $this->games]);

        return [
            Attachment::fromData(fn () => $pdf->output())
            ->as('sugestoes_jogos.pdf')
            ->withMime('application/pdf')
        ];
    }
}
