<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomResetEmail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public $resetLink;

    /**
     * Create a new message instance.
     *
     * @param string $resetLink
     */
    public function __construct(string $resetLink)
    {
        $this->resetLink = $resetLink;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): Mailable
    {
        return $this->view('email.reset-password-email')
            ->with([
                'resetLink' => $this->resetLink,
            ]);
    }
}
