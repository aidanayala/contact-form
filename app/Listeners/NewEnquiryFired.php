<?php

namespace App\Listeners;

use App\Events\NewEnquiry;
use App\Mail\EnquiryConfirmation;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class NewEnquiryFired
{
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
        // send emails
        Mail::to($event->enquiry->email)->send(new EnquiryConfirmation($event->enquiry));
        Mail::to(config('app.admin_email'))->send(new \App\Mail\NewEnquiry($event->enquiry));
    }
}
