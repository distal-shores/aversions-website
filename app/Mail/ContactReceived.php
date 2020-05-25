<?php

namespace App\Mail;

use App\ContactEntry;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactReceived extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The contact entry instance.
     *
     * @var Contact Entry
     */
    public $entry;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContactEntry $entry)
    {
        $this->entry = $entry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.contact_received')
                    ->text('mail.contact_received-plain');
    }
}
