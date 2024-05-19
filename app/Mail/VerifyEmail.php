<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    protected $code;
    public function __construct($code)
    {
        $this->code = $code;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        $code = $this->code;
        return $this->view('mail.verify' , compact('code'));
    }
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'Verify Email',
    //     );
    // }

    /**
     * Get the message content definition.
     */
    // public function content()
    // {
    //     $code = $this->code;
    //     return $this->view('mail.verify' , compact('code'));
    //     // new Content(
    //     //     // view('mail.verify' , compact('code')),
    //     // );
    // }

    // /**
    //  * Get the attachments for the message.
    //  *
    //  * @return array<int, \Illuminate\Mail\Mailables\Attachment>
    //  */
    // public function attachments(): array
    // {
    //     return [];
    // }
}