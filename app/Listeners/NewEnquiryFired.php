<?php

namespace App\Listeners;

use App\Events\NewEnquiry;
use App\Traits\SendsNewEnquiryEmails;
use Illuminate\Support\Facades\Mail;

class NewEnquiryFired
{
    use SendsNewEnquiryEmails;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewEnquiry  $event
     * @return void
     */
    public function handle(NewEnquiry $event)
    {
        $this->sendMail($event->enquiry);
    }
}
