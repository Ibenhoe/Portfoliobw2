<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactResponseMail;

class ContactController extends Controller
{
    public function index()
   {
        $contacts = Contact::all();
         return view('admin.contacts.index', compact('contacts'));
    }

   public function reply(Contact $contact)
   {
       return view('admin.contacts.reply', compact('contact'));
   }

    public function sendReply(Request $request, Contact $contact)
    {
       $request->validate([
           'response' => 'required|string|max:1000'
        ]);
       $contact->update([
        'response' => $request->response
       ]);
      Mail::to($contact->email)->send(new ContactResponseMail($contact));
      return redirect()->route('admin.contacts.index')->with('success', 'Antwoord is verzonden');
    }
}