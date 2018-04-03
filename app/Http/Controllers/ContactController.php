<?php

namespace App\Http\Controllers;

use App\Enquiry;
use App\Events\NewEnquiry;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Event;

class ContactController extends Controller
{
    public function submit(ContactRequest $request)
    {
        // attempt to store enquiry in the database
        if ($enquiry = Enquiry::create(
            $request->only(
                ['name', 'email', 'text']
            )
        )) {

            // trigger the enquiry sent event - by using events we can queue this, to avoid the user having to wait and handle any errors elsewhere
            Event::fire(new NewEnquiry($enquiry));

        } else {

            // return a failed response
            return response()->json(['success' => false], 500);
        }

        // return response
        return response()->json(['success' => true], 200);
    }
}
