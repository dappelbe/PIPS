<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'pips@ndorms.ox.ac.uk';
        $name = "The PIPS Study";

        return $this->view('emails.welcome')
            ->from($address, $name)
            ->replyTo($address, $name)
            ->subject('Welcome to the PIPS Study')
            ->attach( public_path('PIPS(IMPROVE)_PIS_V1.0_18Aug2022.pdf') )
            ->attach( $this->data['path'] )
            ->with(['url' => url('/password/reset')])
            ->with(['home' => url('home')])
            ->with(['name' => $this->data['name']]);
    }
}
