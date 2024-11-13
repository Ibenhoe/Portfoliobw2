<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class HOmeController extends Controller
{
    public function index()
    {
        $newsItems = News::with('comments.user')->orderBy('created_at', 'desc')->take(5)->get();

        // Retourneer de view met de nieuwsitems
        return view('home.index', compact('newsItems'));
    }
}
