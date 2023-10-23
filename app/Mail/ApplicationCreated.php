<?php

namespace App\Mail;

use App\Models\Applications;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApplicationCreated extends Mailable
{
    use Queueable, SerializesModels;


    public $application;
    /**
     * Create a new message instance.
     */
    public function __construct(Applications $application)
    {
        $this->application = $application;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('test@gmail.com', 'Manager'),
            subject: ('Application Created')
        );
    }

    /**
     * Get the message content definition.
     */
    public function content()
    {
        return new Content(
             'emails.application-create'
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        if (is_null($this->application->file_url)){
            return [
              //
            ];
        }else{
            return [
                Attachment::fromStorageDisk('public', $this->application->file_url)
            ];
        }

    }
}
