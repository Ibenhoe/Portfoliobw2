<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use App\Models\Click;


class NewsController extends Controller
{
    public function index()
    {
        // Haal de nieuwste berichten op, bijv. de laatste 5 items
        $newsItems = News::orderBy('created_at', 'desc')->take(5)->get();
        
        // Controleer of de gebruiker is ingelogd
        if (Auth::check()) {
            $user = Auth::user();
            // Haal het aantal klikken op voor ingelogde gebruikers
            $userClicks = Click::where('user_id', $user->id)->sum('click_count');
        } else {
            // Voor niet-ingelogde gebruikers kan je klikken in sessie bijhouden
            $userClicks = session('clicks', 0);
        }


        // Retourneer de view met de nieuwsitems
        return view('home.index', compact('newsItems', 'userClicks'));
    }
    public function show($id)
{
    $newsItem = News::findOrFail($id);
    return view('news.show', compact('newsItem'));
}
}
