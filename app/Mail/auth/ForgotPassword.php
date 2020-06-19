<?php

namespace App\Mail\auth;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $linkToReset;

    /**
     * Create a new message instance.
     *
     * @param $linkToReset
     */
    public function __construct($linkToReset)
    {
        $this->linkToReset = $linkToReset;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.forgotPassword')->from('noreply@facelook.com', 'FaceLook')->with($this->linkToReset);
    }
}
