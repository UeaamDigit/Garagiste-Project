<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\DemoMail;

class MailController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */



    public function index()
    {
        return view('emails.formEmail');
    }

    public function sendEmail(Request $request)
    {
        $maildata = $request->validate([
            'email' => 'required|email',
            'title' => 'required',
            'body' => 'required'
        ]);
        Mail::to($maildata['email'])->send(new DemoMail($maildata));

        dd("Email is sent successfully.");
    }
}
