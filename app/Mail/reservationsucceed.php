<?php

namespace App\Mail;

use App\Models\Reservation;
use App\Models\Venue;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class reservationsucceed extends Mailable
{
    use Queueable, SerializesModels;

    public $reservation, $venue;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Reservation $reservation, Venue $venue)
    {
        $this->reservation = $reservation;
        $this->venue = $venue;
        //
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Επιτυχής Κράτηση',


        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'Mails.ReservationSuccess'
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }

    public function build()
    {

        $subject = "Επιτυχής Κράτηση";
        return $this
            ->subject($subject)->attach(public_path('images/poster.jpg'))->with(['reservation' => $this->reservation, 'venue' => $this->venue]);
    }
}
