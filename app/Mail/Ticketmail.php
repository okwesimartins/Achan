<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Ticketmail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $title;
    public $user_details;
    public $ticket_link;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title,$user_details,$ticket_link)
    {
        $this->title=$title;
        $this->user_details=$user_details;
        $this->ticket_link=$ticket_link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->title)->view('ticket');
    }
}
