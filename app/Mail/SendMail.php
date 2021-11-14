<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $title;
    public $otp;
    public $airline_details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($airline_details,$otp,$title)
    {   
        $this->$airline_details=$airline_details;
       
        $this->title=$title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->title)->view('airline');
    }
}