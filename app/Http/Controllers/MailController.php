<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function send ($request)
    {
        $data = $request;

        $mail = Mail::send('mail.ThankYou', $data, function ($message) {
            $message->subject('Subject');
            $message->to('skj996677@gmail.com', 'SaifUllah');
            // $message->from('john@johndoe.com', 'John Doe');
            // $message->sender('john@johndoe.com', 'John Doe');
            // $message->cc('john@johndoe.com', 'John Doe');
            // $message->bcc('john@johndoe.com', 'John Doe');
            // $message->replyTo('john@johndoe.com', 'John Doe');
            // $message->priority(3);
            // $message->attach('pathToFile');
        });
    }
}
