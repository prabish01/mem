<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewJobNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $jobapplication;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($jobapplication)
    {
        $this->jobapplication = $jobapplication;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.newjobnotification');
    }
}

