<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FAQ;
use App\Models\Click;


class HomeController extends Controller
{
    public function index()
    {
        $newsItems = News::with('comments.user')->orderBy('published_at', 'desc')->get();

        $userClicks = 0;

        if (Auth::check()) {
        $user = Auth::user();
        $userClicks = $user->clicks()->sum('click_count') ?? 0;
        }
            $faqs = FAQ::all();


        return view('home.index', compact('newsItems', 'userClicks', 'faqs'));
    }
}