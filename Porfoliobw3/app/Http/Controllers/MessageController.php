<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function index()
    {
        return view('home.message');
    }

    public function send(Request $request)
    {
         $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $contact = Contact::create([
           'name' => auth()->check() ? auth()->user()->name : 'Guest',
            'email' => auth()->check() ? auth()->user()->email : 'No email',
           'message' => $request->message
       ]);
         Mail::to('admin@example.com')->send(new ContactFormMail($contact));
        return redirect()->route('home')->with('success', 'Bericht verzonden!');
    }
}
