<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        // Hier kun je later berichten ophalen uit de database
        return view('home.message');
    }

    // Verwerk het verzenden van een bericht
    public function send(Request $request)
    {
        // Validatie en opslag van het bericht
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        // Hier kun je de code toevoegen om het bericht op te slaan in de database

        return redirect()->route('messages.index')->with('status', 'Bericht verzonden!');
    }
}
