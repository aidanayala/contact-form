<?php

namespace App\Events;

use App\Enquiry;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class NewEnquiry
{
    use Dispatchable, SerializesModels;

    public $enquiry;

    public function __construct(Enquiry $enquiry)
    {
        //
         $this->enquiry = $enquiry;
    }

    public function broadcastOn()
    {
        return [];
    }
}
