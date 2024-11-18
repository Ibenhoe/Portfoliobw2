<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Click;
use Illuminate\Support\Facades\Auth;

class HOmeController extends Controller
{
    public function index()
    {
        $newsItems = News::with('comments.user')->orderBy('created_at', 'desc')->take(5)->get();
        

        // Controleer of de gebruiker is ingelogd
        
        $userClicks = 0;

    // Controleer of de gebruiker is ingelogd
        if (Auth::check()) {
            $user = Auth::user();
            
            // Gebruik de relatie om het aantal klikken van de gebruiker op te halen
            $userClicks = $user->clicks->click_count ?? 0; // Als geen record, gebruik 0
        }

        // Retourneer de view met de nieuwsitems
        return view('home.index', compact('newsItems', 'userClicks'));
    }
}
