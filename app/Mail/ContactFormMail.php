<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{

    use Queueable;
    use SerializesModels;

    public $contactData;

    /**
     * Create a new message instance.
     *
     * @param  array  $contactData
     *
     * @return void
     */
    public function __construct(array $contactData)
    {
        $this->contactData = $contactData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))
                    ->subject('New Contact Form Submission')
                    ->view('well.pages.contact')
                    ->with('contactData', $this->contactData);
    }

}
