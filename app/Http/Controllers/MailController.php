<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SampleMail;

class MailController extends Controller
{
    public function sendEmail()
    {
        Mail::to('fake@mail.com')->send(new SampleMail);
        return view('user');
    }
}
