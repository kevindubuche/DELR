<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewContamineNotification extends Mailable
{
    use Queueable, SerializesModels;
    public  $receiver;
    public  $totalContamines;
    public  $institution;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($demo)
    {
        $this->receiver = $demo->receiver;
        $this->totalContamines = $demo->totalContamines;
        $this->institution = $demo->institution;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('delrcovid19@gmail.com')
        ->view('emails.newContamineNotification');
    }
}
