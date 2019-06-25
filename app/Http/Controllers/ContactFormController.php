<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        //return view('contact.create');
        //dd(request()->all());

        //send email
        Mail::to('leoc@casa-latina.org')->send(new ContactFormMail($data));

        session()->flash('message', 'Thanks for your message. We\'ll be in touch . ');
        return redirect('contact');
    }
}
