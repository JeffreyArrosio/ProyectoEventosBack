<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EventJoined extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $event;
    /**
     * Create a new message instance.
     */
    public function __construct($user, $event)
    {
        $this->user = $user;
        $this->event = $event;
    }

    /**
     * Get the message envelope.
     */

    public function build()
    {
        return $this->subject('Unido a un Evento')
            ->view('emails.event_joined');
    }
}
