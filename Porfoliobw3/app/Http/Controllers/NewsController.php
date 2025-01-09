<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;


class NewsController extends Controller
{
    public function index()
    {
        // Haal de nieuwste berichten op
         $newsItems = News::orderBy('created_at', 'desc')->take(5)->get();
       
        // Retourneer de view met de nieuwsitems
        return view('home.index', compact('newsItems'));
    }
      public function show($id)
            {
                $newsItem = News::findOrFail($id);
                return view('news.show', compact('newsItem'));
            }
}