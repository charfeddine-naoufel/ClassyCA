<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|max:255',
            'email'   => 'required|email',
            'tel'     => 'nullable|max:20',
            'message' => 'required'
        ]);

        // Mail::to(config('mail.from.address'))
        //     ->send(new ContactMail($request->all()));
        Mail::to(config('mail.from.address'))->send((new ContactMail($request->all()))
            ->replyTo($request->email, $request->name)
    );

        return back()->with('success', 'Votre message a été envoyé avec succès.');
    }
}