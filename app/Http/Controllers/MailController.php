<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class MailController extends Controller
{
    public function sendEmail()
    {
        $details = [
            'title' => 'Mail from me!',
            'body' => 'Body of mail'
        ];
        Mail::to("marko00djokic@gmail.com")->send(new TestMail($details));
    }
}
