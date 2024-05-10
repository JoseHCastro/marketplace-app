<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SupportRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    /**
     * Create a new message instance.
     * 
     * @param array $details
     */
    
    public function __construct($details)
    {
        $this->details = $details;
    }

    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Support Request')
                    ->view('emails.supportRequest')
                    ->with(['details' => $this->details]);
    }

}
