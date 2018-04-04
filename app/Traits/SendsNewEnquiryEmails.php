<?php

namespace App\Traits;

use App\Mail\EnquiryConfirmation;
use App\Mail\NewEnquiry;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

/**
 * Responsible for handling the sending of the new enquiry confirmation and notification
 * Trait SendsNewEnquiryEmails
 * @package App\Traits
 */
trait SendsNewEnquiryEmails
{

    public function sendMail($enquiry)
    {
        $this->sendNewEnquiryNotification($enquiry);
        $this->sendNewEnquiryConfirmation($enquiry);
    }

    private function sendNewEnquiryNotification($enquiry)
    {
        Mail::to(config('app.admin_email'))->send(new NewEnquiry($enquiry));
    }

    private function sendNewEnquiryConfirmation($enquiry)
    {
        Mail::to($enquiry->email)->send(new EnquiryConfirmation($enquiry));
    }

}