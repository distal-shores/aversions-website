<?php

namespace App\Http\Controllers;

use App\ContactEntry;
use App\Mail\ContactReceived;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function __construct()
    {
        $this->rules = array(
            'name' => 'required',
            'email' => 'email|required',
            'subject' => 'required',
            'message' => 'required',
        );
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JSON
     */
    public function receiveEntry(Request $request)
    {
        $this->validate($request, $this->rules);
        $requestParams = array(
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        );
        $entry = ContactEntry::create($requestParams);
        Mail::to(env("MAIL_FROM_ADDRESS", "band@aversionsband.com"))->send(new ContactReceived($entry));
        return response()->json(array(
            'success' => true,
            'message'   => 'Thanks for reaching out! Someone from the band will get back to you forthwith.'
        )); 
    }
}