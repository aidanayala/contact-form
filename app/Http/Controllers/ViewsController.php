<?php

namespace App\Http\Controllers;

use App\Enquiry;
use Illuminate\Http\Request;

/**
 * Class ViewsController
 * Handles the display of any app views
 * @package App\Http\Controllers
 */
class ViewsController extends Controller
{
    //
    public function index()
    {
        // show the contact form
        return view('contact');
    }

    public function enquires()
    {
        // get enquiries
        $enquiries = Enquiry::all();

        // make the enquiries view, passing any enquiries
        return view('enquiries', compact('enquiries'));
    }
}
